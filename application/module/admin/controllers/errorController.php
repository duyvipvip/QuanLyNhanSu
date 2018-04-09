<?php
class errorController extends controller{
    public function __construct($arrPrams)
    {
        // TAO CÁC ĐỐI TƯỢNG MODEL, VIEW, TEMPLATE
        parent::__construct($arrPrams);

        // CÀI ĐẶT ĐƯỜNG DẪN ĐẾN TEMPLATE
        $this->_template->setConfigTemplate("template.ini");
        $this->_template->setFolderTemplate("admin/main/");
        $this->_template->setFileTemplate("error.php");
        $this->_template->load();

    }

    // HIỆN THỊ DANH SÁCH NHÂN VIÊN
    public function errorAction(){
        $this->_view->render('', false);
    }

   

}
?>