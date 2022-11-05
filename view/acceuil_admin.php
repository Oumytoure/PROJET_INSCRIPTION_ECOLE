<?php
session_start();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<header>
<div class="logo container-fluid" style="position:fixed;width:100%; height: 150px;background-color:#0c82d1;display:flex;align-items:center;top:0px;" >
            <div class="container-fluid"><img src="images/image.jpeg" alt=""data-toggle="modal" data-target="#exampleModal" style="float: left;"></div>
                <div class="menu" >
                    <nav class="navbar navbar-expand-lg " style="background-color:#0c82d1;">
                        <div class="container-fluid" >
                        <a ><button class="btn btn-outline-success" type="submit" style="background-color:white;"><a href="connection.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Deconnection</button></a>
                      </div>
                   </nav>
             </div>
        </div>
        </header> 
    <div class="container">
       <div><img src="<?='data:image/jpg;base64,'.base64_encode($_SESSION['photo'])?>" alt="" style="width:100px;height:100px;border-radius:50%;margin-top:200px;margin-left:-10px;"></div>
       <div class="Nom"><?= $_SESSION["nom"] ?></div>
       <div class="Prenom"><?= $_SESSION["prenom"] ?></div>
       <div class="matricule"><?=$_SESSION["matricule"]?></div>

    <div class="email"><?=$_SESSION["email"]?></div>
       <div class="d-flex justify-content-center" style=" gap:30px;font-weight:bold;margin-left:100px;">
     <div style="gap:30px;display:flex;"><a href="acceuil_admin.php"><p >utilisateurs</p></a>
       <a href="archives.php"><p >archives</p></a>
       </div>
       <div >
             <form action="" method="GET" style="display: flex;gap:15px;margin-bottom:30px;">
                <input type="search" name="P" placeholder="Entrer nom " class="form-control col-lg-9">
                <input type="submit" name="verif" value="RECHERCHER" class="btn btn-info">
            </form> 
            </div>
       </div>
        <table class="table table-bordered table-hover table-stripped">
            <tr><th>NOM</th><th>PRENOM</th><th>EMAIL</th><th>ROLE</th><th>MATRICULE</th><th>ACTIONS</th></tr>
            <?php
                
                include("../controler/admin_verif.php"); 
              
            
           ?>
        </table>
      

    </div>
</body>
    <!--     <footer class="text-center " style="background-color: black;height:60px; color: #fff;margin-top:190px;align-items:center;">
            <p>Copyright &copy; 2022 </p>
        </footer> -->
</html>