<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
$message="";
$message1="";



if (isset($_POST["submit"])) {
  @$prenom = $_POST["prenom"];
@$nom = $_POST["nom"];
@$email = $_POST["email"];
@$roles = $_POST["roles"];
@$mot_passe = md5($_POST["mot_passe"]);

  if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["roles"]) /* && isset($_POST["photo"]) */) {
    if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["roles"])) {
 
     if (!empty($_FILES["image"])) {
        $photo = file_get_contents($_FILES['image']['tmp_name']) ?? null;
      } 

      
//On verifie si l'email existe dans la base de donnée ou pas
      include("connection_bd.php");
      $sth = $dbco->prepare(" SELECT * FROM INSCRIPTION  WHERE email = '".$email."'"); 
            $sth->execute();
            $res = $sth->fetchAll(PDO::FETCH_ASSOC); 
            if(count($res) == 0){ 
      $sth = $dbco->prepare(" INSERT INTO INSCRIPTION(prenom,nom,email,roles,mot_passe,photo)
    VALUES (?, ?, ?, ?, ?, ?) ");

      $sth->bindParam(1, $prenom);
      $sth->bindParam(2, $nom);
      $sth->bindParam(3, $email);
      $sth->bindParam(4, $roles);
      $sth->bindParam(5, $mot_passe);
      $sth->bindParam(6, $photo);
      $sth->execute();
      header("location:../view/inscription.php?erreur=Enregistrement valide !");
     
              $sql = "SELECT id FROM INSCRIPTION WHERE email = '".$email."'";
                $id = $dbco->prepare($sql);
                $id->execute();
                $row = $id->fetch(PDO::FETCH_ASSOC);
                //on modifie le matricule
                $matricule = 'SN-'.$row['id'].date('-Y', time());
                //on modifie la derniere matricule de la BD
                $sql2 = "UPDATE INSCRIPTION   SET  matricule = '$matricule' WHERE email = '".$email."'";
                $matricule2 = $dbco->prepare($sql2);
                $matricule2->execute();
              
    }  else {
        
        header("location:../view/inscription.php?erreur1=Cet email existe déjà !");
        
    }
  }
} 
} 


?>