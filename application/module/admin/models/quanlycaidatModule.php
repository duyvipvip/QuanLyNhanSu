<?php 
class quanlycaidatModel{
    function __construct(){}

    function getAPI($url){

        return json_decode(file_get_contents($url));
    
    }
}
?>