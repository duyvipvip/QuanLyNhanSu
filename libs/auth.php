<?php
    class auth {
        public static function login(){
            if(Session::get('token') != null){
                return true;
            }
            return false;
        }
    }
?>