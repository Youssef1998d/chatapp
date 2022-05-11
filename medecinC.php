<?php

include_once("C:\Users\Emna\Music\Nouveau dossier\htdocs\youss\config.php");
include_once("C:\Users\Emna\Music\Nouveau dossier\htdocs\youss\Model\medecin.php");
class medecinC
{
    function afficherMedecin(){
        $sql="select * from medecin";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
public function ajouterMedecin($medecin){
    $sql="insert into medecin(nom,type,numtel) values(:nom,:type,:numtel)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        
        'nom'=>$medecin->getNom(),
        'type'=>$medecin->getType(),
        'numtel'=>$medecin->getNumtel()
       
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


public function afficherMedecinDetail(int $rech1)
    {
        $sql="select * from medecin where id=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
public function supprimerMedecin($id)
{
    $sql = "DELETE FROM medecin WHERE id=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
function modifierMedecin($id,$medecin) {
    $sql="UPDATE medecin set nom=:nom,type=:type,numtel=:numtel where id=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nom' => $medecin->getNom(),
            'type' => $medecin->getType(),
            'numtel' => $medecin->getNumtel()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }
function afficherMedecinTrie(string $selon){
    $sql="select * from medecin order by ".$selon."";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
public function afficherMedecinRech(string $rech1,string $selon)
{
    $sql="select * from medecin where $selon like '".$rech1."%'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

}

?>