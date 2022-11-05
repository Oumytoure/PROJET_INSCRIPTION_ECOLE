<?php
$message1 = "";
$message2 = "";
$message3 = "";
$message4 = "";
$message5 = "";
$message6 = "";
@$prenom = $_POST["prenom"];
@$nom = $_POST["nom"];
@$email = $_POST["email"];
@$role = $_POST["role"];
@$mot_passe = $_POST["mot_passe"];
@$photo = $_POST["photo"];

if (isset($_POST["valider"])) {
  if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["role"]) && isset($_POST["mot_passe"]) && isset($_POST["photo"])) {
    if (empty($prenom)) $message1 .= "<li>entrer votre prenom!</li>";
    if (empty($nom)) $message2 .= "<li>entrer votre nom !</li>";
    if (empty($email)) $message3 .= "<li>enter votre email!</li>";
    if (!empty($role))  $message4 .= "<li>selection un fonction!</li>";
    if (empty($mot_pase)) $message5 .= "<li>saisir votre mot_passe!</li>";
    if (empty($photo)) $message6 .= "<li>selectionner une photo !</li>";
    if (empty($message)) {



      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == '') {
        /*  echo "Veuillez entrer un email correct"; */
        exit();
      }

      include("Connection_bd.php");
      $sth = $dbco->prepare(" INSERT INTO INSCRIPTION(prenom,nom,email,fonction,mot_passe,photo)
  VALUES (?, ?, ?, ?, ?, ?) ");

      $sth->bindValue(1, $prenom);
      $sth->bindValue(2, $nom);
      $sth->bindValue(4, $email);
      $sth->bindValue(5, $fonction);
      $sth->bindValue(6, $mot_passe);
      $sth->bindValue(7, $photo);
      $sth->execute();

      $message2 .= "<label>Enregistrement valide !</label>";
    } else {
      $message2 .= "<label>Enregistrement invalide !</label>";
      $message3 .= "<label>Cet email existe déjà !</label>";
    }
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Document</title>
</head>

<body class="d-block justify-content-center align-items-center">

  <div><img src="images/gg.jpg" class="w-100" style="height:250px;object-fit:cover;"></div>
  <div style="background-color:white;border-radius:20px;height:700px;margin-top:-80px;" class="container col-md-5 border border-dark d-flex flex-column justify-content-center align-items-center">
    <div class="d-flex justify-content-center">
      <h2>FORMULAIRE INSCRIPTION</h2>
    </div>
    <div><img src="images/image.jpeg" alt="" class="border border-dark" style="margin-bottom:70px;"></div>
    <hr style="width:80%; background-color:black; margin-top:-60px; margin-bottom:60px" />
    <div class="d-flex  justify-content-center ">


      <!-- <form action="inscription.php" class='needs-validation' method="post" >

        <div class="row">
          <div class="col">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label">PRENOM:</label>
            <input type="text" name="prenom" class="form-control mb-3 border border-dark" id="exampleFormControlInput1" placeholder="votre prenom">
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>


          <div class="col">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label">NOM:</label>
            <input type="text" name="nom" class="form-control mb-3 md-4 border border-dark" id="exampleFormControlInput1" placeholder="votre nom">
          </div>


        </div>
        <div class="row">
          <div class="col">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">EMAIL:</label>
            <input type="email" name="email" class="form-control mb-3 border border-dark" placeholder="entre votre email">
          </div>


          <div class="col">
            <label for="exampleFormControlInput1" style="" class="form-label d-flex justify-content-left">ROLE:</label>
            <select type="text" name="role" class="form-control mb-3 border border-dark" id="exampleFormControlInput1" placeholder="votre role">
              <option value=""></option>
              <option>ADMINISTRATEUR</option>
              <option>UTILISATEUR</option>
            </select>
          </div>


        </div>

        <div class="row">
          <div class="col">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">MOT_PASSE:</label>
            <input type="text" name="mot_passe" class="form-control mb-3 border border-dark c" id="exampleFormControlInput1" placeholder="votre mot de passe">
          </div>


          <div class="col">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">MOT_PASSE:</label>
            <input type="text" name="mot_passe" class="form-control mb-3  border border-dark " id="exampleFormControlInput1" placeholder="votre mot de passe">
          </div>


        </div>

        <div class="row d-flex flex-column ">
          <div class="col ">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">PHOTO:</label>

            <input type="file" name="photo" style="margin-left:0;" class="form-control mb-3 border border-dark col-lg-6" id="exampleFormControlInput1" placeholder="votre mot de passe">
          </div>


          <div class="col d-flex flex-row ">
            <button class="form-control text-white  col-lg-6" style="background-color:#163666;" type="submit" name="valider">S'INSCRIRE</button>

            <span class="text-success mt-2 " style="margin-left:50px;">CONNECTION</span>
          </div>
        </div>



      </form> -->




<form class="row w-75 needs-validation d-flex " novalidate>

     <div class="row "> 
          <div class="col ">
              <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label">PRENOM</label>
              <input type="text" name="prenom" class="form-control  mb-3 border border-dark " id="exampleFormControlInput1" placeholder="votre prenom" required>
              <div class="invalid-feedback">
              entrer votre prenom!
              </div>
         </div>
          <div class="col">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label">NOM</label>
            <input type="text" name="nom" class="form-control mb-3 border border-dark" id="exampleFormControlInput1" placeholder="votre nom" required>
            <div class="invalid-feedback">
            entrer votre nom!
            </div>
           </div>
        </div> 
       <div class="row">
            <div class="col">
              <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">EMAIL</label>
              <input type="email" name="email" class="form-control mb-3 border border-dark" placeholder="entre votre email"required >
              <div class="invalid-feedback">
                entrer votre email!
              </div>
            </div>
           
           
            <div class="col">
              <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">EMAIL</label>
              <select type="text" name="role" class="form-control mb-3 border border-dark" id="exampleFormControlInput1" placeholder="votre role" required>
                <option value=""></option>
                <option>ADMINISTRATEUR</option>
                <option>UTILISATEUR</option>
              </select>
              <div class="invalid-feedback">
                selection votre role
              </div>
              </div>
            </div>
            </div>
         <!--      <label for="exampleFormControlInput1"  class="form-label " style=" display:flex;justify-content:left;" >ROLE</label>
              <select type="text" name="role" class="form-control mb-3 border border-dark" id="exampleFormControlInput1" placeholder="votre role" required>
                <option value=""></option>
                <option>ADMINISTRATEUR</option>
                <option>UTILISATEUR</option>
              </select>
              <div class="invalid-feedback">
                selection votre role
              </div>
            </div>
        </div> -->
 <!-- 
        <div class="row">
          <div class="col">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">MOT_PASSE</label>
            <input type="text" name="mot_passe" class="form-control mb-3 border border-dark c" id="exampleFormControlInput1" placeholder="votre mot de passe" required>
            <div class="invalid-feedback">
            saisir votre mot_passe
          </div>
          </div>


          <div class="col">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">MOT_PASSE</label>
            <input type="text" name="mot_passe" class="form-control mb-3  border border-dark " id="exampleFormControlInput1" placeholder="votre mot de passe" required>
            <div class="invalid-feedback">
           confirmer votre mot de passe
          </div>
          </div>


        </div>

        <div class="row d-flex flex-column ">
          <div class="col ">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">PHOTO</label>
            <input type="file" name="photo" class="form-control mb-3 border border-dark col-lg-" id="exampleFormControlInput1" placeholder="votre mot de passe" >
          
          </div>
 

          <div class="col  d-flex flex-row " style="gap:30px;">
            <button class="form-control text-white col-lg-12" style="background-color:#163666;" type="submit" name="valider">S'INSCRIRE</button>

            <span class="text-success mt-2  " style="margin-left:50px;">CONNECTION</span>
          </div>
        </div> -->

  <!-- <div class="col-md-6">
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" id="validationCustom01" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" id="validationCustom02" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationCustom03" required>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
    <div class="invalid-feedback">
      Please select a valid state.
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom05" class="form-label">Zip</label>
    <input type="text" class="form-control" id="validationCustom05" required>
    <div class="invalid-feedback">
      Please provide a valid zip.
    </div>
  </div>
  
  <div class="col-md-6">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div> -->
</form>


    </div>
  </div>



  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
</body>




</html>