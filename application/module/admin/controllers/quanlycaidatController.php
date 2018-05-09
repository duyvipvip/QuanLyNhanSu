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
        if($_POST){
            $data = $_POST;
            $result = curl::POST('/api/caidatluong/update', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlytrangchu', 'index'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }
        $url = "/api/caidatluong/all";
        $this->_view->caidatluong = $this->_model->getAPI($url);
        $this->_view->render('quanlycaidat/caidatthongso');
    }

}
?>