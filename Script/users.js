const searchBar = document.querySelector(".users .search-box input"),
searchBtn = document.querySelector(".users .search-box span"),
userList = document.querySelector(".users .user-list");

// searchBtn.onclick = () => {
//     alert("Hey");
//     console.log("hello");
// }


searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }
    else{
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST","Script/auth/search.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200 ){
                let data = xhr.response;
                console.log(data);
                userList.innerHTML = data;
            
            }
        }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET","Script/auth/users.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200 ){
                let data = xhr.response;
            //    console.log(data);
            //    userList.innerHTML = data;
            if(!searchBar.classList.contains("active")){
                userList.innerHTML = data;
            }
               
                }
            }
        }
        xhr.send();
}, 500);
