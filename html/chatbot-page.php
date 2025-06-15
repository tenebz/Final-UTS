<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, AdminWrap lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, AdminWrap lite design, AdminWrap lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="AdminWrap Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>MRT Jakarta</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/adminwrap-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Jakline</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <?php
                    include 'logo.php';?>
            </nav>
        </header>
        <?php
         include 'leftbar.php';?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
        <?php
            include 'chatbot.php';?>
        </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    
<style>
  .chat-container {
    width: 100%;
    height: 80vh;
    display: flex;
    flex-direction: column;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    overflow: hidden;
  }

  .chat-header {
    padding: 1rem;
    background-color: #4f46e5;
    color: white;
    font-size: 1.2rem;
    font-weight: bold;
  }

  .chat-messages {
    flex: 1;
    padding: 1rem;
    overflow-y: auto;
    background: #f9fafb;
  }

  .message {
    margin-bottom: 1rem;
  }

  .user {
    text-align: right;
  }

  .bot {
    text-align: left;
  }

  .message p {
    display: inline-block;
    padding: 0.6rem 1rem;
    border-radius: 15px;
    max-width: 80%;
  }

  .user p {
    background-color: #e0e7ff;
    color: #1e1e1e;
  }

  .bot p {
    background-color: #f3f4f6;
    color: #1e1e1e;
  }

  .chat-input {
    display: flex;
    padding: 0.75rem;
    border-top: 1px solid #e5e7eb;
    background-color: #fafafa;
  }

  .chat-input input {
    flex: 1;
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 20px;
    outline: none;
  }

  .chat-input button {
    margin-left: 10px;
    padding: 0.75rem 1.2rem;
    border: none;
    border-radius: 20px;
    background-color: #4f46e5;
    color: white;
    cursor: pointer;
  }

  .chat-input button:hover {
    background-color: #4338ca;
  }

  .bot p ul {
    margin: 0.5rem 0 0.5rem 1.5rem;
    padding-left: 20px;
  }

  .bot p li {
    margin-bottom: 4px;
  }

</style>

<script>
  function appendMessage(text, sender) {
  const chatBox = document.getElementById('chat-box');
  const messageDiv = document.createElement('div');
  messageDiv.classList.add('message', sender);

  const messageText = document.createElement('p');
  messageText.innerHTML = text;

  messageDiv.appendChild(messageText);
  chatBox.appendChild(messageDiv);
  chatBox.scrollTop = chatBox.scrollHeight; // auto scroll ke bawah
}

async function sendMessage() {
  const input = document.getElementById('user-input');
  const message = input.value.trim();
  if (message === '') return;

  appendMessage(message, 'user');  // Tampilkan pesan user
  input.value = '';  // Kosongkan input

  try {
    const response = await fetch("http://localhost:5000/chat", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ message: message })
    });

    if (!response.ok) {
      const errorText = await response.text();
      console.error("Gagal:", response.status, errorText);
      appendMessage("Gagal menghubungi server AI: " + response.status, 'bot');
      return;
    }

    const data = await response.json();
    const reply = data?.response || "Maaf, tidak ada respons dari server.";
    appendMessage(reply, 'bot');

  } catch (error) {
    appendMessage("Terjadi kesalahan: " + error.message, 'bot');
    console.error("Fetch error:", error);
  }
}

  document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('user-input');
    input.addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
        e.preventDefault();
        sendMessage();
      }
    });
  });


</script>
</body>

</html>
