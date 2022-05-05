<?php
require_once "includes/functions.php";
session_start();

if (isUserConnected()) {

    $histoires = getDb()->query('select * from histoire order by HIST_NUM desc'); 
    
    if (isset($_POST['narration'])) {
        // the history form has been posted : retrieve movie parameters
        $histoire = escape($_POST['histoire']);
        $stmt = getDb()->prepare('select * from histoire where HIST_TITRE=?');
        $stmt->execute(array($histoire)); 
        $resultat = $stmt->fetch();          
        $histId = $resultat['HIST_NUM'];
        $narration = escape($_POST['narration']);
        $nbChoix = escape($_POST['nbChoix']);
        
        // insert narration into BD
        $stmt = getDb()->prepare('insert into narration
        (NARR_TEXTE, NARR_NBCHOIX, HIST_NUM)
        values (?, ?, ?)');
        $stmt->execute(array($narration, $nbChoix, $histId));   

        $stmt = getDb()->prepare('select * from narration where NARR_TEXTE=? and NARR_NBCHOIX=? and HIST_NUM=?');
        $stmt->execute(array($narration, $nbChoix, $histId)); 
        $resultat=$stmt->fetch();   
        $narrId = $resultat['NARR_INDEX'];
        redirect("choice_add.php?histId=$histId&narrId=$narrId&nbChoix=$nbChoix");
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
            <h2 class="text-center">Ajout du contenu</h2>
            <div class="well">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="content_add.php" method="post">
                    <div class="form-group">
                        <label for="exampleSelect1" class="form-label mt-4">Sélection d'une histoire : </label>
                            <select name="histoire" class="form-select" id="exampleSelect1">
                                <?php while($numHist = $histoires->fetch()) 
                                { ?>
                                    <div class="col-sm">
                                        <option><?=$numHist['HIST_TITRE']?></option>
                                    </div>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-auto">Narration : </label>
                        <div class="col-sm-6">
                            <textarea name="narration" class="form-control" rows="3" placeholder="Entrez du texte de narration" required>
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="exampleSelect1" class="form-label mt-4">Nombre de choix possible : </label>
                            <select name="nbChoix" class="form-select" id="exampleSelect1">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                    </div>
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
