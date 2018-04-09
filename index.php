<?php
    
    require_once('define.php');

   
    function __autoload($classname)
    {
        $path = "libs/";
        require_once($path . "{$classname}.php");
    }

    Session::init();

    $bootstrap = new bootstrap();
    $bootstrap->init();

    
?>