<?php
/* var_dump($_GET["id_roles"]);
die; */
ini_set("display_errors", "-1");
error_reporting(E_ALL);
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
                        header("Location:pagination.php");
                        
                    }
                    else if($roles=='UTILISATEUR'){
                        $list = "UPDATE INSCRIPTION SET roles = 'ADMINISTRATEUR' where id=$id";
                        $result = $dbco->query($list);
                        header("Location:pagination.php");
                       
                    }    
                       
                }
            }
        

       ?>