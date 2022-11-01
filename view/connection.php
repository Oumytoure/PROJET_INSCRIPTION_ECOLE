
<?php
 include("../model/conection_verif.php");
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
        <div style="background-color:white;border-radius:20px;height:600px;margin-top:-80px;" class="container col-md-4 border border-dark d-flex flex-column justify-content-center align-items-center">
          <div class="d-flex justify-content-center"><h2 >FORMULAIRE INSCRIPTION</h2></div>
          <div><img src="images/image.jpeg" alt="" class="border border-dark" style="margin-bottom:70px;"></div>
          <hr  style="width:80%; background-color:black; margin-top:-60px; margin-bottom:40px"/>
          <div class="d-flex flex-column justify-content-center w-50">
            <form action="" method="post"  id="form"class="d-flex flex-column justify-content-center w-100">
            <div class="col d-flex justify-content-center">
              <?php if(!empty($message1)); {?>
                <div style="display:flex; color:red;flex-direction:column;"> <?php echo $message1;  ?> </div> 
                <?php }?> 
              </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-left">EMAIL<span>*</span></label>
                    <input type="text" name="email" class="form-control mb-3 border border-dark" id="email" placeholder="name@example.com">
                    <span id="erreur2"></span>
                </div>
              
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label  d-flex justify-content-left">MOT DE PASSE<span>*</span></label>
                    <input type="password" name="mot_passe" class="form-control mb-3 border border-dark" id="mot_passe" placeholder="votre mot de passe">
                    <span id="erreur4"></span>
                  </div>
                <button class="form-control text-white " id="submit"  style="background-color:#163666;" type="submit" name="submit">CONNECTION</button>
               <a href="inscription.php"> <span class="text-primary d-flex justify-content-center mt-3" >S'INSCRIRE</span></a>
              
            </form>
            </div>
      </div>
     
      <script src="connection.js"></script>
  </body>
  <script src="../controler/connection.js"></script>

</html >