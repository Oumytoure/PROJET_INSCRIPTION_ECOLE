
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 style="display:flex;justify-content:center;margin-top:50px;font-weight:bold;">LISTES EMPLOYEES</h1>
        <table class="table table-bordered table-hover table-stripped">
            <tr><th>NOM</th><th>PRENOM</th><th>EMAIL</th><th>ROLE</th><th>MATRICULE</th><th>ACTIONS</th></tr>
            <?php
                include("connection_bd.php");
                $list = "SELECT * FROM INSCRIPTION";
                $result = $dbco->query($list);
                while($data = $result->fetch()){
                $id = $data["id"];
                $nom = $data["nom"];
                $prenom = $data["prenom"];
                $email = $data["email"];
                $role = $data["role"];
                $matricule = $data["matricule"];
                $classe= $data["classe"];
                $nom_prof= $data["nom_prof"];
                echo "<tr><td>$jour</td><td>$horaire</td><td>$salle</td><td>$matiere</td><td>$niveau</td><td>$classe</td><td>$nom_prof</td>";
                echo "<td style='display:flex; gap: 10px; justify-content:center;'>";
                echo "<a href='modifier_emploi_du_temps.php?id=$id' class='btn btn-warning'>Modifier</a>";
                echo "<a href='Modifier_emploi_du_temps1.php?id=$id' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer\")' class='btn btn-danger'>Supprimer</a>";
                echo "</td";
                echo "</tr>";
                }
           ?>
        </table>
        <?php
            if(isset($_POST["valide"])){
            if(isset($_POST["id"]) && isset($_POST["jour"]) && isset($_POST["horaire"]) && isset($_POST["salle"]) && isset($_POST["matiere"]) && isset($_POST["niveau"]) && isset($_POST["nom_prof"]))
            {   
            if(!empty($_POST["jour"]) && !empty($_POST["horaire"]) && !empty($_POST["salle"]) && !empty($_POST["matiere"]) && !empty($_POST["niveau"]) && !empty($_POST["nom_prof"])){
            $jour = $_POST["jour"];
            $horaire = $_POST["horaire"];
            $salle = $_POST["salle"];
            $matiere = $_POST["matiere"];
            $niveau = $_POST["niveau"];
            $classe = $_POST["classe"];
            $nom_prof = $_POST["nom_prof"];
                    include("Connection_dba.php");
                    $list = "UPDATE emploi_du_temps SET jour = '$jour', horaire = '$horaire', salle= '$salle',matiere = '$matiere ', niveau = '$niveau', nom_prof = '$nom_prof' WHERE id_edt  = $id";
                    $dbco->exec($list);
                    echo "Modification réussie";
                    
                    }
                }
            }       
       ?>

    </div>
</body>
</html>