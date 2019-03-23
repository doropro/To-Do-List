<?php require 'header.php';

//////////////////////////////CONNECTION BDD
$bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'phpmyadmin','user');

///////////////////////////////AJOUT DANS TABLE
if(!empty($_POST['Taches'])) {
$newTache = $_POST["Taches"];
$req = $bdd->prepare('INSERT INTO Todos(Taches, etat) VALUES(:Taches, :etat)');
$req->execute(array(
'Taches' => $newTache,
'etat' => '1'//possible de mettre 1 dans une variable avt comme new tache
));
}

///////////////////////////////MODIF DE L'ETAT POUR ENLEVER TACHE DE LA LISTE
for($i=0; $i<sizeof($_POST['cocher']); $i++){
$modif = $bdd->prepare ('UPDATE Todos SET etat=:etat WHERE ID_Taches=:ID_Taches');
$modif -> execute(array(
'etat' => '0',
'ID_Taches' => $_POST['cocher'][$i]
));
}

//////////////////////////////////AFFICHAGE TACHES A FAIRE
$resultat = $bdd->prepare('SELECT * FROM Todos WHERE etat=:etat');
$resultat->execute(array(
'etat'=> '1'
));

//////////////////////////////////AFFICHAGE TACHES ARCHIVER
$archive = $bdd->prepare('SELECT * FROM Todos WHERE etat=:etat');
$archive->execute(array(
'etat'=> '0'
));

////////////////////////////////////CODE VISIBLE
?>
<div class="container border border-dark" id="cont">

  <h2 class="mb-5 text-center">A Faire</h2>
    <form class="mb-5" action="" method="post">
      <?php
        while ($donnees = $resultat->fetch()){//tant qu'il y a un resulta
                echo "<input class='ml-5' type='checkbox' name='cocher[]' value=".$donnees['ID_Taches'].">"?>
          <?php echo $donnees["Taches"];?></br>
          <?php
          }
          ?>
      <button type="submit" class="btn btn-primary mt-5 text-right" value="envoyer" name="boutonRec[]">Archiver</button>
    </form>
    <?php $resultat->closeCursor();//termine le traitement de la demande ?>

  <h2 class="text-center">Archives</h2>

    <ul>
      <?php while ($donnees = $archive->fetch())//tant qu'il y a un resulta
      {?>
        <li><?= $donnees["Taches"] ?>
        <a href="delete.php?ID_Taches=<?php echo $donnees['ID_Taches']; ?>">  <button type="button" class="close" name="boutonEfface" value="efface" aria-label="Close">
          <span aria-hidden="true">×</span></button></a>
        </li>

      <?php
      }
      ?>
    </ul>

<h2 class=" text-center mb-5">Ajouter une nouvelle tâche</h2>

<form class="mb-5" action="index.php" method="post">
  <label for="Taches">Nouvelle tache</label>
  <input type="text" name="Taches" value=""></br>
  <button type="submit" class="btn btn-primary mt-5 pull-right" name="boutonAjout">Ajouter</button>
</form>
</div>

<?php $resultat->closeCursor();?>
<?php require 'footer.php';?>
