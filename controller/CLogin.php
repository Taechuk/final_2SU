<?php
class CLogin extends Controller{
    function accueil() {
        $vue = new ViewCreator('view/login.php');
        echo $vue->render();
    }

    function default(){ $this->accueil(); }
}
?>