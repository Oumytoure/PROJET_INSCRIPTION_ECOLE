<?php
 include("../controler/inscription_verif.php");
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


      

        <form id="form" class="container row w-100 needs-validation d-flex" method="post" action="../controler/incription_verif.php" enctype="multipart/form-data">
        <div class="col-lg-12  d-flex justify-content-center">
        <?php 
        if(isset($_GET["erreur"])):                         
          $message = $_GET["erreur"];?>                     
            <p class="d-flex text-danger justify-content-center fs-2  align-items-center p-2"> <?php echo $message;?></p>    
              <?php endif; ?>
              </div>
              <div class="col-lg-12  d-flex justify-content-center">
              <?php 
              if(isset($_GET["erreur1"])):                         
              $email = $_GET["erreur1"];?>                     
            <p class="d-flex text-danger justify-content-center fs-2  align-items-center p-2"> <?php echo $email;?></p>    
              <?php endif; ?>
              </div>
          <div class="col-lg-6">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">PRENOM<span>*</span></label>
            <input type="text" name="prenom" id="prenom" class="form-control mb-3 border border-dark" placeholder="entre votre email" >
            <span id="erreur"></span>
          </div>
          <div class="col-lg-6">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">NOM<span>*</span></label>
            <input type="text" name="nom" id="nom" class="form-control mb-3 border border-dark" placeholder="entre votre email">
            <span id="erreur1"></span>
          </div>

          <div class="col-lg-6">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">EMAIL<span>*</span></label>
            <input type="text" id="email" name="email" class="form-control mb-3 border border-dark" placeholder="entre votre email" >
            <span id="erreur2"></span>

          </div>
          

          <div class="col-lg-6">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-select ">ROLE<span>*</span></label>
            <select type="text" id="roles" name="roles" class="form-control mb-3 border border-dark" placeholder="entre votre role" >
            <option value=""></option>
                <option>ADMINISTRATEUR</option>
                <option>UTILISATEUR</option>
              </select>
              <span id="erreur3"></span>
          </div>
          <div class="col-lg-6">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">MOT DE PASSE<span>*</span></label>
            <input type="password" id="mot_passe" name="mot_passe" class="form-control mb-3 border border-dark" placeholder="entre votre mot de passe">
            <span id="erreur4"></span>
          </div>

          <div class="col-lg-6">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">MOT DE PASSE<span>*</span></label>
            <input type="password" name="confirmation" id="confirmation" class="form-control mb-3 border border-dark" placeholder="entre votre mot de passe" >
            <span id="erreur5"></span>
          </div>
          <div class="col-lg-6">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label ">PHOTO</label>
            <input type="file" id="photo" name="image" class="form-control mb-3 border border-dark" placeholder="entrer votre photo" accept=".png,.jpeg" >
            
          </div>
          <div class="col-lg-6">
            <p ></p>
          
          </div>
          <div class="col-lg-6">
            <label for="exampleFormControlInput1" style=" display:flex;justify-content:left;" class="form-label "></label>
            <button class="form-control color" id="submit" style="background-color:#163666;color:white" type="submit" name="submit">INSCRIPTION</button>
            <!-- <span id="erreur6"></span> -->
          </div>

          <div class="col-lg-6 d-flex justify-content-center mt-3">
          <a href="connection.php"><p class="text-primary">CONNECTION</p></a>
          </div>
        </form>


    </div>
  </div>
  
  <script src="../controler/inscription.js"></script>
</body>

</html>