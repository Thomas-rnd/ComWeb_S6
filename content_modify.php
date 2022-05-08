<?php
require_once "includes/functions.php";
session_start();

if (isUserConnected()) {
    
    $histId=$_GET['histId'];
    $stmt = getDb()->prepare('select * from histoire where HIST_NUM=?');
    $stmt->execute(array($histId));
    $histoire = $stmt->fetch();
    $narrations = getDb()->prepare('select * from narration where HIST_NUM=?');
    $narrations->execute(array($histId));

    if (isset($_POST['narrations'])) {
        for($i=0;$i<count($_POST['choix']);$i++)
        {
            $texte = escape($_POST['narration'][$i]);  
            $nbChoix = escape($_POST['nbChoix'][$i]);
            
            // modification in BD
            $modify = getDb()->prepare("update narration set NARR_TEXTE=:texte, NARR_NBCHOIX=:nbChoix, 
            where NARR_INDEX=:narrId and HIST_NUM=:histId");
            $modify->execute(array(
            'texte'=>$texte,
            'nbChoix'=>$nbChoix,
            'narrId'=>$i+1,
            'histId'=>$histId));
        }
        
        $tmpFile = $_FILES['image']['tmp_name'];
        if (is_uploaded_file($tmpFile)) {
            // upload history image
            $image = basename($_FILES['image']['name']);
            $uploadedFile = "images/$image";
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile);
        }
        
        $modify = getDb()->prepare("update histoire set HIST_TITRE=:titre, HIST_RESUME=:resume, 
        HIST_AUTEUR=:auteur, HIST_DATE=:date, HIST_IMAGE=:image
        where HIST_NUM=:histId");
        $modify->execute(array(
        'titre'=>$titre,
        'resume'=>$resume,
        'auteur'=>$auteur,
        'date'=>$date,
        'image'=>$image,
        'histId'=>$histId));
        
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

        <h2 class="text-center">Modification narrations : </h2>
        <div class="container">
        <?php require_once "includes/header.php"; ?>
            <div class="well">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="content_modify.php?histId=<?=$histId?>" method="post">
                        <?php while($narration = $narrations->fetch()) 
                        { ?>
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Narration <?=$narration['NARR_INDEX']?>:</label>
                                <textarea name="narrations[]" class="form-control" rows="3" required><?=$narration['NARR_TEXTE']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1" class="form-label mt-4">Nombre de choix possible : </label>
                                    <select name="nbChoix[]" class="form-select" id="exampleSelect1" required >
                                        <?php if($narration['NARR_NBCHOIX']=0){ ?>
                                            <option selected="selected">0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        <?php}?>
                                        <?php else if($narration['NARR_NBCHOIX']=1){ ?>
                                            <option>0</option>
                                            <option selected="selected">1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        <?php}?>
                                        <?php else if($narration['NARR_NBCHOIX']=2){ ?>
                                            <option>0</option>
                                            <option>1</option>
                                            <option selected="selected">2</option>
                                            <option>3</option>
                                        <?php}?>
                                        <?php else{ ?>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option selected="selected">3</option>
                                        <?php}?>
                                    </select>
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