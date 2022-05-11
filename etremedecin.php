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
            intval($_POST['numtel'])
        );
        $medecinC->ajouterMedecin($medecin);
        
        header('Location:front.php');
    }
    }
    else
        $error = "Missing information";
}
?>
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register Today</h3>
                        <p>Fill in the data below.</p>
                        <form method="POST" class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="nom" id="nom" placeholder="Nom..." required>
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="text" name="numtel" id="numtel" placeholder="Numtel..." required>
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="text" name="type" id="type" placeholder="type de specialité..." required>
                            </div>

                            

                           


                         


                       


                            <div class="form-button mt-3">
                              <input type="submit" value="Submit" onclick="verif();">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}
.button5 {background-color: #555555;} /* Black */

html, body {
    height: 100%;
    background-color: #152733;
    overflow: hidden;
}


.form-holder {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      min-height: 100vh;
}

.form-holder .form-content {
    position: relative;
    text-align: center;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
    padding: 60px;
}

.form-content .form-items {
    border: 3px solid #fff;
    padding: 40px;
    display: inline-block;
    width: 100%;
    min-width: 540px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: left;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.form-content h3 {
    color: #fff;
    text-align: left;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-content h3.form-title {
    margin-bottom: 30px;
}

.form-content p {
    color: #fff;
    text-align: left;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    margin-bottom: 30px;
}


.form-content label, .was-validated .form-check-input:invalid~.form-check-label, .was-validated .form-check-input:valid~.form-check-label{
    color: #fff;
}

.form-content input[type=text], .form-content input[type=password], .form-content input[type=email], .form-content select {
    width: 100%;
    padding: 9px 20px;
    text-align: left;
    border: 0;
    outline: 0;
    border-radius: 6px;
    background-color: #fff;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    margin-top: 16px;
}


.btn-primary{
    background-color: #6C757D;
    outline: none;
    border: 0px;
     box-shadow: none;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active{
    background-color: #495056;
    outline: none !important;
    border: none !important;
     box-shadow: none;
}

.form-content textarea {
    position: static !important;
    width: 100%;
    padding: 8px 20px;
    border-radius: 6px;
    text-align: left;
    background-color: #fff;
    border: 0;
    font-size: 15px;
    font-weight: 300;
    color: #8D8D8D;
    outline: none;
    resize: none;
    height: 120px;
    -webkit-transition: none;
    transition: none;
    margin-bottom: 14px;
}

.form-content textarea:hover, .form-content textarea:focus {
    border: 0;
    background-color: #ebeff8;
    color: #8D8D8D;
}

.mv-up{
    margin-top: -9px !important;
    margin-bottom: 8px !important;
}

.invalid-feedback{
    color: #ff606e;
}

.valid-feedback{
   color: #2acc80;
}
</style>
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