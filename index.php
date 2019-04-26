<?php

require('model.php');

$resultat = getTaches();
$req = getInser();
$modif = getModif();
$resultat = getAfaire();
$archive = getArchive();
$delete = getDelete();

require('indexView.php');
