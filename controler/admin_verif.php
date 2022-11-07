<?php 
         session_start();
         include("connection_bd.php");
       ?>
 
 <?php
                include("connection_bd.php");
                $id=$data['id'];
                $list = "SELECT * FROM INSCRIPTION where etat=0 and id!='$id'";
                $result = $dbco->query($list);
                
                if(isset($_POST['verif']) && isset($_POST['P'])){
                    $recherche=htmlspecialchars($_POST['P']);
                    if(!empty( $recherche)){
                        $result="SELECT  * FROM INSCRIPTION  where nom LIKE '%$recherche%'"; 
                        $result=$dbco->query($result);
 
                    }
                  
                 
                } 
                
                while($data = $result->fetch(PDO::FETCH_ASSOC)){
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
        
        <?php
            
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