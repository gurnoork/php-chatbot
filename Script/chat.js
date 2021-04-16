const form = document.querySelector(".form-type"),
sendBtn = form.querySelector(".send"),
inputField = document.querySelector(".typing"),
chatBox = document.querySelector(".chat-place");

sendBtn.onclick = () => {
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Script/auth/chat.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200 ){
               inputField.value= "";
              
               scrollBottom();
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
    xhr.open("POST","Script/auth/chatmsg.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200 ){
                let data = xhr.response;
            //    console.log(data);
            //    userList.innerHTML = data;
            // if(!searchBar.classList.contains("active")){
               chatBox.innerHTML = data;
               if(!chatBox.classList.contains("active")){
               scrollBottom();
               }
               
            // }
               
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
       
}, 500);

function scrollBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
   
}
