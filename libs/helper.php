<?php
class helper {
    public static function createMess($data){
        $xhtml = '';
        if(!empty($data)){
            $xhtml =  "<div class='alert alert-warning'>
                    <strong>Warning!</strong> $data
                </div>";
        }
        return $xhtml;
        
    }
}