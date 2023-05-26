
function toggleCategories(btn) {
  const allButtons = document.querySelectorAll(".tag-button")
  const button = document.getElementById(btn); 
  console.log(button)
  allButtons.forEach(function(tagButton) {
    tagButton.style.backgroundColor = 'white'
  })
//cond = true au premier bloc cond = block 2 false
  button.style.backgroundColor = 
    btn == "lifestyle" ? "blue" : (
      btn == "voyage" ? "green" : (
        btn == "jeux" ? "yellow" :(
          btn == "tech"? "purple" : 
            btn == "musique" ? "blue" : (
            btn == "mood" ? "green" : (
              btn == "recette" ? "yellow" :(
                btn == "bouffe"? "purple" :
                btn == "film" ? "yellow" :( 
                  btn == "serie"?"green":
                    "black"
                  )
                  
                )
              )
            )
          ) 
        )
      )
      
     // Change la couleur de fond en fonction de l'état du bouton
  document.body.style.backgroundColor = 
  btn == "lifestyle" ? "blue" : (
    btn == "voyage" ? "green" : (
      btn == "jeux" ? "yellow" :(
        btn == "tech"? "purple" : 
          btn == "musique" ? "blue" : (
          btn == "mood" ? "green" : (
            btn == "recette" ? "yellow" :(
              btn == "bouffe"? "purple" :
              btn == "film" ? "yellow" :( 
                btn == "serie"?"green":
                  "black"
                )
              )
            )
          )
        ) 
      )
    )


    const categories = document.querySelectorAll(".post-tag"); // Remplace ".categorie" par la classe qui désigne les éléments que tu veux masquer/afficher
    // plutôt faire des tags dans ma base de données

    categories.forEach(function (category) {
      let tag = category.getAttribute('data-tag')
      category.style.display = tag != btn ? "none" : "flex" // Masque ou affiche les catégories en fonction de l'état du bouton
    });
}

