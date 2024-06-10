<?php 
$dossier ="./fonctions";
$scandir = scandir($dossier);
foreach($scandir as $fichier){
    if($fichier != '.' && $fichier != '..')
    //  echo "$dossier/$fichier <br>";
   require "$dossier/$fichier";
}