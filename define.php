<?php

    // ===================== Relative PATH ================
    define('DS',                    DIRECTORY_SEPARATOR);
    define('ROOT_PATH',             dirname(__FILE__));
    define('APPLICATION_PATH',      ROOT_PATH . DS .'application'. DS);
    define('MODULE_PATH',           APPLICATION_PATH . 'module' . DS);
    define('PUBLIC_PATH',           ROOT_PATH . DS .'public'. DS);
    define('TEMPLATE_PATH',         PUBLIC_PATH . "template" . DS);

    // ===================== Absolute PATH ================
    define('ROOT_URL',             DS. "https://testthoi.herokuapp.com" . DS);
    define('PUBLIC_URL',           ROOT_URL .'public'. DS);
    define('APPLICATION_URL',      ROOT_URL .'application'. DS);
    define('MODULE_URL',           APPLICATION_URL . 'module' . DS);
    define('TEMPLATE_URL',         PUBLIC_URL . "template" . DS);


    // ================== Prams $_GET & $_POST default ================
    define	('DEFAULT_MODULE'		, 'admin');
    define	('DEFAULT_CONTROLLER'	, 'quanlytrangchu');
    define	('DEFAULT_ACTION'		, 'index');


    

?>