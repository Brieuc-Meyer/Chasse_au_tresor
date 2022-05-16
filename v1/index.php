<head>
  <meta charset="UTF-8">
  <title>Chasse au trésor</title>
  <link rel="stylesheet" href="http://localhost/Chasse_au_tresor/v1/vue/Chasse_au_tresor.css">
</head>

<body>


  <?php
  session_start();
  if (isset($_SESSION['erreur'])) {
    echo ("<div style='background-color:#ff0000'>" . $_SESSION['erreur'] . "</div>");
    unset($_SESSION['erreur']);
  }
  ?>
  <div style="display:flex">
    <form action="http://localhost/Chasse_au_tresor/v1/vue/Chasse_au_tresor.php" method="post">
      <h3>pseudo : <input name="pseudo" required />
      <input type="submit" value="Commencer" /></h3>
    </form>
  </div>

  <?php
  $pdo = new PDO("mysql:host=localhost;dbname=Chasse_au_tresor;charset=utf8", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $res = $pdo->query("select * from scores order by score ");
  $scores = $res->fetchAll();

  foreach ($scores as $score) {
  ?>

    <div style="display:flex">
      <h3>Pseudo : <?php echo ($score["pseudo"]); ?> </h3>
      <h3>Score : <?php echo ($score["score"]); ?> </h3>
    </div>

  <?php } // ForEach 
  ?>
</body>