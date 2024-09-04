// Script servant à contrôler si un produit et une quantité ont été renseignés dans le formulaire permettant d'ajouter un produit à une commande

// Récupération du formulaire

let compositionForm = document.querySelector(".addProduitCommande-form")

// A la soumission du formulaire
compositionForm.addEventListener("submit",(e)=>{
    // Récupération du produit sélectionné
    let produitChecked = document.querySelector('input[name="produit"]:checked')
    // Récupération de la quantité
    let quantite = parseInt(document.querySelector('input[name="quantite"]').value)
    console.log(quantite)

    // Si le produit n'est pas renseignée
    if(!produitChecked){
        // J'en informe l'utilisateur
        alert('Veuillez sélectionner un produit')
        // J'empêche l'envoi du formulaire
        e.preventDefault()
    // Sinon si la quantité est différente d'un nombre entier
    }else if(!Number.isInteger(quantite)){
         alert('La valeur de la quantité doit être un nombre entier')
         e.preventDefault()
    // Si la quantité n'est pas de minimum 1
    }else if(quantite <= 0){
        alert('La valeur de la quantité doit être un nombre supérieur à zéro')
        e.preventDefault()
    }

})