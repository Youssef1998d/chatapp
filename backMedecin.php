
<?php

include_once '../Model/medecin.php';
include_once '../Controller/medecinC.php';
$medecinC = new medecinC();
$listeC = $medecinC->afficherMedecin();


if (
    isset($_POST["nom"]) && 
     isset($_POST["type"]) && 
    isset($_POST["numtel"])
) {
    if (
        !empty($_POST["nom"]) && 
        !empty($_POST["type"]) && 
        !empty($_POST["numtel"]) 
    ) {
        if(!(strlen($_POST['numtel'])!=8 || strlen($_POST['nom'])>15 || strlen($_POST['type'])>15))
        {
            
        
        
        $medecin = new medecin(
            $_POST['nom'],
            $_POST['type'],
            $_POST['numtel']
        );
        $medecinC->ajouterMedecin($medecin);
        
        header('Location:backMedecin.php');
    }
    }
    else
        $error = "Missing information";
}
if (isset($_POST["tri"]))
{
    $listeC = $medecinC->afficherMedecinTrie($_POST["tri"]);
}
if (isset($_POST["rech"]))
{
    $listeC = $medecinC->afficherMedecinRech($_POST["rech"],$_POST["selon"]);
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
      <h1><a href="#">DIAGNOSTIQUE
      
      </a></h1>
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
             <form method="POST" action="backMedecin.php">
             <input type="submit" value="reset" >
             <input type="submit" value="Voir en details" name="det"> <label>search accounts</label>
              <input type="text" class="field small-field" name="rech"/>
              <select name="selon" class="field small-field" >
             
              <option value="id">ID</option>
    <option value="nom">Nom</option>
    <option value="type">Type</option>
            </select>
              <input type="submit" class="button" value="search" name="search" /></form>
            </div>
          </div>
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
               
                <th>id</th>
                <th>Nom</th>
            
                <th>spécialté</th>
                <th>Numtel</th>
                
              
               
              </tr>

              

              <?php
    foreach($listeC as $medecin){
        ?>


              <tr>
                <td><?php echo $medecin['id']; ?></td>
                <td><?php echo $medecin['nom']; ?></td>
                 
                <td><?php echo $medecin['type']; ?></td>
                <td><?php echo $medecin['numtel']; ?></td>
               
               
                <td><a href="supprimerMedecin.php?id=<?php echo $medecin['id']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierMedecin.php?id=<?php echo $medecin['id']; ?>" class="ico edit">Edit</a>
               
              
              
              
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
                <label>Nom </label>
                <input type="text" class="field size1" name="nom" id="nom"/>
              </p>
              <p> 
                <label>type </label>
                <input type="text" class="field size1" name="type" id="type"/>
              </p>


              <p> 
                <label>Numtel </label>
                <input type="number" class="field size1" name="numtel" id="numtel" />
              </p>
          
              

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
              
                <option value="id">ID</option>
                <option value="nom">Nom</option>
                <option value="type">Type</option>
                
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

<script>
    function verif() {

var nom=document.getElementById('nom').value;
var type=document.getElementById('type').value;
var numtel=document.getElementById('numtel').value;

if (nom.length === 0 || type.length === 0 || numtel.length===0) {
    alert("Vérifier vos donneés ");
}
else {
if (nom.length >15)
{
    alert("Votre nom doit avoir une longueur inférieur à 15 caractères");
}
else {

if (type.length >15)
{
    alert("Votre type doit avoir une longueur inférieur à 15 caractères");
}

else{

if (numtel.length!=8)
{
    alert("Votre numtel dot s'ecrire sur 8 chiffres");
}


}
}
}














}
</script>