<?php
                include("../controler/connection_bd.php");

                session_start();
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
            if($etat==1){

           
                echo "<tr><td>$nom</td><td>$prenom</td><td>$email</td><td>$roles</td><td>$matricule</td>";
                echo "<td style='display:flex; justify-content:center;'>";
                echo "<a href='archives.php?id=$id''><i class='bi bi-archive'></i></a>";
                echo "</td";
                echo "</tr>";
                }
            }
           ?>
        </table>
        <?php
           
            
            if(isset($_GET["id"])){
                $id = $_GET["id"];
                if(!empty($id) && is_numeric($id)){
                    include("../controler/connection_bd.php");
                        $list = "UPDATE INSCRIPTION SET etat = '0' where id=$id";
                        $result = $dbco->query($list);
                        header("Location:../view/archives.php");
                       
                }
            }
          
                
             

       ?>
