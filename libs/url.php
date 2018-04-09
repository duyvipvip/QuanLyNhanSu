<?php
    class url {
        public static function createLink($module, $controller, $action, $arrParams=null){
            $appenUrl = '';  // Concet url
            if($arrParams != null){
                foreach ($arrParams as $key => $value){
                    $appenUrl .= "&$key=$value";
                }
            }
            // Example index.php?module=admin&controller=group&action=ajaxStatus&id=2&status=0
            return "index.php?module=$module&controller=$controller&action=$action".$appenUrl;
        }
        public static function redirect($link){
            header('location: ' . $link);
            exit();
        }
    }
?>