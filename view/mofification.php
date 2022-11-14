
<?php

include '../controler/connection_bd.php';

if(isset($_GET['updateid'])){
   
    $id =$_GET['updateid'];
    $sth = $dbco->prepare("SELECT * FROM INSCRIPTION where id=$id");

    $sth->execute();
    if ($sth->rowCount() > 0) {
        $check=$sth->fetchAll()[0];


    }
     
if(isset($_POST['nom'],$_POST['prenom'],$_POST['email'])){
 
	$nom=$_POST['nom'];	
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];			
  
    $id=$_GET['updateid'];	
    $date_modif=date('y-m-d');
  
    $sthModifPersonne=$dbco->prepare("UPDATE INSCRIPTION SET nom='$nom',prenom='$prenom',email='$email',date_modif='$date_modif' WHERE id=$id");

    $sthModifPersonne->execute();
    
    
    if($sthModifPersonne){
    
      header('Location:../controler/pagination.php?'); 
    
    }else { die('Erreur : '.$e->getMessage());}
   
}

}


?>


<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="laReussite.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/431fa92df2.js" crossorigin="anonymous"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <title>modification</title>
  </head>
  <body>

  <body class="d-block justify-content-center align-items-center">  
   
   <div><img src="images/gg.jpg" class="w-100" style="height:250px;object-fit:cover;"></div>
     <div style="background-color:white;border-radius:20px;height:600px;margin-top:-80px;" class="container col-md-4 border border-dark d-flex flex-column justify-content-center align-items-center">
       <div class="d-flex justify-content-center"><h2 >FORMULAIRE DE MODIFICATION</h2></div>
       <div><img src="images/image.jpeg" alt="" class="border border-dark" style="margin-bottom:70px;"></div>
       <hr  style="width:80%; background-color:black; margin-top:-60px; margin-bottom:40px"/>
       <div class="d-flex flex-column justify-content-center w-50">
         <form action="" method="post"  id="form"class="d-flex flex-column justify-content-center w-100">

      </div>
      <div>
<div><p><?= $success ?? null  ?> </p> </div>
<div><p><?= $erreur ?? null  ?> </p> </div>
      </div>
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Prenom*</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $check["prenom"] ?? null  ?>" placeholder="PRENOM">
        <span id="erreur"></span>

      </div>

      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Nom*</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $check["nom"] ?? null  ?>" placeholder="NOM">
        <input type="text" name="nom" id="nom" class="form-control mb-3 border border-dark" placeholder="entre votre email">
            <span id="erreur1"></span>

      </div>
      <div class="col-6">
        <label for="inputAddress" class="form-label">Email*</label>
        <input type="text" autocomplete="off" class="form-control" id="email" value="<?= $check["email"] ?? null  ?>" placeholder="Email" name="email">
        <span id="erreur2"></span>

      </div>
      <br>
    
      <div class="col-12 d-flex justify-content-center">
        <button type="submit" class="btn btn-warning" name="submit">Modifier</button>
            </div> 
      <script src="../controler/inscription.js"></script>
    </form>
    </div>


 
  </body>
</html>