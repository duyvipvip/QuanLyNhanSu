<?php 
class quanlyluongModel{
    function __construct(){

    }
    
    function danhsachnhanvien($url){

        return json_decode(file_get_contents($url));
    
    }

    function laymotnhanvien($url,$idnhanvien){
        return json_decode(file_get_contents($url . $idnhanvien));
    }

    function laymotthuongluong($url){
        return json_decode(file_get_contents($url));
    }

    function laymotphatluong($url){
        return json_decode(file_get_contents($url));
    }
    function laymottamung($url){
        return json_decode(file_get_contents($url));
    }
}
?>