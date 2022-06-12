<!doctype html>

<html lang="en">

	<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php 
    
       list($nmbAnnonce, $nmb) = $bd->BDquery("SELECT COUNT(idProfesseur) as nombre FROM mydb.Professeur ");
       list($nmbOffre, $nmb) = $bd->BDquery("SELECT COUNT(idEtudiant) as nombre FROM mydb.Etudiant");
       ?>
<main  style="
    display: flex;
    flex-direction: column;
    align-items: center;
">
    <div class="thing">
        <h3>Tableau de bord</h3>
        <p>nombre de cours et de professeurs </p>
      </div>
   <div class="slide1">
       <div class="car">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $nmbOffre['0']['nombre'] ?> Professeur</h5>
              <p class="card-text">Ici vous retrouver le nombre total de Professeur</p>
            </div>
          </div>
       </div>
    
       <div class="car">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title"><?= $nmbOffre['0']['nombre'] ?> Etudiants</h5>
                <p class="card-text">Ici vous retrouver le nombre total d'etudiants</p>
                </div>
            </div>
       </div>
     </div>
     <div class="thing">
        <h3>Gestion des professeurs</h3>
        <p>Ici vous pouvez ajoutez des Professeur, les supprimés ou les modifié</p>
      </div>
      <div class="slide2">
          <div class="car2">
            <div class="card">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top" alt="Fissure in Sandstone"/>
                <div class="card-body">
                  <h5 class="card-title">Ajouter un Cours</h5>
                  <p class="card-text"> Vous pouvez ici ajouter un nouveau Professeur.</p>
                  <a href="?page=AjoutCours" class="btn btn-primary">Créer</a>
                </div>
              </div>
          </div>
          <div class="car2">
            <div class="card">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top" alt="Fissure in Sandstone"/>
                <div class="card-body">
                  <h5 class="card-title">modification</h5>
                  <p class="card-text"> ici vous pouvez modifier ou supprimer n'importe quel Professeur.</p>
                  <a href="?page=CoursModif" class="btn btn-primary">modifier</a>
                </div>
              </div>
          </div>
      </div>

      <div class="thing">
        <h3>Gestion des Etudiants</h3>
        <p>Ici vous pouvez ajoutez des Etudiants, les supprimés ou les modifié</p>
      </div>
      <div class="slide2">
          <div class="car2">
            <div class="card">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top" alt="Fissure in Sandstone"/>
                <div class="card-body">
                  <h5 class="card-title">Ajouter un Cours</h5>
                  <p class="card-text"> Vous pouvez ici ajouter un nouveau Etudiants.</p>
                  <a href="?page=AjoutEtudiant" class="btn btn-primary">Créer</a>
                </div>
              </div>
          </div>
          <div class="car2">
            <div class="card">
                <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/184.webp" class="card-img-top" alt="Fissure in Sandstone"/>
                <div class="card-body">
                  <h5 class="card-title">modification</h5>
                  <p class="card-text"> ici vous pouvez modifier ou supprimer n'importe quel Etudiants.</p>
                  <a href="?page=EtudiantList" class="btn btn-primary">modifier</a>
                </div>
              </div>
          </div>
      </div>
</main>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	</body>




</html>

