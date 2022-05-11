<?php
 include_once '../Controller/medecinC.php';
 $co = new medecinC();
 if(isset($_GET['id'])){
     $co->supprimerMedecin($_GET['id']);
 
    header('Location:backMedecin.php');
    }

 ?>