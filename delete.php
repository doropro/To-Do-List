<?php
///////////////////////////CONNEXION BDD
$bdd = new PDO('mysql:host=localhost;dbname=Todolist;charset=utf8', 'phpmyadmin','user');
//////////////////////////EFFACE TACHES
if(isset($_GET['ID_Taches'])){//Si get id tache dans url
$resultat = $bdd->prepare('DELETE FROM Todos WHERE ID_Taches=:ID_Taches');
$resultat->execute(array(
'ID_Taches'=> $_GET['ID_Taches']
));
///////////////////////redirige vers la page index.php
header("location:index.php");


     }

?>
