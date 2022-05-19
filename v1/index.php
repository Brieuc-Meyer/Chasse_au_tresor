<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Chasse au trésor</title>
  <!-- utilisation d'une feuille de style différente pour mettre les lignes du tableau en noir -->
  <link rel="stylesheet" href="http://localhost/Chasse_au_tresor/v1/vue/index.css">
</head>

<body>


  <?php
  session_start();
  //affichage des erreurs ou réussites des saisies
  if (isset($_SESSION['erreur'])) {
    echo ("<div style='background-color:#ff0000'>" . $_SESSION['erreur'] . "</div>");
    unset($_SESSION['erreur']);// et vider la varable de session 
  }
  if (isset($_SESSION['info'])) {
    echo ("<div style='background-color:#00ff00'>" . $_SESSION['info'] . "</div>");
    unset($_SESSION['info']);
  }
  ?>
  <div id="pseudo" style="display:flex">
  <!-- saisie de l'utilisateur et lien vers la page de jeu -->
    <form action="http://localhost/Chasse_au_tresor/v1/vue/Chasse_au_tresor.php" method="post">
      <h3>Pseudo : <input name="pseudo" required />

        <input type="submit" value="Commencer" />
      </h3>
    </form>
  </div>
  <h3>Meilleures scores : </h3>

  <?php
  $pdo = new PDO("mysql:host=localhost;dbname=Chasse_au_tresor;charset=utf8", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $res = $pdo->query("select * from scores order by score "); // requette à la BDD afin d'obtenir les scores
  $scores = $res->fetchAll();
  $i = 1;
  $er = " er";
  foreach ($scores as $score) {//boucle d'affichage  sous forme de tableau des scores
    if($i>1){$er=" ème";};
   
  ?>

    <div id="tabscores">
      <table>
        <tr>

          <td>
            <h3><?php echo ($score["pseudo"]); ?> </h3>
          </td>
          <td>
            <h3><?php echo ($score["score"]); ?> </h3>
          </td>
          <td>
            <h3><?php echo $i . $er ?> </h3>
          </td>
        </tr>
      </table>
    </div>

  <?php
    $i = $i + 1;

  
  } // ForEach 
  ?>
</body>