        
        <?php
        ini_set("display_errors", "-1");
        error_reporting(E_ALL);
            $id=$_GET['id'];
            include("connection_bd.php");
            $date_archive=date('y-m-d');
             
             if(isset($_GET["id"])){
                 $id = $_GET["id"];
                 $sthArchivePersonne=$dbco->prepare("UPDATE INSCRIPTION SET etat='0',date_archive='$date_archive'  WHERE id=$id");
                 $sthArchivePersonne->execute(); 
                }
/* 
            if(isset($_GET["id"])){ */
                $id = $_GET["id"];
                
                if(!empty($id) && is_numeric($id)){
                    
                  
                        $list =$dbco->prepare ("UPDATE INSCRIPTION SET etat = '1' where id='$id'");
                        
                        $list->execute(); 
           /*              var_dump($list);
            die;   */
                        
                        header("Location:pagination.php");
                       
                }
            /* } */
            ?>