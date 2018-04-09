<?php 
class quanlynguoidungModel{
    function __construct(){}

    function danhsachnguoidung($url){

        return json_decode(file_get_contents($url));
    
    }
}
?>