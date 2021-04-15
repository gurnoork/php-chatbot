const form = document.querySelector(".signup form "),
contBtn = form.querySelector(".button span"),
errormsg = form.querySelector(".error-msg");


form.onsubmit = (e) => {
    e.preventDefault();
}

contBtn.onclick = () =>{
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Script/auth/signup.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200 ){
                let data = xhr.response;
                
                if(data == "success" ){
                    location.href ="users.php";
                }
                else{
                    // console.log(data);

                    errormsg.textContent = data;
                    errormsg.style.display = "block";
                   
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}