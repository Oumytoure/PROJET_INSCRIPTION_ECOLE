<?php
                
                session_start();
                include("connection_bd.php");
                
                $id=$_SESSION['id'];
                $list = "SELECT * FROM INSCRIPTION"; 
                $result = $dbco->query($list);
           
                if(isset($_POST['verif']) && isset($_POST['P'])){
                    $recherche=htmlspecialchars($_POST['P']);
                    if(!empty( $recherche)){
                        $result="SELECT  * FROM INSCRIPTION  where nom LIKE '%$recherche%'"; 
                        $result=$dbco->query($result);
 
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
            if($etat==1){

           
                echo "<tr><td>$nom</td><td>$prenom</td><td>$email</td><td>$roles</td><td>$matricule</td>";
                echo "<td style='display:flex; justify-content:center;'>";
                echo "<a href='archives.php?id=$id''><i class='bi bi-arrow-up-square'></i></a>";
                echo "</td";
                echo "</tr>";
                }
            }
           ?>
        </table>
        <?php
          
           $id=$_GET['id'];	
           $date_archive=date('y-m-d');

            if(isset($_GET["id"])){
                $id = $_GET["id"];
                $sthArchivePersonne=$dbco->prepare("UPDATE INSCRIPTION SET etat='0',date_archive='$date_archive'  WHERE id=$id");
                $sthArchivePersonne->execute(); 

                if(!empty($id) && is_numeric($id)){
                    include("connection_bd.php");
                        $list = "UPDATE INSCRIPTION SET etat = '0' where id=$id";
                        $result = $dbco->query($list);
                        header("Location:../view/archives.php");
                       
                }
             }
          
                
             

       ?>
