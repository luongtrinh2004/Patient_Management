@extends('layouts.app')

@section('title', 'Tư Vấn Trực Tiếp')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-3">Tư Vấn Trực Tiếp với Chatbot</h2>
    <div class="card">
        <div class="card-body">
            <div id="chat-box" class="border p-3" style="height: 400px; overflow-y: scroll; background-color: #f8f9fa;">
                <p><strong>Chatbot:</strong> Xin chào! Tôi có thể giúp gì cho bạn?</p>
            </div>
            <div class="mt-3">
                <input type="text" id="user-message" class="form-control" placeholder="Nhập tin nhắn..."
                    onkeypress="handleKeyPress(event)">
                <button class="btn btn-primary mt-2 w-100" onclick="sendMessage()">Gửi</button>
            </div>
        </div>
    </div>
</div>

<script>
function handleKeyPress(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
}

function sendMessage() {
    let message = document.getElementById("user-message").value;
    let chatBox = document.getElementById("chat-box");

    if (message.trim() === "") return;

    // Hiển thị tin nhắn người dùng
    chatBox.innerHTML += `<p><strong>Bạn:</strong> ${message}</p>`;

    // Gửi tin nhắn đến API Laravel
    fetch("{{ route('chatbot.send') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                message: message
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data); // Debug API Response

            fetch("{{ route('chatbot.send') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        message: message
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log("API Response:", data); // Debug API Response

                    let botResponse = data.message || "Lỗi phản hồi từ chatbot.";
                    chatBox.innerHTML += `<p><strong>Chatbot:</strong> ${botResponse}</p>`;
                    chatBox.scrollTop = chatBox.scrollHeight;
                })



            // Kiểm tra nếu phản hồi API là object
            if (typeof botResponse === "object") {
                botResponse = botResponse.candidates ? botResponse.candidates[0].content :
                    "Lỗi phản hồi từ chatbot.";
            }

            // Hiển thị tin nhắn chatbot
            chatBox.innerHTML += `<p><strong>Chatbot:</strong> ${botResponse}</p>`;
            chatBox.scrollTop = chatBox.scrollHeight;
        })


    // Xóa input
    document.getElementById("user-message").value = "";
}
</script>
@endsection