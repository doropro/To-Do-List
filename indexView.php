<?php $title = 'My Todolist'; ?>

<?php ob_start(); ?>
<div class="container bordure border border-dark offset-3 col-md-6 offset-3  p-0 mb-5">
  <h1 class="text-center mt-5">TO DO LIST</h1>
<div class="row">
  <div class="offset-1 col-md-10 offset-1 border border-primary mt-5 p-5">
    <h2 class="mb-5 text-center">A Faire</h2>
    <form class="mb-5" action="" method="post">
      <?php
        while ($donnees = $resultat->fetch()){//tant qu'il y a un resultat
                echo "<input class='ml-5' type='checkbox' name='cocher[]' value=".$donnees['ID_Taches'].">"?>
          <?= $donnees["Taches"];?></br>
          <?php
          }
          ?>
      <button type="submit" class="btn btn-primary mt-5 text-right" value="envoyer" name="boutonRec[]">Archiver</button>
    </form>
</div>
</div>

<div class="row">
  <div class="offset-1 col-md-10 offset-1 border border-primary mt-5 p-5">
  <h2 class="text-center">Archives</h2>

    <ul>
      <?php
        while ($donnees = $archive->fetch()){
      ?>
        <li><?= $donnees["Taches"] ?>
        <a href="index.php?ID_Taches=<?= $donnees['ID_Taches']; ?>">  <button type="button" class="close" name="boutonEfface" value="efface" aria-label="Close">
          <span aria-hidden="true">×</span></button></a>
        </li>
      <?php
      }
      ?>
    </ul>
</div>
</div>

<div class="row">
  <div class="offset-1 col-md-10 offset-1 border border-primary mt-5 mb-5 p-5">
<h2 class=" text-center mb-5">Ajouter une nouvelle tâche</h2>

<form class="mb-5" action="index.php" method="post">
  <label for="Taches">Nouvelle tache</label>
  <input type="text" name="Taches" value=""></br>
  <button type="submit" class="btn btn-primary mt-5 pull-right" name="boutonAjout">Ajouter</button>
</form>
</div>
</div>
</div>
<?php $resultat->closeCursor();
$content = ob_get_clean();
require('template.php');
?>
