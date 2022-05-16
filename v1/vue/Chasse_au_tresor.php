<html lang="en">

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
        if ($pseudo == "") {
            $_SESSION["erreur"] = "pseudo non renseigné";
            header("location: http://localhost/Chasse_au_tresor/v1/index.php");
        };

    } catch (Exception $e) {
        $_SESSION["erreur"] = "Houston, on a un problème : " . $e->getMessage();
        
    }

    ?>





    <div id="table">
        <div id="ici"></div>
    </div>

    <div id="score">
        <h3> Vous en êtes au jour <score id="jours">0</score> !<br /><br />
            <commentaire id="commentaire"></commentaire>
        </h3>
        <h3 id="bousole"> </h3>
        <input id="pseudo" value="<?php echo ($pseudo); ?>" type="hidden" />
    </div>

    <script src="http://localhost/Chasse_au_tresor/v1/controleur/Chasse_au_tresor.js"></script>
</body>