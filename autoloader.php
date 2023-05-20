<?php
register_autoloaders();

function register_autoloaders(){
    spl_autoload_register('autoload_m');
    spl_autoload_register('autoload_c');
    spl_autoload_register('autoload_v');
}

function autoload_m($class){ readable('model/'.$class.'.php'); }
function autoload_c($class){ readable('controller/'.$class.'.php'); }
function autoload_v($class){ readable('view/'.$class.'.php'); }

function readable($file){if(is_readable($file)) require_once $file; }
