<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
// On se connecte à là base de données
include('connection_bd.php');
$id=$_SESSION['id'];
/* var_dump($users);
die;   */

if(isset($_POST['verif']) && isset($_POST['P'])){
    $recherche=htmlspecialchars($_POST['P']);
    
        $query=$dbco->prepare("SELECT * FROM `INSCRIPTION` WHERE nom=:nom and etat=0 ");

        $query->execute(['nom' => $recherche]);

    }
  else{
    $sql = 'SELECT * FROM `INSCRIPTION` ORDER BY `id` DESC;';

    // On prépare la requête
    $query = $dbco->prepare($sql);
    
    // On exécute
    $query->execute();
    
    // On récupère les valeurs dans un tableau associatif
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    /* var_dump($users);
    die; */
    
    // On détermine sur quelle page on se trouve
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }else{
        $currentPage = 1;
    }
    // On détermine le nombre total d'articles
    $sql = 'SELECT COUNT(*) AS matricule FROM `INSCRIPTION` WHERE etat=0';
    
    // On prépare la requête
    $query = $dbco->prepare($sql);
    
    // On exécute
    $query->execute();
    
    // On récupère le nombre d'articles
    $result = $query->fetch();
    
    $nbusers = (int) $result['matricule'];
    
    // On détermine le nombre d'articles par page
    $parPage = 5;
    
    // On calcule le nombre de pages total
    $pages = ceil($nbusers / $parPage);
    
    // Calcul du 1er article de la page
    $premier = ($currentPage * $parPage) - $parPage;
    $sql = 'SELECT * FROM `INSCRIPTION` WHERE etat=0  AND id!=:id ORDER BY `matricule` DESC LIMIT :premier, :parpage;';
    
    // On prépare la requête
    $query = $dbco->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':premier', $premier, PDO::PARAM_INT);
    $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    
  }
 // On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$users = $query->fetchAll(PDO::FETCH_ASSOC);
 $id = $users["id"];

/*  include("modifRole.php"); */





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
<div class="container-fluid"><img src="../view/images/image.jpeg" alt=""data-toggle="modal" data-target="#exampleModal" style="float: left;"></div>
                <div class="menu" >
                    <nav class="navbar navbar-expand-lg ">
                        <div class="container-fluid" >
                            <h1 style="display:flex; justify-content:center;">ESPACE ADMINISTRATEUR</h1>
                        <a href="../view/connection.php"><i class="fa-solid fa-arrow-right-from-bracket " style="color:white;"></i><!-- Deconnection --></a>
                      </div>
                   </nav>
             </div>
        </div>
        </header> 
    <div class="container">
       <div><img src="<?='data:image/jpg;base64,'.base64_encode($_SESSION['photo'])?>" alt="" style="width:100px;height:100px;border-radius:50%;margin-top:200px;margin-left:-10px;"></div>
       <div class="Nom"><?= $_SESSION["prenom" ].' '.$_SESSION["nom"]  ?></div>
       <div class="matricule"><?=$_SESSION["matricule"]?></div>

    
       <div class="d-flex justify-content-center" style=" gap:30px;font-weight:bold;margin-left:100px;">
     <div style="gap:30px;display:flex;"><a href="pagination.php"><p >utilisateurs Actifs</p></a>
       <a href="paginationUser.php"><p style="color:darkgrey; text-decoration:none; ">utilisateurs Inactifs</p></a>
       </div>
       <div >
             <form action="" method="post" style="display: flex;gap:15px;margin-bottom:30px;">
                <input type="search" name="P" placeholder="Entrer nom " class="form-control col-lg-9">
                <input type="submit" name="verif" value="RECHERCHER" class="btn btn-info">
            </form> 
            </div>
       </div>
        <table class="table table-bordered table-hover table-stripped">
            <tr><th>NOM</th><th>PRENOM</th><th>EMAIL</th><th>ROLE</th><th>MATRICULE</th><th>ACTIONS</th></tr>
            <?php
                
           foreach($users as $person): ?>
           <tr>
           <td> <?= $person["nom"]  ?>  </td>
           <td> <?= $person["prenom"]  ?>  </td>
           <td> <?= $person["email"]  ?>  </td>
           <td> <?= $person["roles"]  ?>  </td>
           <td> <?= $person["matricule"]  ?>  </td>
            <td style='display:flex; gap: 10px; justify-content:center;'>
                 
                 <a title='archiver' href='Modifarchivage.php?id=<?=$person['id'];?> ' onclick='return confirm("Êtes-vous sûr de vouloir supprimer")'><i class='bi bi-archive'></i></a>
                <a title='modifier' href='../view/mofification.php?updateid=<?=$person['id'];?>  ' ><i class='fa-solid fa-pen-to-square'></i></a>
                <a title='switch' href='modifRole.php?id_roles=<?=$person['id'];?>  ' ><i class='fa-solid fa-rotate-right'></i></a>
            </td>
           </tr>
             
           <?php endforeach;
                
                ?>
         
        </table>
        <nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for(@$page = 1; @$page <= @$pages; @$page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>

    </div>
    </body>
        <footer class="text-center " style="background-color: black;height:60px; color: #fff;margin-top:250px;align-items:center;">
            <p>Copyright &copy; 2022 </p>
        </footer>
</html>