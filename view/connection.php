
<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
$message1=""; 
$message2=""; 
@$email = $_POST["email"];
@ $mot_passe = $_POST["mot_passe"];

    if(isset($_POST["submit"])){
        if(isset($_POST["email"]) && isset($_POST["mot_passe"]))
        {
          
          if(empty($message)){
            
            /* if(!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["adresse"]) && !empty($_POST["email"]) && !empty($_POST["date_naissance"]) && !empty($_POST["fonction"]) && !empty($_POST["nationalite"]) && !empty($_POST["sexe"]) && !empty($_POST["telephone"])){ */
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == '') {
                    /* header("Location: inscription_employes.php?err=email");*/
                    echo "Veuillez entrer un email correct";
                    exit();
                  }  
                
                  include("connection_bd.php");
                  session_start();
              
                  try{
                  $sth = $dbco->prepare(" SELECT * FROM comptes WHERE email = '".$email."' AND mot_de_passe = '".$mot_passe."' "); 
                  $sth->execute();
                  $res = $sth->fetch(PDO::FETCH_ASSOC); 
                  $_session["nom"]=$res["nom"];
                  $_session["prenom"]=$res["prenom"];
                  $_session["matricule"]=$res["matricule"];
                  $_session["photo"]=$res["photo"];
                  if(count($res) > 0){        
                      $message1.="<label>Vous n'êtes pas dans la base de données, inscrivez-vous</label>";
                      }
                  else
                  {
                      if($profil == 'Administrateur'){
                          header("Location:accueil_admin.php");
                      }
                      else if($profil == 'Secretaire'){
                          header("Location:accueil_user_simple.php");
                      }
                   
                      
                  }
                  }
                  catch(PDOException $e){ echo ("Erreur:".$e->getMessage());}
                 
                   }
                }
               } 
              /*   $sth = $dbco->prepare(" SELECT * FROM INSCRIP WHERE email = '".$email."'"); 
                $sth->execute();
                $res = $sth->fetchAll(PDO::FETCH_ASSOC); 
               if(count($res) == 0){  

                $sth = $dbco->prepare(" INSERT INTO INSCRIPTION(prenom,nom,email,fonction,mot_passe,photo)
                VALUES (?, ?, ?, ?, ?, ?) ");
                $sth->bindValue(1, $prenom);
                $sth->bindValue(2, $nom);
                $sth->bindValue(3, $email);
                $sth->bindValue(4, $roles);
                $sth->bindValue(5, $mot_passe);
                $sth->bindValue(6, $photo);
                $sth->execute();

                $message1.="<label>Enregistrement valide !</label>";
              }
              else{
                 $message1.="<label>Enregistrement invalide !</label>";
                $message2.="<label>Cet email existe déjà !</label>"; 

              }
                
            }
            
        }
    } */
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
            <form action="" method="post" class="d-flex flex-column justify-content-center w-100">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-left">EMAIL<span>*</span></label>
                    <input type="email" class="form-control mb-3 border border-dark" id="email" placeholder="name@example.com">
                    <span id="erreur2"></span>
                </div>
              
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label  d-flex justify-content-left">MOT DE PASSE<span>*</span></label>
                    <input type="mot_passe" class="form-control mb-3 border border-dark" id="mot_passe" placeholder="votre mot de passe">
                  </div>
                <button class="form-control text-white " style="background-color:#163666;" type="submit" name="valider">CONNECTION</button>
                <span class="text-primary d-flex justify-content-center mt-3" >S'INSCRIRE</span>
                <span id="erreur4"></span>
            </form>
            </div>
      </div>
      <script src="connection.js"></script>
  </body>
</html >