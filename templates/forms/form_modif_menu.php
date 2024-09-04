<?php

// Template : formulaire de modification d'un menu
// Paramètres : un objet menu

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Formulaire de modification d'un menu</title>
</head>

<body>
    <header class="flexwrap align-center spacebetween mb64">
        <div class="flexwrap g16">
            <div class="user-icon"><img src="/assets//images/background_et_icones/user_icon.png" alt="responsive-img"></div>
            <h2><?= session_userconnected()->getHTML("prenom") ?> <?= session_userconnected()->getHTML("nom") ?></h2>
        </div>
        <div class="flexwrap g32">
            <a href="afficher_tableau_de_bord.php">Tableau de bord</a>
            <a href="deconnecter.php">Deconnexion</a>
        </div>
    </header>

    <main class="flexwrap g24 pl64 pr64 mb128">
        <h1 class="w100 mb32">Modification du menu</h1>
        <form action="modifier_menu.php?id=<?=$menu->id()?>" method="POST" class="crud-form flexwrap p32 g32 justcenter" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />

            <h2 class="textcenter w100">Veuillez mettre à jour les informations suivantes</h2>
            <label class="flexwrap flexcolumn g16 w100">
                <b>Nom du menu</b>
                <input type="text" name="nom" id="nom" class="w100 pl8" value="<?=$menu->getHTML("nom")?>" required>
            </label>

            <label class="flexwrap flexcolumn g16 w100">
                <b>Prix du menu </b>(en € avec 2 chiffres après le point. Exemple : 8.25)
                <input type="number" name="prix" id="prix" class="w100 pl8" step="0.01" value="<?=$menu->getHTML("prix")?>" required>
            </label>

            <div class="flexwrap justcenter">
                <p class="w100 mb16"><b>Illustration utilisée pour ce menu : </b></p>
                <div class="illustration-utilise w100"><img src="/assets/images<?=$menu->getHTML("image")?>" class="responsive-img"></div>
            </div>

            <label class="flexwrap flexcolumn g16 w100">
                <b>Changer d'illustration</b>
                <input type="file" name="illustration" accept="image/*" />
            </label>

            <input type="submit" value="Modifier le menu" class="mlra">
        </form>

    </main>
</body>

</html>