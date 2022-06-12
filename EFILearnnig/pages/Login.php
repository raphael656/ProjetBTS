
<?php
    // je vérifie si l'utilisateur a bien entrer les information
    

$_SESSION['erreur']['login'] = false;
if (isset($_POST['submit'])) {
       
    if (isset($_POST['identifiant']) && isset($_POST['password'])) {
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $password = htmlspecialchars($_POST['password']);

        $assos = array(
            'identifiant' => $identifiant
        );
        // connexion étudiant
        list($retour, $nmb) = $bd->BDqueryAssos("SELECT * FROM mydb.Etudiant WHERE identifiantEtudiant = :identifiant", $assos);
       
        if ($nmb === 1) {
           
            if ($password === $retour['0']['PasswordEtudiant']){
                    header("Location: ?page=cours");
              
                
                $_SESSION['erreur']['login'] = false;
            }
            else {
              $_SESSION['erreur']['login'] = "Identifiant ou mot de passe incorrecte.";
          }
        } 

         // connexion prof
         list($retour, $nmb) = $bd->BDqueryAssos("SELECT * FROM mydb.Professeur WHERE identifiantProf = :identifiant", $assos);
       
        if ($nmb === 1) {
           
            if ($password === $retour['0']['PasswordProf']){
                    header("Location: ?page=Dashboard");
              
                
                $_SESSION['erreur']['login'] = false;
            }
            else {
              $_SESSION['erreur']['login'] = "Identifiant ou mot de passe incorrecte.";
          }
        } 
          // connexion Admin
       
        list($retour, $nmb) = $bd->BDqueryAssos("SELECT * FROM mydb.Admin WHERE IdentifiantAdmin = :identifiant", $assos);
       
        if ($nmb === 1) {
           
            if ($password === $retour['0']['PasswordAdmin']){
                    header("Location: ?page=DashboardAdmin");
              
                
                $_SESSION['erreur']['login'] = false;
            }
            else {
              $_SESSION['erreur']['login'] = "Identifiant ou mot de passe incorrecte.";
          }
        } 
    } else {
        $_SESSION['erreur']['login'] = "Obligatoire.";
    }
}

   
?>
    <div class="parent clearfix">
    <div class="bg-illustration">
      <img src="./img/EFI E-LEARNING.png" alt="logo"> 
      <link rel="stylesheet" href="./css/connexion.css">
      <div class="burger-btn">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
    
    <div class="login">
      <div class="container">
        <h1>Connectez-vous pour accéder à<br/>
            Votre compte 
            </h1>
    
        <div class="login-form">
          <form action="" method="POST" >
            <input class="form-control <?= $_SESSION['erreur']['login'] !== false ? 'is-invalid' : '' ?> " type="text" name="identifiant"  id="identifiant"  required>
            <?php if ($_SESSION['erreur']['login'] !== false): ?>
                    <div class="invalid-feedback" style="padding-top: 0;">
                    <?= $_SESSION['erreur']['login'] ?>
                    </div>
                <?php endif ?>
            <input class="form-control <?= $_SESSION['erreur']['login'] !== false ? 'is-invalid' : '' ?>" type="password" name="password" id="Password"  required>
            <?php if ($_SESSION['erreur']['login'] !== false): ?>
                    <div class="invalid-feedback" style="padding-top: 0;">
                    <?= $_SESSION['erreur']['login'] ?>
                    </div>
                <?php endif ?>

            <div class="remember-form">
              <input type="checkbox">
              <span>Souviens-toi de moi</span>
            </div>
            <div class="forget-pass">
              <a href="#">Mot de passe oublié ?</a>
            </div>

            <button type="submit" name="submit" >S'IDENTIFIER</button>

          </form>
        </div>
    
      </div>
      </div>
  </div>
</body>
</html>

 