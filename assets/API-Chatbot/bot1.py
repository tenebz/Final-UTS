import json
import google.generativeai as genai
import pandas as pd
from flask import Flask, request, jsonify
from flask_cors import CORS #type: ignore
import os

# Konfigurasi API Gemini
genai.configure(api_key="AIzaSyAjMu7ElmZLMWovLAVJLXAHUTXnJYks3PY")
model = genai.GenerativeModel("models/gemini-2.0-flash")

app = Flask(__name__)
CORS(app)

def detect_mode(user_input):
    if "railink" in user_input or ("bandara" in user_input and "kereta" in user_input):
        return "Railink"
    elif "soetta" in user_input or "angkasa pura" in user_input:
        return "AngkasaPura"
    elif "mrt" in user_input:
        return "MRT"
    return None

def convert_tarif_to_message_format(tarif_data):
    return [
        {
            "messages": [
                {"role": "user", "content": f"Berapa tarif dari {item['origin']} ke {item['destination']}?"},
                {"role": "assistant", "content": f"Tarif dari {item['origin']} ke {item['destination']} adalah Rp{item['tarif']}."}
            ]
        }
        for item in tarif_data
    ]

def load_data(mode):
    base_path = f'./assets/API-Chatbot/{mode}/'
    qa_list = []

    try:
        with open(os.path.join(base_path, "qa.jsonl"), "r") as f:
            qa_list += [json.loads(line) for line in f]
    except:
        pass

    try:
        with open(os.path.join(base_path, "Tarif.jsonl"), "r") as f:
            tarif_data = [json.loads(line) for line in f]
            qa_list += convert_tarif_to_message_format(tarif_data)
    except:
        pass

    qa_examples = "\n".join([
        f"Q: {item['messages'][0]['content']}\nA: {item['messages'][1]['content']}"
        for item in qa_list if 'messages' in item and len(item['messages']) >= 2
    ])

    try:
        df = pd.read_csv(os.path.join(base_path, "Jadwal.csv"))
        txt_data = df.to_string(index=False)
    except:
        txt_data = ""

    return qa_examples, txt_data

@app.route("/chat", methods=["POST"])
def chat():
    data = request.json
    user_input = data.get("message", "")

    detected_mode = detect_mode(user_input)

    intro_prompt = (
        "Kamu adalah asisten virtual ramah yang membantu pengguna mencari informasi transportasi umum di Jakarta.\n"
        "Kamu dapat menjawab pertanyaan seputar:\n"
        "- MRT Jakarta\n"
        "- Railink (Kereta Bandara)\n"
        "- Angkasa Pura (layanan dan fasilitas bandara)\n\n"
        "Saat menyapa, berikan salam ramah. Jika tidak tahu moda, minta pengguna menjelaskan lebih lanjut.\n"
        "Jawaban kamu harus dalam format HTML, Gunakan <b>, <ul>, <li>, dan <br> untuk membuat daftar atau langkah agar mudah dibaca di web."
    )

    global history
    if 'history' not in globals():
        history = []

    # === Jika mode belum terdeteksi ===
    if not detected_mode:
        history.append({"role": "user", "parts": [user_input]})
        chat_history = [{"role": "user", "parts": [intro_prompt]}] + history[-6:]
        try:
            response = model.generate_content(chat_history)
            history.append({"role": "model", "parts": [response.text]})
            return jsonify({"response": response.text})
        except Exception as e:
            return jsonify({"response": f"Terjadi kesalahan: {str(e)}"}), 500

    # === Jika mode terdeteksi ===
    qa_examples, txt_data = load_data(detected_mode)

    system_prompt = (
        intro_prompt +
        f"\n\nContoh pertanyaan dan jawaban untuk {detected_mode}:\n{qa_examples}\n\n" +
        f"Jadwal terkait:\n{txt_data}\n\nGunakan <b>, <ul>, <li>, dan <br>. Jangan gunakan markdown (*)."
    )

    chat_history = [{"role": "user", "parts": [system_prompt]}, {"role": "user", "parts": [user_input]}]

    try:
        response = model.generate_content(chat_history)
        return jsonify({"response": response.text})
    except Exception as e:
        return jsonify({"response": f"Terjadi kesalahan: {str(e)}"}), 500

if __name__ == "__main__":
    app.run(port=5000, debug=True)
