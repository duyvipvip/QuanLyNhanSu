<?php
    
    require_once('define.php');

   
    function __autoload($classname)
    {   
        // echo file_exists("libs/controller.php");
        $path = "libs/";
        // require_once($path . "controller.php");
        // require_once($path . "Session.php");
        // require_once($path . "bootstrap.php");
        require_once($path . "{$classname}.php");
    }

    Session::init();

    $bootstrap = new bootstrap();
    $bootstrap->init();

    
?>