<x-app-layout>
    <body>
        <div id="chatuser" class="pt-3 pl-2 fixed w-full bg-white shadow-md" style="position: fixed; top: 97px; z-index: 1; overflow-y: hidden;">
            @foreach($conversation->users as $conversation_user)
                @if($conversation_user->id != Auth::user()->id)
                    <div class="flex mb-4">
                        <button onclick="history.back()">
                            <i class="fa-solid fa-arrow-left fa-xl mx-2"></i>
                        </button>
                        <img alt="chat" src="{{ $conversation_user->profile->profile_image_url }}" class="w-14 h-14 rounded-full">
                        <p class="ml-3 mt-4 text-xl">{{ $conversation_user->name}}</p>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="overflow-y-auto" id="chatMessages" style="max-height: 75vh">
            <div id="list_message" class="list-disc">
                <br>
                <br>
                <br>
                <br>
                @foreach($messages as $message)
                    @if($message->user->id == Auth::user()->id)
                        <!-- 送信者のメッセージ（右側に表示） -->
                        <div class="mb-16">
                            <div class="flex justify-end">
                                <p class="rounded-lg bg-orange-400 text-white font-bold px-4 py-4 max-w-3xl mr-4">{{ $message->content }}</p>
                            </div>
                            <div class="flex justify-end mt-2 mr-4">
                                <p class="text-gray-500">{{ $message->created_at->format('m-d H:i') }}</p>
                            </div>
                        </div>
                    @else
                        <!-- 受信者のメッセージ（左側に表示） -->
                        <div class="mb-16">
                            <div class="flex">
                                <img alt="chat" src="{{ $message->user->profile->profile_image_url }}" class="mx-2 w-14 h-14 rounded-full">
                                <p class="rounded-lg bg-blue-400 text-white font-bold px-4 py-4 max-w-3xl mr-4">{{ $message->content }}</p>
                            </div>
                            <div class="flex ml-20 mt-2 mr-4">
                                <p class="text-gray-500"> {{ $message->created_at->format('m-d H:i') }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

       
        
        
        <div class="fixed bottom-0 left-0 w-full bg-white p-4 shadow-md" id="chatFormContainer">
            <form method="post" onsubmit="onsubmit_Form(); return false;" id="chatForm">
                @csrf
                <div class="flex items-center">
                    <textarea id="input_message" class="flex-1 mr-2 p-2 border rounded resize-y" placeholder="Type your message..."></textarea>
                    <button type="submit" class="p-2 bg-blue-500 text-white rounded">Send</button>
                </div>
            </form>
        </div>

        <script>
            const elementInputMessage = document.getElementById("input_message");
            const elementListMessage = document.getElementById("list_message");
            const chatFormContainer = document.getElementById("chatFormContainer");
            const chatUser = document.getElementById("chatuser");
        
            elementListMessage.scrollIntoView(false);
        
            function onsubmit_Form() {
                let strMessage = elementInputMessage.value;
                if (!strMessage.trim()) {
                    return;
                }
        
                params = { 'message': strMessage };
        
                axios
                    .post('', params)
                    .then(response => {
                        console.log(response);
                        // メッセージが送信された後の処理を追加する場合はここに記述
                    })
                    .catch(error => {
                        console.log(error.response);
                    });
        
                elementInputMessage.value = "";
            }
        
           window.addEventListener("DOMContentLoaded", () => {
                const currentUserId = {{ Auth::user()->id }};
                
                console.log(currentUserId);
                
                window.Echo.private('chat').listen('MessageSent', (e) => {
                    let strMessage = e.message.content;
                    let createdAt = new Date(e.message.created_at);
                    
                    console.log(strMessage);
                    console.log(createdAt);
            
                    var month = createdAt.getMonth() + 1;
                    var day = ('0' + createdAt.getDate()).slice(-2);
                    var hour = createdAt.getHours();
                    var minute = ('0' + createdAt.getMinutes()).slice(-2);
            
                    strCreatedAt = `${month}-${day} ${hour}:${minute}`;
                    
                    console.log(strCreatedAt);
            
                    let elementDiv = document.createElement("div");
                    let elementMessage = document.createElement("p");
                    let elementCreatedAt = document.createElement("p");
                    let elementProfileImage = document.createElement("img");
                    elementMessage.textContent = strMessage;
                    elementCreatedAt.textContent = strCreatedAt;
                    elementDiv.append(elementMessage);
                    elementDiv.append(elementCreatedAt);
            
                    if (e.message.user_id == currentUserId) {
                        // 送信者のメッセージ（右側に表示）
                        console.log(e.message.user_id);
                        elementDiv.classList.add("flex", "flex-col", "items-end", "mb-16");
                        elementMessage.classList.add("rounded-lg", "bg-orange-400", "text-white", "font-bold", "px-4", "py-4", "max-w-3xl", "mr-4");
                        elementCreatedAt.classList.add("text-gray-500", "mt-2", "mr-4");
                    
                    } else {
                        // 受信者のメッセージ（左側に表示）
                        console.log(e.message.user_id);
                        elementDiv.classList.add("mb-16");
                        let elementInnerDiv = document.createElement("div");
                        let elementImageDiv = document.createElement("div");
                        let elementTextDiv = document.createElement("div");
                        
                        elementInnerDiv.classList.add("flex");
                        elementImageDiv.classList.add("flex", "ml-20", "mt-2", "mr-4");
                        elementTextDiv.classList.add("flex", "flex-col", "items-start");
                    
                        elementProfileImage.src = "{{ isset($message) ? $message->user->profile->profile_image_url : '' }}";
                        elementProfileImage.alt = "chat";
                        elementProfileImage.classList.add("mx-2", "w-14", "h-14", "rounded-full");
                    
                        elementMessage.textContent = strMessage;
                        elementCreatedAt.textContent = strCreatedAt;
                    
                        elementTextDiv.append(elementMessage);
                        elementTextDiv.append(elementCreatedAt);
                        
                        elementInnerDiv.append(elementProfileImage);
                        elementInnerDiv.append(elementTextDiv);
                        
                        elementDiv.append(elementInnerDiv);
                        elementDiv.append(elementImageDiv);
                    
                        elementMessage.classList.add("rounded-lg", "bg-blue-400", "text-white", "font-bold", "px-4", "py-4", "max-w-3xl", "mr-4");
                        elementCreatedAt.classList.add("text-gray-500", "mt-2");
                    }
                    
                    elementListMessage.append(elementDiv);
                    elementListMessage.scrollIntoView(false);

                });
            });


        </script>
    </body>
</x-app-layout>
