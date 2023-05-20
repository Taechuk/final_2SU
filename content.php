<?php
$ctrl = 'CDefault';
$paramAction = 'login';

if(isset($_REQUEST['ctrl'])){
    $request = filter_var($_REQUEST['ctrl'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    switch($request){
        case "login":
            $ctrl = 'CLogin';
            break;
        case "runs":
            $ctrl = 'CRuns';
            break;
        
    }
}

$controller = new $ctrl($config);

if(!method_exists($controller, $paramAction)) throw new Exception("L'action $paramAction non trouvée dans le contrôleur " + get_class($controller));

call_user_func(array($controller, $paramAction));