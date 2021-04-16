const searchBar = document.querySelector(".users .search-box input[type='text']"),
searchBtn = document.querySelector(".users .search-box span");

searchBtn.onclick = () => {
    // searchBar.classList.toggle("active");
    searchBar.classList.toggle("active");
    searchBar.focus();
    
}