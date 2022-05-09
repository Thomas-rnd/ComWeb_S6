<?php
require_once "includes/functions.php";
session_start();
?>

<!doctype html>
<html>

<?php 
if (isset($_POST['histId'])) 
{
    $histId = escape($_POST['histId']);
    $usrAvancement = escape($_POST['usrAvancement']);
    $_SESSION['histId']=$histId;
    $_SESSION['usrAvancement']=$usrAvancement;
}

$stmt = getDb()->prepare('select * from narration where HIST_NUM=? and NARR_INDEX=?');
$stmt->execute(array($_SESSION['histId'], $_SESSION['usrAvancement']));
$narration = $stmt->fetch();

$nbNarration = getDb()->prepare('select * from narration where HIST_NUM=?');
$nbNarration->execute(array($_SESSION['histId']));
$avancement = $_SESSION['usrAvancement']/$nbNarration->rowCount()*100;

$titre = getDb()->prepare('select * from histoire where HIST_NUM=?');
$titre->execute(array($_SESSION['histId']));
$histoire = $titre->fetch();
$pageTitle = $histoire['HIST_TITRE'];

$pageTitle = $histoire['HIST_TITRE'];
require_once "includes/head.php"; 
?>

<body>
    <div class="container">
        <?php require_once "includes/header.php"; ?>
        <div class="jumbotron">
            <h2><?= $histoire['HIST_TITRE']?></h2>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $avancement ?>%;" aria-valuenow="<?= $avancement ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p><?= $narration['NARR_TEXTE'] ?></p>
            <?php 
            $choix = getDb()->prepare('select * from choix where NARR_INDEX=?');
            $choix->execute(array($_SESSION['usrAvancement']));?>
            <div class="row">    
                <?php while($numChoix = $choix->fetch()) 
                { ?>
                    <form method="POST" action="histoire_read.php"> 
                        <div class="col-sm">
                            <input type="hidden" name="histId" value="<?=$_SESSION['histId']?>"/>
                            <input type="hidden" name="usrAvancement" value="<?=$numChoix['CH_INDEX']?>"/>
                            <button class ="btn btn-link" type="submit"><?=$numChoix['CH_TEXTE'] ?></button>
                            </br></br>
                        </div>
                    </form>
                <?php } ?>        
            </div>         
        </div>
        <?php require_once "includes/footer.php"; ?>
    </div>
<?php require_once "includes/scripts.php"; ?>
</body>

</html>