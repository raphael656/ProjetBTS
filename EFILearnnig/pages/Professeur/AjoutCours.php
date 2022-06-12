<?php
            // on verifie que l'utilisateur a bien cliquez sur submit
                $_SESSION['erreur']['register'] = false ;
                
                if(isset($_POST['submit']))
                {
                    $upload_tmp_dir = $_SERVER['DOCUMENT_ROOT'] . "/ProjetBTS/EFILearnnig/pages/Professeur/documentAjout/";
                    move_uploaded_file($_FILES["image"]["tmp_name"],$upload_tmp_dir.$_FILES["image"]["name"]);
                        // j'affecte les donnée entrer dans des variable $_session
                        $directory = "/ProjetBTS/EFILearnnig/pages/Professeur/documentAjout/".$_FILES["image"]["name"];
                        $_SESSION['register']['Titre'] = htmlspecialchars($_POST['titre']);
                        $_SESSION['register']['matiere'] = htmlspecialchars($_POST['matiere']);
                       
                        //je crée un tableau sql
                        $assosArticle = array(
                    
                 
                            'Titre' => $_SESSION['register']['Titre'],
                            'matiere' => $_SESSION['register']['matiere'],
                            'pdf'=>  $directory
                            

                        );

                        // puis on execute notre requete

                        $insertion = "INSERT INTO `mydb`.`Cours` ( `idCours`, `TitreCours`, `fichierCours`, `DateCours`, `Matiere`)  VALUES ( NULL, :Titre, :pdf, NOW(), :matiere)";
                        
                        list($retour,$nmb) = $bd->BDqueryAssos($insertion, $assosArticle);
                        
                        $_SESSION['erreur']['register'] =  $_SESSION['register']['pdf'];
                        if($nmb === 1){

                            $_SESSION['erreur']['register'] = "success" ;
                        }else
                        {
                            $_SESSION['erreur']['register']="Error : Database not found !!!" ;
                        }
                  
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
                            $notification->notificationVert("Succés : Votre cours a été creé.");
                        }
                    
                    
                    ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name = titre>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Matière</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name = "matiere">
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Ajout du fichier</label>
                        <input class="form-control" type="file" id="formFile" name= "image">
                      </div>
                      
                      <div class="lol">
                        <div class="infom"><button type="submit" class="btn btn-primary" name="submit">Créer un cours</button></div> 
                   <div class="infom"><button type="button" class="btn btn-danger"> <a href="?page=Dashboard">Annuler</a></button></div>  
                    </form>   
            </div>
                
            </div>
        </section>    
        
    </div>
</main>
	</body>




</html>

