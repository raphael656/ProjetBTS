<?php
    if (!session_id()){
        session_start();
    }
    

    $page = (isset($_GET['page'])) ? htmlspecialchars($_GET['page']) : 'Login';
     

    require './database/connexionDb.php';
    $bd = new bd();

    require './notification/notification.php';
    $notification = new Notification_F();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

<!-- lien bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<!-- lien css -->
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/styleprivate.css">
    
    


<!-- lien pour les icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <?php if ($page === 'index'): ?>
        
        <link rel="stylesheet" href="./css/connexion.css">
    <?php elseif ($page === 'Login'):?>
        <link rel="stylesheet" href="./css/styleprivate.css">
        <link rel="stylesheet" href="./css/admin.css">
    <?php elseif ($page === 'Dashboard'):?>
        <link rel="stylesheet" href="./css/cardSlide.css">
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/HeaderFooter.css">
    <?php elseif ($page === 'AjoutCours'): ?>
        <link rel="stylesheet" href="./css/cardSlide.css">
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/HeaderFooter.css">
       

    <?php elseif ($page === 'cours'): ?>
        <link rel="stylesheet" href="./css/cardSlide.css">
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/HeaderFooter.css">
    <?php elseif ($page === 'CoursModif'): ?>
        <link rel="stylesheet" href="./css/cardSlide.css">
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/HeaderFooter.css">

        <?php elseif ($page === 'ModifierCours'): ?>
            <link rel="stylesheet" href="./css/cardSlide.css">
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/HeaderFooter.css">
    <?php elseif ($page === 'DashboardAdmin'): ?>
        <link rel="stylesheet" href="./css/cardSlide.css">
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/HeaderFooter.css">
    <?php elseif ($page === 'AjoutEtudiant'): ?>
        <link rel="stylesheet" href="./css/cardSlide.css">
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/HeaderFooter.css">

        <?php elseif ($page === 'EtudiantList'): ?>
            <link rel="stylesheet" href="./css/cardSlide.css">
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/HeaderFooter.css">

        <?php elseif ($page === 'ModifierEtudiant'): ?>
            <link rel="stylesheet" href="./css/cardSlide.css">
        <link rel="stylesheet" href="./css/dashboard.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/HeaderFooter.css">

    <?php elseif ($page === 'GererAdmin'): ?>
        <link rel="stylesheet" href="./css/styleprivate.css">
        <link rel="stylesheet" href="./css/admin.css">

        <?php elseif ($page === 'CreerAdmin'): ?>
        <link rel="stylesheet" href="./css/styleprivate.css">
        <link rel="stylesheet" href="./css/admin.css">
        <?php elseif ($page === 'BD'): ?>
        <link rel="stylesheet" href="./css/styleprivate.css">
        <link rel="stylesheet" href="./css/admin.css">
        
       

       
    

    

  
    <?php endif; ?>

    

<!-- lien pour les icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <?php
   if ($page != 'Login'  &&  $page != 'pdf' ){
        require './pages/header.php';
    }
   
    ?>

    <main>
    <?php
    
   

    if ($page === 'index'){
        require './pages/Login.php';
   

// Etudiant
    } elseif ($page === 'cours'){
        require './pages/Etudiant/cours.php';
    } elseif ($page === 'gestionAnnonce'){
        require './pages/Annonce/gestionAnnonce.php';
    } elseif ($page === 'gererannonce'){
        require './pages/Annonce/gererannonce.php';
   
// prof   
    } elseif ($page === 'Dashboard'){
        require './pages/Professeur/dasboard.php';
    } elseif ($page === 'CoursModif'){
        require './pages/Professeur/CoursModif.php';
    } elseif ($page === 'ModifierCours'){
        require './pages/Professeur/ModifierCours.php';
           
        } elseif ($page === 'AjoutCours'){
            require './pages/Professeur/AjoutCours.php';


//Admin
    } elseif ($page === 'DashboardAdmin'){
        require './pages/Administrateur/Dashboard.php';

    } elseif ($page === 'AjoutEtudiant'){
        require './pages/Administrateur/AjoutEtudiant.php';

    } elseif ($page === 'EtudiantList'){
        require './pages/Administrateur/EtudiantList.php';
    } 
    elseif ($page === 'ModifierEtudiant'){
        require './pages/Administrateur/ModifierEtudiant.php';
    } 
    
   

// logIn logOut
     elseif ($page === 'Login'){
        require './pages/Login.php';
    }
   

    ?>

    </main>

    <script type="text/javascript" src="./asset/js/gestionElement.js"></script>
    <script type="text/javascript" src="./asset/js/filtre.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>