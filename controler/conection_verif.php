
<?php
     session_start();
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
    $message1=""; 
    $message2=""; 
    @$email =$_POST["email"];
    @$mot_passe =md5($_POST["mot_passe"]) ;

     if(isset($_POST["submit"])){ 
        if(isset($_POST["email"]) && isset($_POST["mot_passe"]) && !empty($_POST["email"]) && !empty($_POST["mot_passe"]))
        { 
/*  if(isset($_SESSION['UTILISATEUR']))
if($_SESSION['roles']==0){ 
  echo $_SESSION['UTILISATEUR'];
}  */
       
                   try{
                    include("connection_bd.php");
                  $sth = $dbco->prepare("SELECT * FROM INSCRIPTION WHERE email = '$email'"); 
                  $sth->execute();
                  $res = $sth->fetchAll(PDO::FETCH_ASSOC)[0]; 
                  /* var_dump(@$res);
                    die; */
                /* ie;  */ 
                  if(count($res) > 0    && $res['roles'] == 'ADMINISTRATEUR' && $res['etat'] ==0   ){ 
                    
                    $_SESSION["id"]=$res["id"];
                    $_SESSION["prenom"]=$res["prenom"];
                    $_SESSION["nom"]=$res["nom"];
                    $_SESSION["matricule"]=$res["matricule"];
                    $_SESSION["photo"]=$res["photo"];
                    
                  
                      header("Location:pagination.php");
                  }
                  else if(count($res) > 0  && $res['roles'] == 'UTILISATEUR' && $res['etat'] ==0  ){
                    $_SESSION["id"]=$res["id"];
                    $_SESSION["prenom"]=$res["prenom"];
                    $_SESSION["nom"]=$res["nom"]; 
                    $_SESSION["matricule"]=$res["matricule"];
                    $_SESSION["photo"]=$res["photo"];
                      header("Location:../view/accueil_user_simple.php");
                  }  
                  else if($res['etat'] ==1 ){
                    
                      header("Location:../view/connection.php?erreur=Vous êtes archiver ,vous n'avez pas de compte");
                  }  
                    
                  else
                  {
                      header("location:../view/connection.php?erreur=Vous n'êtes pas dans la base de données, inscrivez-vous");
                  
                  }
                    
                  }
                  
                  catch(PDOException $e){ echo ("Erreur:".$e->getMessage());}
             
                   } 
                }  
                
              
        ?>
        
                }
            }
        

       










        ?>