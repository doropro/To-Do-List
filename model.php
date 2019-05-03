<?php
function getTaches()
{
  $bdd = bddConnect();
  //////////////////////////////////AFFICHAGE TACHES A FAIRE
  $resultat = $bdd->prepare('SELECT * FROM Todos WHERE etat=:etat');
  $resultat->execute(array(
  'etat'=> '1'
  ));

  return $resultat;
}

function getInser()
{
  $bdd = bddConnect();
  ///////////////////////////////AJOUT DANS TABLE
  if(!empty($_POST['Taches'])) {
  $newTache = $_POST["Taches"];
  $req = $bdd->prepare('INSERT INTO Todos(Taches, etat) VALUES(:Taches, :etat)');
  $req->execute(array(
  'Taches' => $newTache,
  'etat' => '1'//possible de mettre 1 dans une variable avt comme new tache
  ));
  return $req;
  }

}

function getModif()
{
  $bdd = bddConnect();
  ///////////////////////////////MODIF DE L'ETAT POUR ENLEVER TACHE DE LA LISTE
  for($i=0; $i<sizeof($_POST['cocher']); $i++){
  $modif = $bdd->prepare ('UPDATE Todos SET etat=:etat WHERE ID_Taches=:ID_Taches');
  $modif -> execute(array(
  'etat' => '0',
  'ID_Taches' => $_POST['cocher'][$i]
  ));
  return $modif;
  }

}

function getAfaire()
{
  $bdd = bddConnect();
  //////////////////////////////////AFFICHAGE TACHES A FAIRE
  $resultat = $bdd->prepare('SELECT * FROM Todos WHERE etat=:etat');
  $resultat->execute(array(
  'etat'=> '1'
  ));
  return $resultat;
}

function getArchive()
{
  $bdd = bddConnect();
  //////////////////////////////////AFFICHAGE TACHES ARCHIVER
  $archive = $bdd->prepare('SELECT * FROM Todos WHERE etat=:etat');
  $archive->execute(array(
  'etat'=> '0'
  ));
  return $archive;
}

function getDelete()
{
  $bdd = bddConnect();
  //////////////////////////EFFACE TACHES
  if(isset($_GET['ID_Taches'])){//Si get id tache dans url
  $delete = $bdd->prepare('DELETE FROM Todos WHERE ID_Taches=:ID_Taches');
  $delete->execute(array(
  'ID_Taches'=> $_GET['ID_Taches']
  ));
  return $delete;
  }
}

function bddConnect()
{
  try
  {
  $bdd = new PDO('mysql:host=localhost;dbname=Todolist;charset=utf8', 'phpmyadmin','user');
    return $bdd;
  }
  catch(Exception $bdd)
  {
    die('Erreur : '.$bdd->getMessage());
  }
}
