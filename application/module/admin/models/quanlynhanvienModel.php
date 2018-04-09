<?php 
class quanlynhanvienModel{
    function __construct(){

    }

    function getAPI($url){

        return json_decode(file_get_contents($url));
    
    }
    function laymotnhanvien($url,$idnhanvien){
        return json_decode(file_get_contents($url . $idnhanvien));
    }
}
?>