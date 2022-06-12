<?php
         $requette = "SELECT * FROM mydb.Etudiant";
         list($retour, $nmb) = $bd->BDquery($requette)
        ?>
       <div class="main" style="
    display: flex;
    flex-direction: column;
    align-items: center;
">

<div class="thing">
    <h3>Bonjour et bienvenue sur votre espace de formation</h3>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=DashboardAdmin">tableau de bord</a></li>
          <li class="breadcrumb-item active" aria-current="page">Nombre etudiants</li>
        </ol>
      </nav>
  </div >
  <div class="tab">
        <table class="table table-hover">
        <tr>
            <th>Prénom</th>
            <th>Identifiant</th>
            <th>Mot de passe</th>
            <th>Email</th>
            <th>Modifier</th>
          </tr>
                <?php
                             if (!empty($retour)) : 
                            foreach ($retour as $element) :
                        ?>
                        
                        <tr class="ligneGrisse">
                        <td class="coloneCentrer"><?= $element['PrenomEtudiant'] ?></td>
                          <td class="coloneCentrer"><?= $element['identifiantEtudiant'] ?></td>
                         <td class="coloneCentrer"><?= $element['PasswordEtudiant'] ?></td>
                         <td class="coloneCentrer"><?= $element['EmailEtudiant'] ?></td>
                          
                            <td class="coloneCentrer colone_parametre"><button type="button" class="btn btn-outline-secondary"><a href="?page=ModifierEtudiant&id=<?= $element['idEtudiant'] ?>" class="engrenage">modifier</a></button></td>
                        </tr>
                        <?php
                            endforeach;
                        else:
                        ?>
                        <tr>
                            <td colspan="9" class="coloneCentrer">Aucune donnée enregistré</td>
                        </tr>
                 <?php endif ?>
                      </tbody>
                </table> 
     </div>

     </main>