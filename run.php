<?php require_once 'config.php';?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Final</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="header">
        <?php require_once 'sections/entete.php'; ?>
        <?php require_once 'sections/menu.php'; ?>
    </div>

    <?php
        $erreurs = array();

        if (!empty($_POST)){
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
            $pwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_SPECIAL_CHARS);

            $erreurs = array();

            #setup login
            try{$MUser = new MUser($config, $username, $pwd);}
            catch(Exception $e){ $erreurs[] = "Le compte n'existe pas ou le mot de passe est incorrect."; }

            if (empty($erreurs)){
                setcookie("loggedin", $MUser->getId(), time()+60*60*24);

                header("Refresh:0; url=page2.php");
            }
            else
            {
            require_once 'sections/retroaction.php';
            }

        }
        ?>

        <form name="users" action="index.php" method="post">
            <fieldset>
                <legend>Formulaire de création d'utilisateur</legend>
                <label class="sautligne">Utilisateur : <input type="email" name="username" value=""></label>
                <label class="sautligne">Mot de passe : <input type="text" name="pwd" value=""></label>
                    <input type="submit" name="btnLog" value="Me connecter">
                </div>
            </fieldset>
        </form>       


    </div>

    <div id="footer"><?php require_once 'sections/pied.php'; ?></div>
</body>

</html>