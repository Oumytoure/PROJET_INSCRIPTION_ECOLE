<!-- <?php
/* $sth = $dbco->prepare("UPDATE INSCRIPTION  set nom =:nom, prenom=:prenom, email=:email WHERE id=num LIMIT 1"); 
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if(!empty($id) && is_numeric($id)){
            include("../controler/connection_db.php");
            $list = "SELECT * FROM INSCRIPTION where id=$id";
            $result = $dbco->query($list);
            $data = $result->fetch();
                $id = $data["id"]; 
                $nom = $data["nom"];
                $prenom = $data["prenom"];
                $email = $data["email"];
        
               
                echo "<form action='modifier.php' method='post'><input value='$id' name='id'><input value='$nom' name='nom'><input value='$prenom' name='prenom'><input value=' $email' name='email'><input value=' $email' name='email'>
                <input onclick='return confirm(\"Êtes-vous sûr de vouloir modifier\")' class='btn btn-warning' value='Modifier' type='submit' name='valide'></form>";
                
                include("../controler/connection_bd.php");
                    
                    
                    
                    
                    
                    
                    
        
            }
              

}  */
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
<body class="d-block justify-content-center align-items-center">  
   
   <div><img src="images/gg.jpg" class="w-100" style="height:250px;object-fit:cover;"></div>
     <div style="background-color:white;border-radius:20px;height:600px;margin-top:-80px;" class="container col-md-4 border border-dark d-flex flex-column justify-content-center align-items-center">
       <div class="d-flex justify-content-center"><h2 >FORMULAIRE INSCRIPTION</h2></div>
       <div><img src="images/image.jpeg" alt="" class="border border-dark" style="margin-bottom:70px;"></div>
       <hr  style="width:80%; background-color:black; margin-top:-60px; margin-bottom:40px"/>
       <div class="d-flex flex-column justify-content-center w-50">
         <form action="../controler/conection_verif.php" method="post"  id="form"class="d-flex flex-column justify-content-center w-100">
         
             <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label d-flex justify-content-left">NOM</label>
                 <input type="text" name="nom" class="form-control mb-3 border border-dark" id="nom" value="name@example.com">
                 
             </div>
           
             <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label  d-flex justify-content-left">PRENOM</label>
                 <input type="text" name="prenom" class="form-control mb-3 border border-dark" id="prenom" placeholder="votre mot de passe">
                 
               </div>
               <div class="mb-3">
                 <label for="exampleFormControlInput1" class="form-label  d-flex justify-content-left">EMAIL</label>
                 <input type="email" name="email" class="form-control mb-3 border border-dark" id="email" placeholder="votre mot de passe">
                 
               </div>
             <button class="form-control text-white class='btn btn-warning" id="submit"  style="background-color:#163666;" type="submit" name="submit">MODIFIER</button>

           
         </form>
         </div>
   </div>
  
  
</body>


</html >

</body>
</html> -->
<!-- code PHP -->
<?php
session_start();
include '../controler/connection_bd.php';
if(isset($_GET['updateid'])){
   
    $ID =$_GET['updateid'];
    $sth = $dbco->prepare("SELECT * FROM INSCRIPTION where id=$ID");

    $sth->execute();
    if ($sth->rowCount() > 0) {
        $check=$sth->fetchAll()[0];


    }
     
if(isset($_POST['nom'],$_POST['prenom'],$_POST['email'])){
/*   var_dump(isset($_POST['nom'],$_POST['prenom'],$_POST['email']));
  exit;  */


	$nom=$_POST['nom'];	
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];			
  
    $id=$_GET['updateid'];	
    $date_modif=date('y-m-d h:i:s');
  
    $sthModifPersonne=$dbco->prepare("UPDATE INSCRIPTION SET nom='$nom',prenom='$prenom',email='$email' WHERE id=$id");

    $sthModifPersonne->execute();
    if($sthModifPersonne){
        header('Location:acceuil_admin.php?modif=modification réussie');
    
    }else { die('Erreur : '.$e->getMessage());}
   
}

}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="laReussite.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/431fa92df2.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
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
        

      </div>

      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Nom*</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $check["nom"] ?? null  ?>" placeholder="NOM">
      

      </div>
      <div class="col-6">
        <label for="inputAddress" class="form-label">Email*</label>
        <input type="text" autocomplete="off" class="form-control" id="email" value="<?= $check["email"] ?? null  ?>" placeholder="Email" name="email">
       

      </div>
      <br>
   <!--    <div class="col-6">
        <input type="submit" id="submit" name="submit"  class="btn btn-primary" style="background-color:#05006B">
      </div> -->
      <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
            </div> 
      <script src=""></script>
    </form>
    </div>


 
  </body>
</html>