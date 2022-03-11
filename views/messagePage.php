<?php
session_start();
require_once "./../includes/header.php";
require_once "./../Database/Model/Entities/database.php";

$getData = null;
$db = new Database();

if (isset($_GET['id'])) {
    $getData = $db->getData($_GET['id']);
}

?>
<html>
<body>
<div class="wrapper">
    <section class="chat-area">
        <header>
            <a href="profilePage.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <img src="./../images/download.jpg" alt="">
            <div class="details">
                <span><?= $getData[0]['first_name'] ?></span>
                <p>Active Now</p>
            </div>
        </header>
        <div class="chat-box">
        </div>
        <form action="" method="post" class="typing-area">
            <input type="text" name="message" class="input-field" placeholder="Type a message here..."
                   autocomplete="off">
            <input type="text" name="id" class="id" value="<?= $_GET['id'] ?>" hidden>
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>
</div>
</body>
</html>
<script>
    const form = document.querySelector(".typing-area");
    let id = form.querySelector(".id").value;
    let sendBtn = document.querySelector('button');
    let chatBox = document.querySelector(".chat-box");
    let inputField = form.querySelector(".input-field");

    inputField.onkeyup = () => {
        if (inputField.value != "") {
            sendBtn.classList.add("active");
        } else {
            sendBtn.classList.remove("active");
        }
    }
    sendBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./../Controller/messageInsertController.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    inputField.value = "";
                    scrollToBottom();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }

    chatBox.onmouseenter = () => {
        chatBox.classList.add("active");
    }

    chatBox.onmouseleave = () => {
        chatBox.classList.remove("active");
    }

    setInterval(() => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "./../Controller/messageViewController.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    chatBox.innerHTML = data;
                    if (!chatBox.classList.contains("active")) {
                        scrollToBottom();
                    }
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("id=" + id);
    }, 1000);

    function scrollToBottom() {
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>

