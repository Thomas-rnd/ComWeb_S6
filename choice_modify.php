<?php
require_once "includes/functions.php";
session_start();

if (isAdminConnected()) {
    
    $stmt = getDb()->prepare('select * from histoire where HIST_NUM=?');
    $stmt->execute(array($_SESSION['histId']));
    $histoire = $stmt->fetch();
    $choix = getDb()->prepare('select * from choix where HIST_NUM=?');
    $choix->execute(array($_SESSION['histId']));

    $stmt = getDb()->prepare('select * from choix where HIST_NUM=?');
    $stmt->execute(array($_SESSION['histId']));
    $premierChoix = $stmt->fetch();

    if (isset($_POST['narrations'])) {
        for($i=0;$i<count($_POST['narrations']);$i++)
        {
            $texte = escape($_POST['narrations'][$i]);  
            $nbChoix = escape($_POST['nbChoix'][$i]);
            
            // modification in BD
            $modify = getDb()->prepare("update narration set NARR_TEXTE=:texte, NARR_NBCHOIX=:nbChoix
            where NARR_INDEX=:narrId and HIST_NUM=:histId");
            $modify->execute(array(
            'texte'=>$texte,
            'nbChoix'=>$nbChoix,
            'narrId'=>$i+$premièreNarration['NARR_INDEX'],
            'histId'=>$_SESSION['histId']));
        }     
        redirect("index.php");
    }
}
    ?>

  <!doctype html>
  <html>

  <?php
    $pageTitle = "Modification narration";
    require_once "includes/head.php";
    ?>

    <body>
      <div class="container">
        <?php require_once "includes/header.php"; ?>
        <h2 class="text-center">Modification narrations : </h2>
        <div class="container">
        <?php require_once "includes/header.php"; ?>
            <div class="well">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="choice_modify.php" method="post">
                        <?php while($choix= $choix->fetch()) 
                        { ?>
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Choix <?=$choix['CH_NUM']?>:</label>
                                <textarea name="narrations[]" class="form-control" rows="3" required><?=$choix['CH_NUM']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1" class="form-label mt-4">Index de renvoie : </label>
                                <input type="number" name="indexChoix" class="form-control" value="<?=$choix['CH_INDEX']?>" required autofocus>
                            </div>                      
                            </br></br>
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