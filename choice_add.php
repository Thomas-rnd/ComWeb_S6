<?php
require_once "includes/functions.php";
session_start();

if (isUserConnected()) {

    $histId = $_GET['histId'];
    $narrId = $_GET['narrId'];
    $nbChoix = $_GET['nbChoix'];
    
    if (isset($_POST['choix'])) {
        for($i=0;$i<count($_POST['choix']);$i++)
        {
            $choix = escape($_POST['choix'][$i]);  
            $indexChoix = escape($_POST['indexChoix'][$i]);
            
            // insert choice into BD
            $stmt = getDb()->prepare('insert into choix
            (CH_TEXTE, CH_INDEX, NARR_INDEX, HIST_NUM)
            values (?, ?, ?, ?)');
            $stmt->execute(array($choix, $indexChoix, $narrId, $histId));
        }
        redirect("index.php");
    }}
    ?>

  <!doctype html>
  <html>

  <?php
    $pageTitle = "Ajout d'une histoire";
    require_once "includes/head.php";
    ?>

    <body>
      <div class="container">
        <?php require_once "includes/header.php"; ?>
            <h2 class="text-center">Ajout d'un choix</h2>
            <div class="well">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="choice_add.php?histId=<?=$histId?>&narrId=<?=$narrId?>&nbChoix=<?=$nbChoix?>" method="post">
                    <?php for($i=0;$i<$nbChoix;$i++){?>
                        <div class="form-group">
                            <label class="col-sm-auto">Choix : </label>
                            <div class="col-sm-6">
                                <textarea name="choix[]" class="form-control" rows="3" placeholder="Définition du choix" required>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1" class="form-label mt-4">Index du choix : </label>
                            <div class="col-sm-6">
                                <input type="number" name="indexChoix[]" class="form-control" placeholder="Entrez l'index de retour du choix" required>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-4">
                                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-save"></span> Enregistrer</button>
                            </div>
                        </div>
                </form>
          </div>

          <?php require_once "includes/footer.php"; ?>
      </div>

      <?php require_once "includes/scripts.php"; ?>
    </body>

  </html>
