<?php
 include_once '../Controller/patientC.php';
 $co = new patientC();
 if(isset($_GET['id'])){
     $co->supprimerPatient($_GET['id']);
 
    header('Location:backPatient.php');
    }

 ?>