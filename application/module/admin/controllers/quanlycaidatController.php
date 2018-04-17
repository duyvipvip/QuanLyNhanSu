<?php
class quanlycaidatController extends controller{
    public function __construct($arrPrams)
    {
        // TAO CÁC ĐỐI TƯỢNG MODEL, VIEW, TEMPLATE
        parent::__construct($arrPrams);

        // CÀI ĐẶT ĐƯỜNG DẪN ĐẾN TEMPLATE
        $this->_template->setConfigTemplate("template.ini");
        $this->_template->setFolderTemplate("admin/main/");
        $this->_template->setFileTemplate("index.php");
        $this->_template->load();

    }

    // HIỆN THỊ DANH SÁCH NHÂN VIÊN
    public function caidatthongsoAction(){
        $url = "http://localhost:3000/api/caidatluong/all";
        $this->_view->caidatluong = $this->_model->getAPI($url);
        $this->_view->render('quanlycaidat/caidatthongso');
    }

   

}
?>