<link rel="stylesheet" href="back.css" type="text/css" media="all" />
<?php
 include_once '../Controller/PatientC.php';
 
 $co = new patientC();
 if(isset($_GET['id'])){
   $patientC = new patientC();
   $listeC = $patientC->afficherPatientDetail($_GET['id']);
 
 foreach($listeC as $patient){
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
                <label>Adresse </label>
                <input type="text" class="field size1" name="adresse" value="<?php echo $patient['adresse'];?>" />
              </p>
              <p> 
                <label>DateL </label>
                <input type="date" class="field size1" name="dateL" value=<?php echo $patient['dateL'];?> />
              </p>


              <p> 
                <label>Prix </label>
                <input type="number" class="field size1" name="prix" value=<?php echo $patient['prix'];}?> />
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
 $patient = null;

 // create an instance of the controller

 $patientC = new patientC();
 if (
     isset($_POST["adresse"]) && 
      isset($_POST["dateL"]) && 
     isset($_POST["prix"])
 ) {
     if (
         !empty($_POST["adresse"]) && 
         !empty($_POST["dateL"]) && 
         !empty($_POST["prix"]) 
     ) {
         $patient = new patient(
             $_POST['adresse'],
             $_POST['dateL'],
             $_POST['prix']
         );
        $patientC->modifierPatient($_GET['id'],$patient);
         
      header('Location:backPatient.php');
     }
     else
         $error = "Missing information";
 }

 
}

?>