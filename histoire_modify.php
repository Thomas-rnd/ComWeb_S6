<?php
require_once "includes/functions.php";
session_start();

if (isUserConnected()) {
    
    $histId=$_GET['histId'];
    $stmt = getDb()->prepare('select * from histoire where HIST_NUM=?');
    $stmt->execute(array($histId));
    $histoire = $stmt->fetch();

    if (isset($_POST['titre'])) {
        // the history form has been posted : retrieve movie parameters
        $titre = escape($_POST['titre']);
        $resume = escape($_POST['shortDescription']);
        $auteur = escape($_POST['auteur']);
        $date = escape($_POST['date']);
        
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

          <h2 class="text-center">Modification Information</h2>
          <div class="well">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="histoire_modify.php?histId=<?=$histId?>" method="post">
              <input type="hidden" name="id" value="<?= $movieId ?>">
              <div class="form-group">
                <label class="col-sm-4 control-label">Titre</label>
                <div class="col-sm-6">
                  <input type="text" name="titre" class="form-control" value="<?=$histoire['HIST_TITRE']?>" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Description courte</label>
                <div class="col-sm-6">
                  <textarea name="shortDescription" class="form-control" rows="3" required><?=$histoire['HIST_RESUME']?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Auteur</label>
                <div class="col-sm-6">
                  <input type="text" name="auteur" class="form-control" value="<?=$histoire['HIST_AUTEUR']?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Date</label>
                <div class="col-sm-4">
                  <input type="date" name="date" value="<?= $movieYear ?>" class="form-control" placeholder="<?=$histoire['HIST_DATE']?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" name="image" value="<?=$histoire['HIST_IMAGE']?>" required/>
                </div>
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