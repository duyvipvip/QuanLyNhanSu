<?php
class quanlynguoidungController extends controller{
    public function __construct($arrPrams)
    {
        // if(!auth::login()){
        //     print_r(Session::get('token'));
        //     url::redirect(url::createLink('admin', 'dangnhap', 'index'));
        // }
        
        // TAO CÁC ĐỐI TƯỢNG MODEL, VIEW, TEMPLATE
        parent::__construct($arrPrams);

        // CÀI ĐẶT ĐƯỜNG DẪN ĐẾN TEMPLATE
        $this->_template->setConfigTemplate("template.ini");
        $this->_template->setFolderTemplate("admin/main/");
        $this->_template->setFileTemplate("index.php");
        $this->_template->load();

    }

    public function indexAction(){
        $url = "/api/laytatcanguoidung";
        $this->_view->danhSachNguoiDung = $this->_model->danhsachnguoidung($url); 
        $this->_view->render('quanlynguoidung/index');
    }

    public function chinhsuanguoidungAction(){
        $idnguoidung = $this->_arrPrams['idnguoidung'];
        $this->_view->render('quanlynguoidung/chinhsuanguoidung');
    }

     // XOÁ NHÂN VIÊN
     public function xoanguoidungAction(){
        echo $idnguoidung = $this->_arrPrams['idnguoidung'];
    }

    // THÊM NHÂN VIÊN
    function themnguoidungAction(){
    }
}
?>