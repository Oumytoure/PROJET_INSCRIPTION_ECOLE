
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
    
       
       <div><img src="images/dev1.jpg" alt="" style="width:100px;height:100px;border-radius:50%;margin-top:200px;margin-left:-90px;"></div>
       <div class="d-flex justify-content-center" style=" gap:30px;font-weight:bold;">
       <a href="acceuil_admin.php"><p >utilisateurs</p></a>
       <a href="archives.php"><p >archives</p></a>
       </div>
        <table class="table table-bordered table-hover table-stripped">
            <tr><th>NOM</th><th>PRENOM</th><th>EMAIL</th><th>ROLE</th><th>MATRICULE</th><th>ACTIONS</th></tr>
            <?php
                
                include("../controler/ARCHIVER_VERIF.php");
                
              /*   $list = "SELECT * FROM INSCRIPTION";
                $result = $dbco->query($list);
                while($data = $result->fetch()){
                $id = $data["id"];
                $nom = $data["nom"];
                $prenom = $data["prenom"];
                $email = $data["email"];
                $roles = $data["roles"];
                $matricule = $data["matricule"];
        
                echo "<tr><td>$nom</td><td>$prenom</td><td>$email</td><td>$roles</td><td>$matricule</td>";
                echo "<td style='display:flex; gap: 10px; justify-content:center;'>";
                echo "<a href='modifier_emploi_du_temps.php?id=$id' class='btn btn-warning'>Modifier</a>";
                echo "<a href='Modifier_emploi_du_temps1.php?id=$id' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer\")' class='btn btn-danger'>Supprimer</a>";
                echo "</td";
                echo "</tr>";
                } */ /* if(isset($_GET["id"])){
                $id = $_GET["id"];
                if(!empty($id) && is_numeric($id)){
                    include("../controler/connection_bd.php");
                        $list = "UPDATE INSCRIPTION SET etat = '1' where id=$id";
                        $result = $dbco->query($list);
                         header("Location:../view/acceuil_admin.php");
                        
                }
            } */
            
           ?>
        </table>
        <?php
           /*  if(isset($_POST["submit"])){
            if(isset($_POST["id"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"]) && isset($_POST["role"]) && isset($_POST["matricule"]))
            {   
            if(!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["roles"]) && !empty($_POST["matricule"])){
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $email = $_POST["email"];
            $role = $_POST["role"];
            $matricule = $_POST["matricule"];
            
                    include("connection_bd.php");
                    $list = "UPDATE INSCRIPTION SET nom = '$nom', prenom = '$prenom', email= '$email',roles = '$roles ', matricule = '$matricule' WHERE id  = $id";
                    $dbco->exec($list);
                    echo "Modification réussie";
                    
                    }
                }
            }  */ 
                 
       ?>

    </div>
</body>
    <!--     <footer class="text-center " style="background-color: black;height:60px; color: #fff;margin-top:190px;align-items:center;">
            <p>Copyright &copy; 2022 </p>
        </footer> -->
</html>