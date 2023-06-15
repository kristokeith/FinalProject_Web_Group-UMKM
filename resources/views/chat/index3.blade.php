<!DOCTYPE html>
<html>
<head>
  <title>Chat</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
  <div class="container">
    <div class="chat-container">
      <div class="chat-header">
        <h2>Chat</h2>
      </div>
      <div class="chat-body" id="chat-body">
        @foreach($chats as $chat)
          <div class="message">
            <strong></strong>: {{ $chat->message }}
          </div>
        @endforeach
      </div>
      <form id="chat-form" action="{{ route('chat.send') }}" method="post">
        @csrf
        <div class="chat-footer">
          <input type="text" name="message" id="message-input" placeholder="Type your message">
          <input type="hidden" name="receiver_id" value="{{ 1 }}">
          <button type="submit">Send</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
  </script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    Echo.channel('chat')
        .listen('.App\\Events\\ChatSent', (e) => {
            appendMessage(e.chat.message, e.chat.owner.name);
        });

    document.getElementById('chat-form').addEventListener('submit', function (e) {
        e.preventDefault();
        var messageInput = document.getElementById('message-input');
        var message = messageInput.value.trim();
        if (message !== '') {
            appendMessage(message, 'owner');
            messageInput.value = '';
            axios.post('{{ route('chat.send') }}', {
                message: message,
                receiver_id: '{{ 1 }}'
            })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });

    function appendMessage(message, sender) {
        var chatBody = document.getElementById('chat-body');
        var messageContainer = document.createElement('div');
        messageContainer.className = 'message-' + sender;
        messageContainer.innerText = message;
        chatBody.appendChild(messageContainer);
        chatBody.scrollTop = chatBody.scrollHeight;
    }
  </script>
</body>
</html>
