<?php
require_once "includes/functions.php";
session_start();

// return al history
$histoires = getDb()->query('select * from histoire order by HIST_NUM desc'); 
?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container">
        <?php require_once "includes/header.php"; ?>
<<<<<<< Updated upstream
<<<<<<< HEAD
            <div class="container">
=======
        <div class="d-flex">
>>>>>>> 9cbe5534a931b425f4afa167d0b84ef8fb5c2b78
=======
        <div class="container">
>>>>>>> Stashed changes
        <?php foreach ($histoires as $histoire) { ?>
            <article>
                <h3><a class="titreHistoire" href="histoire.php?id=<?=$histoire['HIST_NUM']?>"><?=$histoire['HIST_TITRE']?></a></h3>
                <p class="synopsisHistoire"><?=$histoire['HIST_RESUME']?></p>
            </article>
        <?php } ?>

        <?php require_once "includes/footer.php"; ?>
    </div>
    <?php require_once "includes/scripts.php"; ?>
</body>

</html>