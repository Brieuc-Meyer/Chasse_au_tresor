

<head>
    <meta charset="UTF-8">
    <title>Chasse au trésor</title>
    <link rel="stylesheet" href="http://localhost/Chasse_au_tresor/v1/vue/Chasse_au_tresor.css">
</head>

<body>
    <?php
    try {
        session_start();

        $pseudo = trim($_POST["pseudo"]);
        if ($pseudo == "") {//vérifier si le pseudo n'est pas num avant de lancer la partie
            $_SESSION["erreur"] = "pseudo non renseigné";
            header("location: http://localhost/Chasse_au_tresor/v1/index.php");
        };

    } catch (Exception $e) {
        $_SESSION["erreur"] = "Houston, on a un problème : " . $e->getMessage();
        
    }

    ?>
<!-- ou sera affiché la carte -->
    <div id="table">
        <div id="ici"></div>
    </div>
<!-- ou seront affiché le score de la partie actuelle et les commentaires et le bouton rejouer, et la bousole -->
    <div id="score">
        <h3> Vous en êtes au jour <score id="jours">0</score> !<br /><br />
            <commentaire id="commentaire"></commentaire>
        </h3>
        <h3 id="bousole"> </h3>
        <!-- recuperation du pseudo pour l'afiicher apres dans le tableau des scores -->
        <input id="pseudo" value="<?php echo ($pseudo); ?>" type="hidden" /> 
    </div>

    <script src="http://localhost/Chasse_au_tresor/v1/controleur/Chasse_au_tresor.js"></script>
</body>