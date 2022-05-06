<?php
require_once "includes/functions.php";
session_start();

if (isUserConnected()) {
    
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
        
        // insert history into BD
        $stmt = getDb()->prepare('insert into histoire
        (HIST_TITRE, HIST_RESUME, HIST_AUTEUR, HIST_DATE, HIST_IMAGE)
        values (?, ?, ?, ?, ?)');
        $stmt->execute(array($titre, $resume, $auteur,
        $date, $image));

        // Initialisation avancement et pv des utilisateurs
        $stmt = getDb()->prepare('select * from user');
        $nb = $stmt->roxCount();
        $stmt = getDb()->prepare('select * from histoire where
        (HIST_TITRE, HIST_RESUME, HIST_AUTEUR, HIST_DATE, HIST_IMAGE)
        values (?, ?, ?, ?, ?)');
        $stmt->execute(array($titre, $resume, $auteur,
        $date, $image));
        $histoire = $stmt->fetch();
        for($i=1;$i<=$nb;$i++)
        {
          $stmt = getDb()->prepare('insert into statistique
          (USR_ID, HIST_NUM, AVANCEMENT, PV)
          values (?, ?, ?, ?, ?)');
          $stmt->execute(array($i, $histoire['HIST_NUM'], 1, 3));
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

          <h2 class="text-center">Ajout d'une histoire</h2>
          <div class="well">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="histoire_add.php" method="post">
              <input type="hidden" name="id" value="<?= $movieId ?>">
              <div class="form-group">
                <label class="col-sm-4 control-label">Titre</label>
                <div class="col-sm-6">
                  <input type="text" name="titre" class="form-control" placeholder="Entrez le titre de votre histoire" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Description courte</label>
                <div class="col-sm-6">
                  <textarea name="shortDescription" class="form-control" rows="3" placeholder="Entrez sa description courte" required>
                  </textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Auteur</label>
                <div class="col-sm-6">
                  <input type="text" name="auteur" class="form-control" placeholder="Entrez le nom de son auteur" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Date</label>
                <div class="col-sm-4">
                  <input type="date" name="date" value="<?= $movieYear ?>" class="form-control" placeholder="Entrez son année de sortie" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" name="image" />
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