<?php
require_once "includes/functions.php";
session_start();
?>

<!doctype html>
<html>

<?php 
$histId = $_GET['histId'];
$usrAvancement = $_GET['usrAvancement'];
$stmt = getDb()->prepare('select * from narration where HIST_NUM=? and NARR_INDEX=?');
$stmt->execute(array($histId,$usrAvancement));
$narration = $stmt->fetch();

$titre = getDb()->prepare('select * from histoire where HIST_NUM=?');
$titre->execute(array($histId));
$histoire = $titre->fetch();
$pageTitle = $histoire['HIST_TITRE'];
require_once "includes/head.php"; 
?>

<body>
    <div class="container">
        <?php require_once "includes/header.php"; ?>

        <div class="jumbotron">
            <div class="row">
                <div class="col-md-7 col-sm-5">
                    <h2><?= $histoire['HIST_TITRE']?></h2>
                    <p><?= $narration['NARR_TEXTE'] ?></p>
                    <?php
                    $choix = getDb()->prepare('select * from choix where NARR_INDEX=?');
                    $choix->execute(array($histId));
                    $histoire = $choix->fetch();
                    foreach ($choix as $numChoix) { ?>
                        <a class="btn btn-secondary" href="histoire_read.php?histId=<?=$histoire['HIST_NUM']?>usrAvancement=<?=0?>"><?=$numChoix['CH_TEXTE']?></a>
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