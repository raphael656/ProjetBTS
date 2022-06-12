<?php
            // on verifie que l'utilisateur a bien cliquez sur submit
                $_SESSION['erreur']['register'] = false ;
                
                if(isset($_POST['submit']))
                {
                        // j'affecte les donnée entrer dans des variable $_session
                      
                        $_SESSION['register']['identifiant'] = htmlspecialchars($_POST['identifiant']);
                        $_SESSION['register']['PasswordEtud'] = htmlspecialchars($_POST['PasswordEtud']);
                        $_SESSION['register']['prenom'] = htmlspecialchars($_POST['prenom']);
                        $_SESSION['register']['email'] = htmlspecialchars($_POST['email']);
                       
                        //je crée un tableau sql
                        $assosArticle = array(
                    
                 
                            'identifiant' => $_SESSION['register']['identifiant'],
                            'PasswordEtud' => $_SESSION['register']['PasswordEtud'],
                            'prenom' => $_SESSION['register']['prenom'],
                            'email' => $_SESSION['register']['email'],
                            
                            
                            

                        );

                        // puis on execute notre requete

                        $insertion = "INSERT INTO `mydb`.`Etudiant` ( `idEtudiant`, `identifiantEtudiant`, `PasswordEtudiant`, `PrenomEtudiant`, `EmailEtudiant`)  VALUES ( NULL, :identifiant, :PasswordEtud, :prenom, :email)";
                        
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
                <h3>Ajouter un Etudiant</h3>
                <p>Ici vous pouvez Ajouter un etudiant</p>
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
                            $notification->notificationVert("Succés : Votre etudiant a été creé.");
                        }
                    
                    
                    ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Identifiant</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name = identifiant>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name = "PasswordEtud">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name ="prenom">
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name ="email">
                      </div>

                      
                      <div class="lol">
                        <div class="infom"><button type="submit" class="btn btn-primary" name="submit">Créer un Etudiant</button></div> 
                   <div class="infom"><button type="button" class="btn btn-danger"> <a href="?page=DashboardAdmin">Annuler</a></button></div>  
                    </form>   
            </div>
                
            </div>
        </section>    
        
    </div>
</main>
	</body>




</html>

