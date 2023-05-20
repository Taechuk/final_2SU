<?php
class CDefault extends Controller{
    function accueil() {
        $vue = new ViewCreator('view/main.php');
    }

    function default(){ $this->accueil(); }
}
?>