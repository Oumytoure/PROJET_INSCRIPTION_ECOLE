
<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
$message1=""; 
$message2=""; 
@$email = $_POST["email"];
@ $mot_passe = $_POST["mot_passe"];

    
        if(isset($_POST["email"]) && isset($_POST["mot_passe"]) && !empty($_POST["email"]) && !empty($_POST["mot_passe"]))
        {

          
          if(empty($message)){
            
            /* if(!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["adresse"]) && !empty($_POST["email"]) && !empty($_POST["date_naissance"]) && !empty($_POST["fonction"]) && !empty($_POST["nationalite"]) && !empty($_POST["sexe"]) && !empty($_POST["telephone"])){ */
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == '') {
                    /* header("Location: inscription_employes.php?err=email");*/
                    $message1.="<label>Veuillez entrer un bon mail </label>";
                    exit();
                  }  
                
                  include("../controler/connection_bd.php");
                  
              
                  try{
                  $sth = $dbco->prepare(" SELECT * FROM INSCRIPTION WHERE email = '".$email."'"); 
                  $sth->execute();
                  $res = $sth->fetch(PDO::FETCH_ASSOC); 
                 
                  if(count($res) > 0 && $mot_passe == $res["mot_passe"] && $res["roles"] == 'ADMINISTRATEUR'){ 
                    $_SESSION["nom"]=$res["nom"];
                    $_SESSION["prenom"]=$res["prenom"];
                    $_SESSION["matricule"]=$res["matricule"];
                    $_SESSION["photo"]=$res["photo"];
                  
                      header("Location:acceuil_admin.php");
                  }
                  else if(count($res) > 0 && $mot_passe == $res["mot_passe"] && $res["roles"] == 'UTILISATEUR'){
                    $_SESSION["nom"]=$res["nom"];
                    $_SESSION["prenom"]=$res["prenom"];
                    $_SESSION["matricule"]=$res["matricule"];
                    $_SESSION["photo"]=$res["photo"];
                      header("Location:accueil_user_simple.php");
                  }       
                      
                  else
                  { 
                    $message1.="<label>Vous n'êtes pas dans la base de données, inscrivez-vous</label>";
                  }
                      
                  }
                  
                  catch(PDOException $e){ echo ("Erreur:".$e->getMessage());}
                 
                   }
                }
            /*     
                if($_SERVER['REQUEST_METHODE']=='POST'){

              
                $email=$_POST['email'];
                $mot_passe=sha1($_POST['mot_passe']);
                $stmt= $conn-> prepare("SELECT * FROM UTILISATEUR WHERE email= ? AND mot_pass= ? LIMIT 1 ");
                $stmt->excecute(array($email,$mot_passe));
                $checkUTILISATEUR = $stmt->rowCount();
                $UTILISATEUR=  $stmt->fetch();
                if($checkUTILISATEUR >0){
                  $_SESSION['UTILISATEUR']=$UTILISATEUR['email'];

                }
              } */
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
