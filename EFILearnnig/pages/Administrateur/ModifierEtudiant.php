<?php



$assos = array(
   'id' => htmlspecialchars($_GET['id'])
);
list($retour, $nmb) = $bd->BDqueryAssos("SELECT * FROM mydb.Etudiant WHERE idEtudiant = :id", $assos);




if(isset($_POST['submit'])){

 
   
    if ($retour['0']['identifiantEtudiant'] !== $_POST['indentifiant']){
        $assos = array(
            'id' => $retour['0']['idEtudiant'],
            'modif' => htmlspecialchars($_POST['indentifiant']),
        );
        list($modif, $nmbmodif) = $bd->BDqueryAssos("UPDATE mydb.Etudiant SET identifiantEtudiant = :modif WHERE idEtudiant = :id", $assos);
        $_SESSION['erreur']['register'] = "success" ;
    }

    if ($retour['0']['PasswordEtudiant'] !== $_POST['PasswordEtud']){
        $assos = array(
            'id' => $retour['0']['idEtudiant'],
            'modif' => htmlspecialchars($_POST['PasswordEtud']),
        );
        list($modif, $nmbmodif) = $bd->BDqueryAssos("UPDATE mydb.Etudiant SET PasswordEtudiant = :modif WHERE idEtudiant = :id", $assos);
        
    }

    if ($retour['0']['PrenomEtudiant'] !== $_POST['Prenom']){
        $assos = array(
            'id' => $retour['0']['idCours'],
            'modif' => htmlspecialchars($_POST['Prenom']),
        );
        list($modif, $nmbmodif) = $bd->BDqueryAssos("UPDATE mydb.Etudiant SET PrenomEtudiant = :modif WHERE idEtudiant = :id", $assos);
    }


  
  

    header("Refresh:0");
   
}


if (isset($_POST['submitSup'])) {
   $assos = array(
       'id' => $_GET['id']
   );
    list($retourModification, $nmbModification) = $bd->BDqueryAssos("DELETE FROM mydb.Etudiant WHERE idEtudiant = :id", $assos);
  header("Location: ?page=EtudiantList");
    exit;
 }


?>

<main  style="
    display: flex;
    flex-direction: column;
    align-items: center;
">

    <div class="pageContent">
        <section class="difContenu">
            <div class="thing">
                <h3>Ajouter un Cours</h3>
                <p>Ici vous pouvez Ajouter un cours</p>
              </div>
              <br>
            <div class="centrage">
                <form class="from" name ="fo"action="" enctype="multipart/form-data" method="POST">
                <?php 
                        if($_SESSION['erreur']['register'] !== false && $_SESSION['erreur']['register'] !== "success")
                        {
                            $notification->notificationRouge($_SESSION['erreur']['register']) ;
                        }
                        if($_SESSION['erreur']['register'] === "success")
                        {
                            $notification->notificationVert("Succés : Votre etudiant a été modifier.");
                        }
                    
                    
                    ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Identifiant</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $retour['0']['indentifiant'] ?>"placeholder="" name = indentifiant>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $retour['0']['PasswordEtudiant'] ?>" placeholder="" name = "PasswordEtud">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">nom</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $retour['0']['PrenomEtudiant'] ?>" placeholder="" name = "PasswordEtud">
                      </div>
                      
                      <div class="lol">
                        <div class="infom"><button type="submit" class="btn btn-primary" name="submit">modifier l'etudiant</button></div>
                        <div class="infom"><input type="hidden" name="delete_Commande" value="<?php $retour['0']['id'] ?>">
            <button type="submit" name="submitSup" class="bouton boutonSupprimer supprimerChambreGoPopUp">Supprimer l'etudiant</button></div></div>
            </div>
                   <div class="infom"><button type="button" class="btn btn-danger"> <a href="?page=EtudiantList">Annuler</a></button></div> 
                    </div> 
                    </form>   
            </div>
                
            </div>
        </section>    
        
    </div>
</main>