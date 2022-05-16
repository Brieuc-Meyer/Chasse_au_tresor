
<?php
$pseudo = $_POST["pseudo"];
$score = trim($_POST["score"]);


$pdo = new PDO("mysql:host=localhost;dbname=Chasse_au_tresor;charset=utf8", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$req = $pdo->prepare("INSERT INTO scores (pseudo,score) VALUES (:pseudo, :score)");
$req->bindParam("pseudo", $pseudo, PDO::PARAM_STR, 20);
$req->bindParam("score", $score, PDO::PARAM_INT);
$req->execute();


header("location: http://localhost/Chasse_au_tresor/v1/index.php");
?>