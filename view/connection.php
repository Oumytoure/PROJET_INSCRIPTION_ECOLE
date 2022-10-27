
<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
$message=""; 
$message1=""; 
@$email = $_POST["email"];
@ $mot_passe = $_POST["mot_passe"];

    if(isset($_POST["valider"])){
        if(isset($_POST["email"]) && isset($_POST["mot_passe"]))
        {
          if(empty($email )) $message.= "<li> veuillez enter votre mail!</li>";
         if(empty($mot_passe)) $message.="<li>veuillez enter votre mot_passe !</li>";
        
          if(empty($message)){
            
            /* if(!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["adresse"]) && !empty($_POST["email"]) && !empty($_POST["date_naissance"]) && !empty($_POST["fonction"]) && !empty($_POST["nationalite"]) && !empty($_POST["sexe"]) && !empty($_POST["telephone"])){ */
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == '') {
                    /* header("Location: inscription_employes.php?err=email");*/
                    echo "Veuillez entrer un email correct";
                    exit();
                  }  
                
                include("Connection_bd.php");
                $sth = $dbco->prepare(" SELECT * FROM INSCRIP WHERE email = '".$email."'"); 
                $sth->execute();
                $res = $sth->fetchAll(PDO::FETCH_ASSOC); 
               if(count($res) == 0){  

                $sth = $dbco->prepare(" INSERT INTO INSCRIPTION(email,mot_passe)
                VALUES (?, ?) "); 
    
                $sth->bindValue(1, $email);
                $sth->bindValue(2, $mot_passe);
                
                $sth->execute();

                $message1.="<label>Enregistrement valide !</label>";
              }
              else{
                 $message1.="<label>Enregistrement invalide !</label>";
                $message3.="<label>Cet email existe déjà !</label>"; 

              }
                
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
        <div style="background-color:white;border-radius:20px;height:600px;margin-top:-80px;" class="container col-md-4 border border-dark d-flex flex-column justify-content-center align-items-center">
          <div class="d-flex justify-content-center"><h2 >FORMULAIRE INSCRIPTION</h2></div>
          <div><img src="images/image.jpeg" alt="" class="border border-dark" style="margin-bottom:70px;"></div>
          <hr  style="width:80%; background-color:black; margin-top:-60px; margin-bottom:40px"/>
          <div class="d-flex flex-column justify-content-center w-50">
            <form action="" method="post" class="d-flex flex-column justify-content-center w-100">

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-center">EMAIL </label>
                    <input type="email" class="form-control mb-3 border border-dark" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <?php if(!empty($message)); {?>
                <div style="display:flex; color:red;flex-direction:column;"> <?php echo $message; ?> </div> 
                <?php }?> 
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label  d-flex justify-content-center">MOT DE PASSE</label>
                    <input type="mot-passe" class="form-control mb-3 border border-dark" id="exampleFormControlInput1" placeholder="votre mot de passe">
                </div>
                <?php if(!empty($message)); {?>
                <div style="display:flex; color:red;flex-direction:column;"> <?php echo $message; ?> </div> 
                <?php }?> 
                <button class="form-control text-white " style="background-color:#163666;" type="submit" name="valider">CONNECTION</button>
                <span class="text-success mt-3 text-center">S'INSCRIRE</span>
               
            </form>
            </div>
        </div>
