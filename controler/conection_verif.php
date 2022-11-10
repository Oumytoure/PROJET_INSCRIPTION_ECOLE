
<?php
     
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
    $message1=""; 
    $message2=""; 
    @$email =$_POST["email"];
    @$mot_passe =md5($_POST["mot_passe"]) ;

     if(isset($_POST["submit"])){ 
        if(isset($_POST["email"]) && isset($_POST["mot_passe"]) && !empty($_POST["email"]) && !empty($_POST["mot_passe"]))
        { 
 if(isset($_SESSION['UTILISATEUR']))
if($_SESSION['roles']==0){ 
  echo $_SESSION['UTILISATEUR'];
} 
       
                   try{
                    include("connection_bd.php");
                  $sth = $dbco->prepare(" SELECT * FROM INSCRIPTION WHERE email = '".$email."' AND mot_passe = '".$mot_passe."'"); 
                  $sth->execute();
                  $res = $sth->fetchAll(PDO::FETCH_ASSOC);
                   
                  
                   
                    if (count($res) == 0) {
                        $message = "Compte introuvable, inscrivez-vous";
                        header("location:../view/connection.php?erreur=Compte introuvable, inscrivez-vous");
                    } else {
        
                      $ins = $dbco->prepare(" SELECT  id,roles,nom,prenom,matricule,photo,etat  FROM  INSCRIPTION WHERE email = '".$email."'");
                        $ins->execute();
                        $row = $ins->fetch(PDO::FETCH_ASSOC);
                        $role = $row['roles'];
                        $etat = $row['etat'];




                 
                  if( $role == 'ADMINISTRATEUR' && $etat ==0 ){ 
                    $_SESSION["id"]=$res["id"];
                    $_SESSION["prenom"]=$res["prenom"];
                    $_SESSION["nom"]=$res["nom"];
                    $_SESSION["matricule"]=$res["matricule"];
                    $_SESSION["photo"]=$res["photo"];
                  
                      header("Location:pagination.php");
                  }
                  else if( $role == 'UTILISATEUR' && $etat ==0 ){
                    $_SESSION["id"]=$res["id"];
                    $_SESSION["prenom"]=$res["prenom"];
                    $_SESSION["nom"]=$res["nom"]; 
                    $_SESSION["matricule"]=$res["matricule"];
                    $_SESSION["photo"]=$res["photo"];
                      header("Location:../view/accueil_user_simple.php");
                  }  
                  else if($etat ==1 ){
                    
                      header("Location:../view/connection.php?erreur=Vous êtes archiver ,vous n'avez pas de compte");
                  }  
                    
                  else
                  {
                    header("Location:../view/connection.php?erreur=Vous n'êtes pas dans la base de données, inscrivez-vous");
                  
                  }
                    
                  }
                }
                  catch(PDOException $e){ echo ("Erreur:".$e->getMessage());}
             
                   } 
                }  
                
              
        ?>
        
                }
            }
        

       










        ?>