<?php require_once "includes/functions.php"; ?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-book"></span> Histoire interactive</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-target">
            <?php if (isAdminConnected()) { ?>
                <ul class="nav navbar-nav">
                    <li><a href="histoire_add.php">Ajouter une histoire</a></li>
                    <li><a href="content_add.php">Ajouter une narration</a></li>
                    <li><a href="bdd_modify.php">Modification histoire</a></li>
                </ul>
            <?php } ?>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isUserConnected()) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> Bienvenue, <?= $_SESSION['login'] ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php">Se déconnecter</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>Non connecté<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="login.php">Se connecter</a></li>
                            <li><a href="create_account.php">S'inscrire</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div><!-- /.container -->
</nav>