<?php
        if (isset($_POST['recherche']) && ($_POST['recherche'] != '')) {
          $emailàAfficher = $_POST['recherche'];

          $stmt = $bdd->prepare("SELECT * FROM user WHERE etatArchivage=0");
          $stmt->execute();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (($_SESSION['email'] != $row['email']) && $row['email'] == $emailàAfficher) {
              $nom = $row['nom'];
              $prenom = $row['prenom'];
              $email = $row['email'];
              $role = $row['roleUser'];
              $matricule = $row['matricule'];
              $id = $row['id'];


              echo '<tr>
              
            <td >' . $nom . '</td>
            <td >' . $prenom . '</td>
            <td>' . $email . '</td>
            <td>' . $matricule . '</td>
            <td>' . $role . '</td>
            
            <td>
            
            <!-- ici nou avons le Modal change role; Les fonctions 3 dernières propriétés permettent l affichage de message quand on survole le bouton --> 
                                                                                
            <button type="button" class="btn "  data-bs-placement="bottom" data-bs-toggle=" tooltip" title="Changer le role de ce membre">
            <a class="lien text-light" href="traitement/traitementChangeRole.php?recherche=oui?roleid=' . $id . '"><i class="fa-solid fa-pen-nib" style="color:black;"></i></a>
            </button>
            
   
                  <!--  ici nous anons le Modal Suppresion ; Les fonctions 3 dernières propriétés permettent l affichage de message quand on survole le bouton -->
                  <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modalSuppression" data-bs-placement="bottom" data-bs-toggle=" tooltip" title="Supprimer de ce membre">
                  <a class="lien text-light" href="traitement/traitementArchivage.php?deleteid=' . $id . '"><i class="fa-solid fa-trash-can" style="color:black;"></i></a>
                  </button>
                  
    
              <!-- ici nous avons le Modal  Modification ; Les fonctions 3 dernières propriétés permettent l affichage de message quand on survole le bouton-->
              <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modalModification" data-bs-placement="bottom" data-bs-toggle=" tooltip" title="Modifier de ce membre">
              <a class="lien text-light"  href="pageModification.php?updateid=' . $id . '"><i class="fa-solid fa-pen" style="color:black;"></i></a>
              </button>
    
              
            
            </td>
        
          </tr>';
            }
          }
        } else {
          $stmt = $bdd->prepare("SELECT * FROM user WHERE etatArchivage=0 ");
          $stmt->execute();
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (($_SESSION['email'] != $row['email'])) {
              $nom = $row['nom'];
              $prenom = $row['prenom'];
              $email = $row['email'];
              $role = $row['roleUser'];
              $matricule = $row['matricule'];
              $id = $row['id'];


              echo '<tr>
            
          <td >' . $nom . '</td>
          <td >' . $prenom . '</td>
          <td>' . $email . '</td>
          <td>' . $matricule . '</td>
          <td>' . $role . '</td>
          
          <td>
          
       
          <!-- ici nou avons le Modal change role; Les fonctions 3 dernières propriétés permettent l affichage de message quand on survole le bouton --> 
                                                                                
          <button type="button" class="btn " data-bs-toggle="modal"   data-bs-target="#modalChangeRole" data-bs-placement="bottom" data-bs-toggle=" tooltip" title="Changer le role de ce membre">
          <a class="lien text-light" href="traitement/traitementChangeRole.php?roleid=' . $id . '"><i class="fa-solid fa-pen-nib" style="color:black;"></i></a>
          </button>
 
                <!--  ici nous anons le Modal Suppresion ; Les fonctions 3 dernières propriétés permettent l affichage de message quand on survole le bouton -->
                <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modalSuppression" data-bs-placement="bottom" data-bs-toggle=" tooltip" title="Supprimer de ce membre">
                <a class="lien text-light" href="traitement/traitementArchivage.php?deleteid=' . $id . '"><i class="fa-solid fa-trash-can" style="color:black;"></i></a>
                </button>
                    
                
  
            <!-- ici nous avons le Modal  Modification ; Les fonctions 3 dernières propriétés permettent l affichage de message quand on survole le bouton-->
            <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#modalModification" data-bs-placement="bottom" data-bs-toggle=" tooltip" title="Modifier de ce membre">
            <a class="lien text-light"  href="pageModification.php?updateid=' . $id . '"><i class="fa-solid fa-pen" style="color:black;"></i></a>
            </button>
                
          
          
          </td>
        </tr>';
            }
          }
        }




        ?>