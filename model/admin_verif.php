<?php
                include("../controler/connection_bd.php");

               
                $list = "SELECT * FROM INSCRIPTION";
                $result = $dbco->query($list);
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
                echo "<a href=?id=$id' ><i class='fa-solid fa-pen-to-square'></i></a>";
                echo "<a href=?id=$id' ><i class='fa-solid fa-rotate-right'></i></a>";
                echo "</td";
                echo "</tr>";
                }
            }
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
            
                    include("../controler/connection_bd.php");
                    $list = "UPDATE INSCRIPTION SET nom = '$nom', prenom = '$prenom', email= '$email',roles = '$roles ', matricule = '$matricule' WHERE id  = $id";
                    $dbco->exec($list);
                    echo "Modification réussie";
                    
                    }
                }
            }        */
            function archiver(){
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                if(!empty($id) && is_numeric($id)){
                    include("../controler/connection_bd.php");
                        $list = "UPDATE INSCRIPTION SET etat = '1' where id=$id";
                        $result = $dbco->query($list);
                        header("Location:../view/acceuil_admin.php");
                        echo "Archivage réussi";
                }
            }
        } 

       ?>
