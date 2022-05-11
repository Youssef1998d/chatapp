<link rel="stylesheet" href="back.css" type="text/css" media="all" />
<?php
 include_once '../Controller/medecinC.php';
 
 
 if(isset($_GET['id'])){
   $medecinC = new medecinC();
   $listeC = $medecinC->afficherMedecinDetail($_GET['id']);
 
 foreach($listeC as $medecin){
 ?>
 <body>


  <div class="shell">
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">Antico</a></h1>
  </div>
   <form action="" method="post">
   <!-- Box -->
   <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Event</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Nom </label>
                <input type="text" class="field size1" name="nom" value="<?php echo $medecin['nom'];?>" />
              </p>
              <p> 
                <label>Type </label>
                <input type="text" class="field size1" name="type" value=<?php echo $medecin['type'];?> />
              </p>


              <p> 
                <label>Numtel </label>
                <input type="number" class="field size1" name="numtel" value=<?php echo $medecin['numtel'];}?> />
              </p>
            

             

             
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" />
            </div>
            <!-- End Form Buttons -->
          </form>
 </div>
 </div>
 <?php
 // create event
 $medecin = null;

 // create an instance of the controller

 $medecinC = new medecinC();
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
         $medecin = new medecin(
             $_POST['nom'],
             $_POST['type'],
             $_POST['numtel']
         );
        $medecinC->modifierMedecin($_GET['id'],$medecin);
         
      header('Location:backMedecin.php');
     }
     else
         $error = "Missing information";
 }

 
}

?>