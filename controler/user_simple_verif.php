<?php 
         session_start();
         include("connection_bd.php");
       /*   $allusers=$dbco->query('SELECT * FROM INSCRIPTION ORDER BY id DESC');
         if(isset($_GET["P"]) AND empty($_GET['P'])){
            $recherche= htmlspecialchars($_GET['P'])) */
         /* include("connection_bd.php");
    
         $result =$dbco->query('SELECT nom FROM INSCRIPTION ORDER BY id DESC');
         if(isset($_GET['P']) && !empty($_GET['P'])){
            $nom= htmlspecialchars($_POST[' nom']);
            $result =$dbco->query('SELECT matricule,nom,prenom,email,roles,etat FROM INSCRIPTION where nom LIKE "%'.$nom.'%"  ORDER BY id DESC'); */
          /* au niveau de la table */
          /*$result  = $dbco->query("SELECT matricule,nom,prenom,email,roles,etat  FROM INSCRIPTION where etat=0");*/
         /* permet d'effecter la recherche 
           $name= htmlspecialchars($_POST[' nom']);
         
        
        /*  $result ->execute(); */
         /* } */

              /*   include("connection_bd.php");
                $result =$dbco->query('SELECT matricule,nom,prenom,email,roles,etat FROM INSCRIPTION where nom LIKE "%'.$nom.'%"  ORDER BY id DESC'); 
                $list = "SELECT * FROM INSCRIPTION";
                $result = $dbco->query($list);
                if(isset($_POST["verif"])){
                    if(isset($_POST["nom"])){
                        $nom = $_POST["nom"];
                        if(!empty($nom)){                   
                
                $list = "SELECT * FROM INSCRIPTION WHERE nom LIKE '%$nom%' OR prenom LIKE '%$prenom%'";
                $result = $dbco->query($list);
            }
        }
    } 
          
                while($data = $result->fetch()){
                $id = $data["id"];
                $nom = $data["nom"];
                $prenom = $data["prenom"];
                $email = $data["email"];
                $roles = $data["roles"];
                $matricule = $data["matricule"];
                $etat = $data["etat"];
            if($etat==0){

           
                echo "<tr><td>$nom</td><td>$prenom</td><td>$email</td><td>$roles</td><td>$matricule</td>";
                echo "<td style='display:flex; gap: 10px; justify-content:center;'>";
                echo "<a href='acceuil_admin.php?id=$id' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer\")'><i class='bi bi-archive'></i></a>";
                echo "<a href='../view/mofification.php?updateid=". $id ."' ><i class='fa-solid fa-pen-to-square'></i></a>";
                echo "<a href='acceuil_admin.php?id_roles=$id' ><i class='fa-solid fa-rotate-right'></i></a>";
                echo "</td";
                echo "</tr>";
                }
            }
        
           ?>
        </table>
        <?php
             if(isset($_POST["submit"])){
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
            }       
            
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                if(!empty($id) && is_numeric($id)){
                    include("connection_bd.php");
                        $list = "UPDATE INSCRIPTION SET etat = '1' where id=$id";
                        $result = $dbco->query($list);
                        header("Location:../view/acceuil_admin.php");
                       
                }
            }
            if(isset($_GET["id_roles"])){
                $id = $_GET["id_roles"];
                if(!empty($id) && is_numeric($id)){
                    include("connection_bd.php");
                    $list="SELECT roles FROM INSCRIPTION WHERE id=$id";
                    $result = $dbco->query($list);
                    $rest=$result->fetch();
                    $roles=$rest['roles'];
                    if($roles=='ADMINISTRATEUR'){
                        $list = "UPDATE INSCRIPTION SET roles = 'UTILISATEUR' where id=$id";
                        $result = $dbco->query($list);
                        
                    }
                    else if($roles=='UTILISATEUR'){
                        $list = "UPDATE INSCRIPTION SET roles = 'ADMINISTRATEUR' where id=$id";
                        $result = $dbco->query($list);
                       
                    }    
                       
                }
            } */
        
        
       ?>
 
 <?php
                 session_start(); 
                include("connection_bd.php");
                $result=$dbco->query('SELECT nom FROM INSCRIPTION ORDER BY id DESC');
                $verif=$_GET['verif'];
                $P=$_GET['P'];
                if(isset($verif) && !empty($P)){
                    $result = $dbco->query("SELECT * FROM INSCRIPTION WHERE etat=0");
                
                    $list=$dbco->query('SELECT * FROM INSCRIPTION WHERE nom LIKE "%'.$P.'%" ORDER BY id DESC');
                     $list->execute();  
                        }
                 /* if(isset($_POST["verif"])){
                    if(isset($_POST["classe"])){
                        $classe = $_POST["classe"];
                        if(!empty($classe)){                   
                include("Connection_dba.php");
                $list = "SELECT * FROM inscription WHERE classe LIKE '%$classe%' OR prenom LIKE '%$classe%'";
                $result = $dbco->query($list);
                while($data = $result->fetch()){
                    $id = $data["id_ins"];
                    $prenom = $data["prenom"];
                    $nom = $data["nom"];
                    $adresse = $data["adresse"];
                    $sexe = $data["sexe"];
                    $cla = $data["classe"];
                    $nationalite = $data["nationalite"];
                    $archive = $data["archive"]; */

               /*  session_start(); */
                $list = "SELECT * FROM INSCRIPTION";
                $result = $dbco->query($list);
                while($data = $result->fetch()){
                $id = $data["id"];
                $nom = $data["nom"];
                $prenom = $data["prenom"];
                $email = $data["email"];
                $roles = $data["roles"];
                $matricule = $data["matricule"];
                $date_ins = $data["date_ins"];
            /* if($etat==0) *//* { */

           
                echo "<tr>
                <td>$nom</td>
                <td>$prenom</td>
                <td>$email</td>
                <td>$roles</td>
                <td>$matricule</td>
                <td>$date_ins</td>
                
                </tr>";
                }
            
           ?>
        
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
            
                    include("../controler/connection_bd.php");
                    $list = "UPDATE INSCRIPTION SET nom = '$nom', prenom = '$prenom', email= '$email',roles = '$roles ', matricule = '$matricule' WHERE id  = $id";
                    $dbco->exec($list);
                    echo "Modification réussie";
                    
                    }
                }
            }        */
            
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                if(!empty($id) && is_numeric($id)){
                    include("connection_bd.php");
                        $list = "UPDATE INSCRIPTION SET etat = '1' where id=$id";
                        $result = $dbco->query($list);
                        header("Location:../view/acceuil_admin.php");
                       
                }
            }
            if(isset($_GET["id_roles"])){
                $id = $_GET["id_roles"];
                if(!empty($id) && is_numeric($id)){
                    include("connection_bd.php");
                    $list="SELECT roles FROM INSCRIPTION WHERE id=$id";
                    $result = $dbco->query($list);
                    $rest=$result->fetch();
                    $roles=$rest['roles'];
                    if($roles=='ADMINISTRATEUR'){
                        $list = "UPDATE INSCRIPTION SET roles = 'UTILISATEUR' where id=$id";
                        $result = $dbco->query($list);
                        
                    }
                    else if($roles=='UTILISATEUR'){
                        $list = "UPDATE INSCRIPTION SET roles = 'ADMINISTRATEUR' where id=$id";
                        $result = $dbco->query($list);
                       
                    }    
                       
                }
            }
        

       ?>