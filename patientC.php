<?php
include_once("C:\Users\Emna\Music\Nouveau dossier\htdocs\youss\config.php");
include_once("C:\Users\Emna\Music\Nouveau dossier\htdocs\youss\Model\patient.php");
class patientC
{





    function afficherPatientTri(string $selon){
        $sql="select * from patient order by ".$selon."";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
    }
    


    


    function afficherPatient(){
        $sql="select * from patient";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
public function ajouterPatient($patient){
    $sql="insert into patient(adresse,dateL,prix,medecin) values(:adresse,:dateL,:prix,:medecin)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        
        'adresse'=>$patient->getAdresse(),
        'dateL'=>$patient->getDateL(),
        'prix'=>$patient->getPrix(),
        'medecin'=>$patient->getMedecin()
       
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}


/*
public function statistiques()
{
    $sql="SELECT type,count(*) from produit group by type ";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}*/


public function afficherPatientDetail(int $rech1)
    {
        $sql="select * from patient where idL=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
public function supprimerPatient($id)
{
    $sql = "DELETE FROM patient WHERE idL=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
function afficherPatientJoin(){
    $sql="select * from patient inner join medecin on patient.medecin=medecin.nom";
        
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
function modifierPatient($id,$patient) {
    $sql="UPDATE patient set adresse=:adresse,dateL=:dateL,prix=:prix,medecin=:medecin where idL=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'adresse' => $patient->getAdresse(),
            'dateL' => $patient->getDateL(),
            'prix' => $patient->getPrix(),
            'medecin'=>$patient->getMedecin()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }
}


function afficherPatientJoin(){
    $sql="select * from patient inner join medecin on patient.V=medecin.nom";
        
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}




?>