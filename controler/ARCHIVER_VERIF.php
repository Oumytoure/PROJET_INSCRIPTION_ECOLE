
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
