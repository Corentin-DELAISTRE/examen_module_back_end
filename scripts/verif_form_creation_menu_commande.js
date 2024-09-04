// Script servant à contrôler si tous les champs ont été saisi dans le formulaire permettant d'ajouter un menu à une commande


// Récupération du formulaire

let compositionForm = document.querySelector(".composition-form")

// A la soumission du formulaire
compositionForm.addEventListener("submit",(e)=>{
    // Récupération des élément sélectionnés
    let menuChecked = document.querySelector('input[name="menu"]:checked')
    let tailleChecked = document.querySelector('input[name="taille"]:checked');
    let boissonChecked = document.querySelector('input[name="boisson"]:checked');
    let accompChecked = document.querySelector('input[name="accompagnement"]:checked');
    let sauceChecked = document.querySelector('input[name="sauce"]:checked');
    // Si le menu n'est pas renseignée
    if(!menuChecked){
        // J'en informe l'utilisateur
        alert('Veuillez sélectionner un menu')
        // J'empêche l'envoi du formulaire
        e.preventDefault()
        // Je fais de même pour les autres infos
    }else if(!tailleChecked){
        alert('Veuillez sélectionner une taille')
        e.preventDefault()
    }else if(!accompChecked){
        alert('Veuillez sélectionner un accompagnement')
        e.preventDefault()
    }else if(!boissonChecked){
        alert('Veuillez sélectionner une boisson')
        e.preventDefault()
    }else if(!sauceChecked){
        alert('Veuillez sélectionner une sauce')
        e.preventDefault()
    }
})