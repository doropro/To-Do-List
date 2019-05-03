<?php

require('model.php');

$resultat = getTaches();
$req = getInser();
if(isset($_POST['cocher'])){
$modif = getModif();
}
else{
    $_POST['cocher'] = '';
}
$resultat = getAfaire();
$archive = getArchive();
$delete = getDelete();

require('indexView.php');
