import json
import google.generativeai as genai
import pandas as pd
from flask import Flask, request, jsonify
from flask_cors import CORS

genai.configure(api_key="AIzaSyAjMu7ElmZLMWovLAVJLXAHUTXnJYks3PY")
model = genai.GenerativeModel("models/gemini-2.0-flash")

# konversi jsonl
def convert_tarif_to_message_format(tarif_data):
    return [
        {
            "messages": [
                {"role": "user", "content": f"Berapa tarif MRT dari {item['origin']} ke {item['destination']}?"},
                {"role": "assistant", "content": f"Tarif MRT dari {item['origin']} ke {item['destination']} adalah Rp{item['tarif']}."}
            ]
        }
        for item in tarif_data
    ]

qa_examples= ''
txt_data= ''

def load_data():
    with open('./assets/API-Chatbot/mrt.jsonl', "r") as f:
        qa_list = [json.loads(line) for line in f]

    with open('./assets/API-Chatbot/Tarif MRT.jsonl', "r") as f:
        tarif_data = [json.loads(line) for line in f]

    qa_list += convert_tarif_to_message_format(tarif_data)

    qa_examples = "\n".join([
        f"Q: {item['messages'][0]['content']}\nA: {item['messages'][1]['content']}" 
        for item in qa_list
        if 'messages' in item and len(item['messages']) >= 2
    ])

    try:
        df = pd.read_csv('./assets/API-Chatbot/Jadwal MRT.csv')
        txt_data = df.to_string(index=False)
    except Exception as e:
        print("❌ Gagal membaca CSV:", e)
        txt_data = ""

    return qa_examples, txt_data


system_prompt = (
    "Kamu adalah asisten yang hanya menjawab pertanyaan tentang jadwal MRT Jakarta.\n"
    "Berikut adalah beberapa contoh pertanyaan dan jawaban:\n\n"
    f"{qa_examples}\n\n"
    "Dan berikut adalah data jadwal MRT Jakarta:\n\n"
    f"{txt_data}\n\n"
    "Jika pertanyaan tidak relevan dengan data ini, jawab: 'Maaf, saya hanya bisa menjawab pertanyaan tentang jadwal MRT Jakarta.'"
    
)

# Inisialisasi history
chat_history = [{"role": "user", "parts": [system_prompt]}]

app = Flask(__name__)
CORS(app)

qa_examples, txt_data = load_data()

system_prompt = (
    "Kamu adalah asisten virtual yang ramah, perhatian, dan hanya menjawab pertanyaan seputar jadwal MRT Jakarta.\n"
    "Jika pengguna menyapa seperti 'halo', 'hai', atau 'selamat pagi', balas dengan sapaan manis dan ajak mereka bertanya, contohnya:\n"
    "'Hai! Semoga harimu menyenangkan ya 🌼 Ada yang bisa aku bantu soal jadwal MRT Jakarta?'\n"
    "Atau: 'Selamat pagi ☀️ Semoga perjalananmu lancar. Ada info MRT yang ingin kamu cari?'\n\n"
    "Jika pertanyaan tidak relevan dengan data jadwal MRT Jakarta, jawab dengan sopan dan tetap hangat:\n"
    "'Maaf ya, aku hanya bisa bantu soal jadwal MRT Jakarta. Tapi aku siap bantu kalau ada pertanyaan tentang itu 😊'\n\n"
    "Berikut adalah beberapa contoh pertanyaan dan jawaban seputar MRT Jakarta:\n\n"
    f"{qa_examples}\n\n"
    "Dan berikut adalah data jadwal MRT Jakarta yang bisa kamu jadikan acuan:\n\n"
    f"{txt_data}\n"
)

chat_history = [{"role": "user", "parts": [system_prompt]}]

@app.route("/chat", methods=["POST"])
def chat():
    data = request.json
    user_input = data.get("message", "")

    chat_history.append({"role": "user", "parts": [user_input]})

    try:
        response = model.generate_content(chat_history)
        reply = response.text
        chat_history.append({"role": "model", "parts": [reply]})
        return jsonify({"response": reply})
    except Exception as e:
        return jsonify({"response": f"Terjadi kesalahan: {str(e)}"}), 500

if __name__ == "__main__":
    app.run(port=5000, debug=True)
