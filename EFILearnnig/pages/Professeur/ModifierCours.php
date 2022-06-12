<?php



$assos = array(
   'id' => htmlspecialchars($_GET['id'])
);
list($retour, $nmb) = $bd->BDqueryAssos("SELECT * FROM mydb.Cours WHERE idCours = :id", $assos);




if(isset($_POST['submit'])){

    $upload_tmp_dir = $_SERVER['DOCUMENT_ROOT'] . "/ProjetBTS/EFILearnnig/pages/Professeur/documentAjout/";
    move_uploaded_file($_FILES["image"]["tmp_name"],$upload_tmp_dir.$_FILES["image"]["name"]);
    $directory = "/ProjetBTS/EFILearnnig/pages/Professeur/documentAjout/".$_FILES["image"]["name"];
   
    if ($retour['0']['TitreCours'] !== $_POST['titre']){
        $assos = array(
            'id' => $retour['0']['idCours'],
            'modif' => htmlspecialchars($_POST['Titre']),
        );
        list($modif, $nmbmodif) = $bd->BDqueryAssos("UPDATE mydb.Cours SET TitreCours = :modif WHERE idCours = :id", $assos);
        $_SESSION['erreur']['register'] = "success" ;
    }

    if ($retour['0']['Matiere'] !== $_POST['matiere']){
        $assos = array(
            'id' => $retour['0']['idCours'],
            'modif' => htmlspecialchars($_POST['Objet']),
        );
        list($modif, $nmbmodif) = $bd->BDqueryAssos("UPDATE mydb.Cours SET Matiere = :modif WHERE idCours = :id", $assos);
        
    }

    if ($retour['0']['fichierCours'] !== $directory){
        $assos = array(
            'id' => $retour['0']['idCours'],
            'modif' => $directory,
        );
        list($modif, $nmbmodif) = $bd->BDqueryAssos("UPDATE mydb.Cours SET fichierCours = :modif WHERE idCours = :id", $assos);
    }


  
  

    header("Refresh:0");
   
}


if (isset($_POST['submitSup'])) {
   $assos = array(
       'id' => $_GET['id']
   );
    list($retourModification, $nmbModification) = $bd->BDqueryAssos("DELETE FROM mydb.Cours WHERE idCours = :id", $assos);
  header("Location: ?page=CoursModif");
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
                            $notification->notificationVert("Succés : Votre Cours a été modifier.");
                        }
                    
                    
                    ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $retour['0']['TitreCours'] ?>"placeholder="" name = titre>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Matière</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $retour['0']['Matiere'] ?>" placeholder="" name = "matiere">
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Ajout du fichier</label>
                        <input class="form-control" type="file" id="formFile" name= "image">
                      </div>
                      
                      <div class="lol">
                        <div class="infom"><button type="submit" class="btn btn-primary" name="submit">modifier le cours</button></div>
                        <div class="infom"><input type="hidden" name="delete_Commande" value="<?php $retour['0']['id'] ?>">
            <button type="submit" name="submitSup" class="bouton boutonSupprimer supprimerChambreGoPopUp">Supprimer le cours</button></div></div>
            </div>
                   <div class="infom"><button type="button" class="btn btn-danger"> <a href="?page=CoursModif">Annuler</a></button></div> 
                    </div> 
                    </form>   
            </div>
                
            </div>
        </section>    
        
    </div>
</main>