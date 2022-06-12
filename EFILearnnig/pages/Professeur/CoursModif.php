<?php
         $requette = "SELECT * FROM mydb.Cours";
         list($retour, $nmb) = $bd->BDquery($requette)
        ?>
       <div class="main" style="
    display: flex;
    flex-direction: column;
    align-items: center;
">

<div class="thing">
    <h3>Bonjour Raphael et bienvenue sur votre espace de formation</h3>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=Dashboard">tableau de bord</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cours publier</li>
        </ol>
      </nav>
  </div >
  <div class="tab">
        <table class="table table-hover">
        <tr>
            <th>titre cours</th>
            <th>date d'ajout</th>
            <th>Matière</th>
            <th>Modifier</th>
          </tr>
                <?php
                             if (!empty($retour)) : 
                            foreach ($retour as $element) :
                        ?>
                        
                        <tr class="ligneGrisse">
                        <td class="coloneCentrer"><?= $element['TitreCours'] ?></td>
                          <td class="coloneCentrer"><?= $element['DateCours'] ?></td>
                         <td class="coloneCentrer"><?= $element['Matiere'] ?></td>
                          
                            <td class="coloneCentrer colone_parametre"><button type="button" class="btn btn-outline-secondary"><a href="?page=ModifierCours&id=<?= $element['idCours'] ?>" class="engrenage">modifier</a></button></td>
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