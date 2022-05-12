<?php
require_once "includes/functions.php";
session_start();

$stmt = getDb()->prepare('select * from user where USR_LOGIN=?');
$stmt->execute(array($_SESSION['login']));
$user=$stmt->fetch();

$stmt = getDb()->prepare('select * from statistiques where USR_ID=? and HIST_NUM=?');
$stmt->execute(array($user['USR_ID'], $_SESSION['histId']));
$statistiques = $stmt->fetch();

$nbNarrations = getDb()->prepare('select * from narration where HIST_NUM=?');
$nbNarrations->execute(array($_SESSION['histId']));

if (isset($_POST['histId'])) 
{
    $histId = escape($_POST['histId']);
    if (isset($_POST['usrAvancement']))
    {
        $usrAvancement = escape($_POST['usrAvancement']);
    }
    elseif (isset($_POST['resetAvancement'])) 
    {
        $usrAvancement = escape($_POST['resetAvancement']);
    }
    $_SESSION['histId']=$histId;

    $stmt = getDb()->prepare('select * from narration where HIST_NUM=? and NARR_INDEX=?');
    $stmt->execute(array($_SESSION['histId'], $usrAvancement));
    $choixNarration = $stmt->fetch();

    if($usrAvancement==$nbNarrations->rowCount())
    {
        $modify = getDb()->prepare("update statistiques set AVANCEMENT=:avancement, NB_GAGNE=:gagne
        where USR_ID=:usrId and HIST_NUM=:histId");
        $modify->execute(array(
        'avancement'=>1,
        'gagne'=>$statistiques['NB_GAGNE']+1,
        'usrId'=>$user['USR_ID'],
        'histId'=>$_SESSION['histId']));
    }
    else if($choixNarration['NARR_NBCHOIX']==0)
    {
        $modify = getDb()->prepare("update statistiques set AVANCEMENT=:avancement, NB_PERDU=:perdu
        where USR_ID=:usrId and HIST_NUM=:histId");
        $modify->execute(array(
        'avancement'=>1,
        'perdu'=>$statistiques['NB_PERDU']+1,
        'usrId'=>$user['USR_ID'],
        'histId'=>$_SESSION['histId']));
    }
    else
    {
        $modify = getDb()->prepare("update statistiques set AVANCEMENT=:avancement, NB_JOUE=:joue
        where USR_ID=:usrId and HIST_NUM=:histId");
        $modify->execute(array(
        'avancement'=>$usrAvancement,
        'joue'=>$statistiques['NB_JOUE']+1,
        'usrId'=>$user['USR_ID'],
        'histId'=>$_SESSION['histId']));
    }
}

$stmt = getDb()->prepare('select * from statistiques where USR_ID=? and HIST_NUM=?');
$stmt->execute(array($user['USR_ID'], $_SESSION['histId']));
$majStatistiques = $stmt->fetch();

$stmt = getDb()->prepare('select * from narration where HIST_NUM=? and NARR_INDEX=?');
$stmt->execute(array($_SESSION['histId'], $majStatistiques['AVANCEMENT']));
$narration = $stmt->fetch();

$avancement = $majStatistiques['AVANCEMENT']/$nbNarrations->rowCount()*100;

$titre = getDb()->prepare('select * from histoire where HIST_NUM=?');
$titre->execute(array($_SESSION['histId']));
$histoire = $titre->fetch();
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
            <h2><?= $histoire['HIST_TITRE'].$majStatistiques['AVANCEMENT']?></h2>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $avancement ?>%;" aria-valuenow="<?= $avancement ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p><?= $narration['NARR_TEXTE'] ?></p>
            <?php 
            $choix = getDb()->prepare('select * from choix where NARR_INDEX=?');
            $choix->execute(array($majStatistiques['AVANCEMENT']));?>
            <div class="row">    
                <?php while($numChoix = $choix->fetch()) 
                { ?>
                    <form method="POST" action="histoire_read.php"> 
                        <div class="col-sm">
                            <input type="hidden" name="histId" value="<?=$_SESSION['histId']?>"/>
                            <input type="hidden" name="usrAvancement" value="<?=$numChoix['CH_INDEX']?>"/>
                            <button class ="btn btn-link" type="submit"> <?=$numChoix['CH_TEXTE'] ?></button>
                            </br></br>
                        </div>
                    </form>
                <?php } ?>   
                <form method="POST" action="histoire_read.php"> 
                    <div class="col-sm">
                        <input type="hidden" name="histId" value="<?=$_SESSION['histId']?>"/>
                        <input type="hidden" name="resetAvancement" value="1"/>
                        <button class ="btn btn-primary" type="submit">Relancer l'histoire</button>
                        </br></br>
                    </div>
                </form>     
            </div>         
        </div>
        <?php require_once "includes/footer.php"; ?>
    </div>
<?php require_once "includes/scripts.php"; ?>
</body>

</html>