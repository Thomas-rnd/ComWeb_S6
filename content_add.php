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
        redirect("index.php");
    }
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
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="histoire_add.php" method="post">
                    <div class="form-group">
                        <label for="exampleSelect1" class="form-label mt-4">Sélection d'une histoire</label>
                            <select name="histoire" class="form-select" id="exampleSelect1">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Narration</label>
                        <div class="col-sm-6">
                        <textarea name="narration" class="form-control" rows="3" placeholder="Entrez sa description courte" required>
                        </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                            <label for="exampleSelect1" class="form-label mt-4">Nombre de choix issu de cette narration</label>
                            <select name="nbChoix" class="form-select" id="exampleSelect1">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                    </div>
                </form>
          </div>

          <?php require_once "includes/footer.php"; ?>
      </div>

      <?php require_once "includes/scripts.php"; ?>
    </body>

  </html>

  <?php } else { ?>
    <html>

    <body>
      <img src="https://sd.keepcalm-o-matic.co.uk/i/don-t-mess-with-me-bro.png" />
    </body>

    </html>
    <?php } ?>