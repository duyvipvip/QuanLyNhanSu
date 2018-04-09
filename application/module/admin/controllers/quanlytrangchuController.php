<?php
class quanlytrangchuController extends controller{
    public function __construct($arrPrams)
    {
        // TAO CÁC ĐỐI TƯỢNG MODEL, VIEW, TEMPLATE
        parent::__construct($arrPrams);

        // CÀI ĐẶT ĐƯỜNG DẪN ĐẾN TEMPLATE
        $this->_template->setConfigTemplate("template.ini");
        $this->_template->setFolderTemplate("admin/main/");
        $this->_template->setFileTemplate("index.php");
        $this->_template->load();

        
        
        if(!auth::login()){
            url::redirect(url::createLink('admin', 'dangnhap', 'index'));
        }
    }

    // HIỆN THỊ DANH SÁCH NHÂN VIÊN
    public function indexAction(){
        // lấy danh sách tất cả nhân viên
        $url = "http://localhost:3000/api/laytatcanhanvien";
        $this->_view->danhsachnhanvien = $this->_model->getAPI($url);        

        $this->_view->render('quanlytrangchu/quanlytrangchu');
    }

   

}
?>