<?php
    class notfoundController extends controller{
        function __construct($arrPrams){
            parent::__construct($arrPrams);

             // CÀI ĐẶT ĐƯỜNG DẪN ĐẾN TEMPLATE
            $this->_template->setConfigTemplate("template.ini");
            $this->_template->setFolderTemplate("admin/main/");
            $this->_template->setFileTemplate("404.php");
            $this->_template->load();
        }

        function notfoundAction(){
            $this->_view->render('', false);
    
        }
    }
?>