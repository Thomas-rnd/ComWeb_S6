<?php
require_once "includes/functions.php";
session_start();

$histId = $_GET['id'];
$stmt = getDb()->prepare('select * from histoire where HIST_NUM=?');
$stmt->execute(array($histId));
$histoire = $stmt->fetch(); // Access first (and only) result line
?>

<!doctype html>
<html>

<?php 
$pageTitle = $histoire['HIST_TITRE'];
require_once "includes/head.php"; 
?>

<body>
    <div class="container">
        <?php require_once "includes/header.php"; ?>

        <div class="jumbotron">
            <div class="row">
                <div class="col-md-5 col-sm-7">
                    <img class="img-responsive histImage" src="images/<?= $histoire['HIST_IMAGE'] ?>" title="<?= $histoire['HIST_TITRE'] ?>" />
                </div>
                <div class="col-md-7 col-sm-5">
                    <h2><?= $histoire['HIST_TITRE'] ?></h2>
                    <p><?= $histoire['HIST_AUTEUR'] ?>, <?= $histoire['HIST_DATE'] ?></p>
                    <p><small><?= $histoire['HIST_RESUME'] ?></small></p>
                    <?php 
                    if (isUserConnected()) { 
                        $usr = isUserConnected();
                        $stmt = getDb()->prepare('select * from user where USR_LOGIN=?');
                        $stmt->execute(array($usr));
                        $user = $stmt->fetch();
                        $usrId = $user['AVANCEMENT'] ?>
                        <p><a class="lancerHistoire" href="histoire_read.php?histId=<?=$histId?>usrAvancement=<?=$usrAvancement?>">Lancer l'histoire</a></p>
                    <?php } ?>
                </h2>
            </div>
        </div>
    </div>

    <?php require_once "includes/footer.php"; ?>
</div>

<?php require_once "includes/scripts.php"; ?>
</body>

</html>