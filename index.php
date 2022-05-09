<?php
require_once "includes/functions.php";
session_start();

// return al history
$histoires = getDb()->query('select * from histoire order by HIST_NUM desc'); 
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet">
</head>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container">
        <?php require_once "includes/header.php"; ?>
        <form method="POST" action="histoire.php">
            <?php foreach ($histoires as $histoire) { ?>
                <input type="hidden" name="histId" value="<?=$histoire['HIST_NUM']?>"/>
                <button class ="btn btn-link" type="submit"><?=$histoire['HIST_TITRE']?></button>
                <p class="synopsisHistoire"><?=$histoire['HIST_RESUME']?></p>
            <?php } ?>
        </form>
        <?php require_once "includes/footer.php"; ?>
    </div>
    <?php require_once "includes/scripts.php"; ?>
</body>
</html>