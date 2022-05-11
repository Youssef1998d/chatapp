<?php

include_once '../Model/patient.php';
include_once '../Controller/patientC.php';
include_once '../Controller/medecinC.php';
$patientC = new patientC();
$medecinC = new medecinC();
$listeC = $patientC->afficherPatient();
$listeL =  $medecinC->afficherMedecin();

 function afficherPatientRech(string $rech1,string $selon)
    {
        $sql="select * from patient where $selon like '".$rech1."%'";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

if (
    isset($_POST["adresse"]) && 
     isset($_POST["dateL"]) && 
    isset($_POST["prix"]) &&
    isset($_POST["medecin"]) 
) {
    if (
        !empty($_POST["adresse"]) && 
        !empty($_POST["dateL"]) && 
        !empty($_POST["prix"]) &&
        !empty($_POST["medecin"]) 
    ) {
        if(intval($_POST['prix'])<0)
        {
            echo "<script>alert('Le prix doit etre positif')</script>";
        }
        $patient = new patient(
            $_POST['adresse'],
            $_POST['dateL'],
            $_POST['prix'],
            $_POST['medecin']
        );
        $patientC->ajouterPatient($patient);
        
        header('Location:backPatient.php');
    }
    else
        $error = "Missing information";
}
if (isset($_POST["tri"]))
{
    $listeC = $patientC->afficherPatientTri($_POST["tri"]);
}

if (isset($_POST["join"]))
{
    $listeC = $patientC->afficherPatientJoin();
}

if (isset($_POST["rech"]))
{
    $listeC = afficherPatientRech($_POST["rech"],$_POST["selon"]);
}

?>


<link rel="stylesheet" href="back.css" type="text/css" media="all" />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SpringTime</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


</head>
<script src="js/saisie.js"></script>
<body>
<!--<link rel="stylesheet" href="css3/style.css" type="text/css" media="all" />-->
<!-- Header -->
<div id="header">
  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">DIAGNOSTIQUE</a></h1>
      <div id="top-navigation"><a href="logout.php">Log out</a> </div>
    </div>
    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    <div id="navigation">
    <ul>
        <li><a href="backPatient.php" class="active"><span>Gestion patients</span></a></li>
        <li><a href="backMedecin.php" class="active"><span>Gestion medecins</span></a></li>
      
      </ul>
    </div>
    <!-- End Main Nav -->
  </div>
</div>
<!-- End Header -->
<!-- Container -->
<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current Articles </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
    
    <!-- End Message OK -->
    <!-- Message Error -->
    
    <!-- End Message Error -->
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content">
        <!-- Box -->
       
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Current Accounts</h2>
            <div class="right">
             <form method="POST" action="backPatient.php">
             <input type="submit" value="reset" >
             <input type="submit" value="Voir en details" name="join"> <label>search accounts</label>
              <input type="text" class="field small-field" name="rech"/>
              <select name="selon" class="field small-field" >
             
              <option value="idL">ID</option>
                <option value="medecin">nom</option>
                <option value="adresse">adresse</option>
                <option value="dateL">date</option>
            </select>
              <input type="submit" class="button" value="search" name="search" /></form>
            </div>
          </div>
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
               
                <th>idL</th>
                <th>Adresse</th>
            
                <th>dateL</th>
                <th>prix</th>
                <th>medecin</th>
                <?php if (isset($_POST["join"]))
{
echo "<th>idMedecin</th>";
echo "<th>typeMedecin</th>";
echo "<th>NumtelMedecin</th>";
} ?>
              
               
              </tr>

              

              <?php
    foreach($listeC as $patient){
        ?>


              <tr>
                <td><?php echo $patient['idL']; ?></td>
                <td><?php echo $patient['adresse']; ?></td>
                 
                <td><?php echo $patient['dateL']; ?></td>
                <td><?php echo $patient['prix']; ?></td>
                <td><?php echo $patient['medecin']; ?></td>
                <?php if (isset($_POST["join"]))
{
echo "<td>";echo $patient['idL'];echo"</td>";
echo "<td>";echo $patientn['adresse'];echo"</td>";
echo "<td>";echo $patient['prix'];echo"</td>";
echo "<td>";echo $patient['dateL'];echo"</td>";
} ?>
               
                <td><a href="supprimerPatient.php?id=<?php echo $patient['idL']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierPatient.php?id=<?php echo $patient['idL']; ?>" class="ico edit">Edit</a>
               
              
              
              
              </td>
              </tr>
              <?php } ?>
              
              
              
              
              
              
            
           
            </table>
            <!-- End Pagging -->
          </div>
          <!-- Table -->
      
        <!-- End Box -->
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Product</h2>
          </div>
          <!-- End Box Head -->
          <form action="#" method="post">
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Adresse </label>
                <input type="text" class="field size1" name="adresse" id="adresse"/>
              </p>
              <p> 
                <label>dateL </label>
                <input type="date" class="field size1" name="dateL" id="dateL"/>
              </p>


              <p> 
                <label>Prix </label>
                <input type="number" class="field size1" name="prix" id="prix" />
              </p>
          
              <label for="medecin-select">medecin</label>

<select name="medecin" id="medecin-select">
    <?php foreach($listeL as $patient){ ?>
    <option value="<?php echo  $patient['nom'];?>"><?php echo  $patient['nom'];?></option>
    <?php } ?>
</select>

            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" onclick="verif();"/>
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <!-- Sidebar -->
      <div id="sidebar">
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2></h2>
          </div>
          <!-- End Box Head-->
          <div class="box-content"> <a href="#" class="add-button"><span></span></a>
            <div class="cl">&nbsp;</div>
            <p class="select-all">
              <input type="checkbox" class="checkbox" />
              <label></label>
            </p>
            <p><a href="#">Delete Selected</a></p>
            <!-- Sort -->
            <div class="sort">
              <form method="POST"><label>Sort by</label>
              <select name="tri" class="field" >
              <option value="idL">ID</option>
                <option value="medecin">nom</option>
                <option value="adresse">adresse</option>
                <option value="dateL">date</option>
                
              </select><input type="submit"  value="trier"></form>
              
            </div>
            <!-- End Sort -->
          </div>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
    </div>
    <div id="piechart"> </div>
    <!-- Main -->
  </div>
</div>



<!-- End Container -->
<!-- Footer -->
<div id="footer">
  <div class="shell"> <span class="left">&copy; 2010 - CompanyName</span> <span class="right"> Design by <a href="http://chocotemplates.com">Chocotemplates.com</a> </span> </div>
</div>
<!-- End Footer -->





</body>
</html>
