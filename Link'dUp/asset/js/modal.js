// c'est pour déclanché le modal 
const modalContainer = document.querySelector(".modal-container");
const modalTriggers = document.querySelectorAll(".modal-trigger");
const deletebnt = document.querySelectorAll(".delete-button");
console.log(deletebnt)
const cencelbtn =document.querySelectorAll(".cancel-button")
modalTriggers.forEach(trigger => trigger.addEventListener("click", toggleModal))

function toggleModal(){
  modalContainer.classList.toggle("active")
  
}

// modale pour supprimer
deletebnt.forEach(btn =>{
  btn.addEventListener("click", (e)=> {
    console.log(e.target.closest(".card").querySelector(".confirmation-panel").style)
    e.target.closest(".card").querySelector(".confirmation-panel").classList.toggle("hidden")
  })
}) 
cencelbtn.forEach(btn =>{
  btn.addEventListener("click", (e)=> {
   document.querySelectorAll(".confirmation-panel").forEach(modal=>{
    modal.classList.add("hidden")
  })
  })
}) 