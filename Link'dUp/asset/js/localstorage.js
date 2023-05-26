console.log('loc.js')
const btnlocal = document.querySelector(".card")
const content = document.getElementById("content")
content.addEventListener("keyup", function(){
    localStorage.setItem("content",content.value);
}) 


if(localStorage.getItem("content") != null){
    document.querySelector(".modal form").value = localStorage.getItem("content")
    }
    document.getElementById("content").value = localStorage.getItem("content");
