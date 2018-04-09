<?php
class quanlydulieuController extends Controller{
    function __construct($arrPrams){
        if(!auth::login()){
            print_r(Session::get('token'));
            url::redirect(url::createLink('admin', 'dangnhap', 'index'));
        }

        parent::__construct($arrPrams);

        // CÀI ĐẶT ĐƯỜNG DẪN ĐẾN TEMPLATE
        $this->_template->setConfigTemplate("template.ini");
        $this->_template->setFolderTemplate("admin/main/");
        $this->_template->setFileTemplate("index.php");
        $this->_template->load();
    }

    /* PHẦN DÂN TỘC */
    function dantocAction(){
        // lấy tất cả các dân tộc
        $url = "http://localhost:3000/api/dantoc/all";
        $this->_view->danhsachdantoc = $this->_model->getAPI($url); 
        
        $this->_view->render('quanlydulieu/dantoc/index');
    }
     // thêm dân tộc
     function themdantocAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/dantoc/create', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'dantoc'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
            
        }else{
            $this->_view->render('quanlydulieu/dantoc/themdantoc');
        }
    }
    // xoa dân tộc
    function xoadantocAction(){
        $idchucvu = $this->_arrPrams['idc$idchucvu'];
        if($idchucvu){
            $data = array(
                "idc$idchucvu" => $idchucvu
            );
            $result = curl::POST('http://localhost:3000/api/dantoc/delete', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'dantoc'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
            url::redirect(url::createLink('admin', 'notfound', 'notfound'));
        }
    }
    // chỉnh sửa dân tộc
    function chinhsuadantocAction(){
        if($_POST){
            print_r($_POST);
            $data = array(
                'iddantoc'=> $_POST['iddantoc'],
                'tenchucvu'=> $_POST['tenchucvu'],
            );
            $result = curl::POST('http://localhost:3000/api/dantoc/update', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'dantoc'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
             $iddantoc = $this->_arrPrams['iddantoc'] ;
            if(!empty($iddantoc)){
                // lấy tất cả các dân tôc
                $url = "http://localhost:3000/api/dantoc/only?iddantoc=".$iddantoc;
                $this->_view->dantoc = $this->_model->getAPI($url); 
                
                $this->_view->render('quanlydulieu/dantoc/chinhsuadantoc');
            }else{
                url::redirect(url::createLink('admin', 'quanlydulieu', 'dantoc'));
            }
            
        }
    }
    /* PHẦN DÂN TỘC */


    function ngoainguAction(){
         
    }

    /* PHẦN HỆ ĐÀO TẠO */
    function hedaotaoAction(){
        // lấy tất cả hệ đào tạo
        $url = "http://localhost:3000/api/hedaotao/all";
        $this->_view->danhsachhedaotao = $this->_model->getAPI($url); 
        
        $this->_view->render('quanlydulieu/hedaotao/index');
    }
    function chinhsuahedaotaoAction(){
        if($_POST){
            print_r($_POST);
            $data = array(
                'idhedaotao'=> $_POST['idhedaotao'],
                'tenhedaotao'=> $_POST['tenhedaotao'],
            );
            $result = curl::POST('http://localhost:3000/api/hedaotao/update', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'hedaotao'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
             $idhedaotao = $this->_arrPrams['idhedaotao'] ;
            // lấy tất cả các tỉnh
            $url = "http://localhost:3000/api/hedaotao/only?idhedaotao=".$idhedaotao;
            $this->_view->hedaotao = $this->_model->getAPI($url); 
            
            $this->_view->render('quanlydulieu/hedaotao/chinhsuahedaotao');
        }
    }
    function themhedaotaoAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/hedaotao/create', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'hedaotao'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
            
        }else{
            $this->_view->render('quanlydulieu/hedaotao/themhedaotao');
        }
    }
    function xoahedaotaoAction(){
        $idhedaotao = $this->_arrPrams['idhedaotao'];
        if($idhedaotao){
            $data = array(
                "idhedaotao" => $idhedaotao
            );
            $result = curl::POST('http://localhost:3000/api/hedaotao/delete', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'hedaotao'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
            url::redirect(url::createLink('admin', 'notfound', 'notfound'));
        }
    }
    /* PHẦN HỆ ĐÀO TẠO */

    /* PHẦN TỈNH THÀNH */

    // hiện thị danh sách tỉnh thành
    function tinhthanhAction(){ 
        // lấy tất cả các tỉnh
        $url = "http://localhost:3000/api/tinhthanh/all";
        $this->_view->danhsachtinhthanh = $this->_model->getAPI($url); 
        
        $this->_view->render('quanlydulieu/tinhthanh/index');
    }
    // thêm tỉnh thành
    function themtinhthanhAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/tinhthanh/create', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'tinhthanh'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
            
        }else{
            $this->_view->render('quanlydulieu/tinhthanh/themtinhthanh');
        }
    }
    // xoa tỉnh thành
    function xoatinhthanhAction(){
        $idtinhthanh = $this->_arrPrams['idtinhthanh'];
        if($idtinhthanh){
            $data = array(
                "idtinhthanh" => $idtinhthanh
            );
            $result = curl::POST('http://localhost:3000/api/tinhthanh/delete', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'tinhthanh'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
            url::redirect(url::createLink('admin', 'notfound', 'notfound'));
        }
    }

    function chinhsuatinhthanhAction(){
        if($_POST){
            $data = array(
                'idtinhthanh'=> $_POST['idtinhthanh'],
                'tentinhthanh'=> $_POST['tentinhthanh'],
            );
            $result = curl::POST('http://localhost:3000/api/tinhthanh/update', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'tinhthanh'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
             $idtinhthanh = $this->_arrPrams['idtinhthanh'] ;
            // lấy tất cả các tỉnh
            $url = "http://localhost:3000/api/tinhthanh/only?idtinhthanh=".$idtinhthanh;
            $this->_view->danhsachtinhthanh = $this->_model->getAPI($url); 
            
            $this->_view->render('quanlydulieu/tinhthanh/chinhsuatinhthanh');
        }
    }
    /* PHẦN TỈNH THÀNH */


    /* PHẦN CHỨC VỤ */
    function chucvuAction(){
         // lấy tất cả các chức vụ
         $url = "http://localhost:3000/api/chucvu/all";
         $this->_view->danhsachchucvu = $this->_model->getAPI($url); 
         
         $this->_view->render('quanlydulieu/chucvu/index');
    }
    function themchucvuAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/chucvu/create', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'chucvu'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
            
        }else{
            $this->_view->render('quanlydulieu/chucvu/themchucvu');
        }
    }
    function chinhsuachucvuAction(){
        if($_POST){
            print_r($_POST);
            $data = array(
                'idchucvu'=> $_POST['idchucvu'],
                'tenchucvu'=> $_POST['tenchucvu'],
            );
            $result = curl::POST('http://localhost:3000/api/chucvu/update', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'chucvu'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
             $idchucvu = $this->_arrPrams['idchucvu'] ;
            if(!empty($idchucvu)){
                // lấy tất cả các chức vụ
                $url = "http://localhost:3000/api/chucvu/only?idchucvu=".$idchucvu;
                $this->_view->chucvu = $this->_model->getAPI($url); 
                
                $this->_view->render('quanlydulieu/chucvu/chinhsuachucvu');
            }else{
                url::redirect(url::createLink('admin', 'quanlydulieu', 'chucvu'));
            }
            
        }
    }
    function xoachucvuAction(){
        $idchucvu = $this->_arrPrams['idchucvu'];
        if($idchucvu){
            $data = array(
                "idchucvu" => $idchucvu
            );
            $result = curl::POST('http://localhost:3000/api/chucvu/delete', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlydulieu', 'chucvu'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
            url::redirect(url::createLink('admin', 'notfound', 'notfound'));
        }
    }
}