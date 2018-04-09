<?php
class quanlyluongController extends Controller{
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

    // PHẦN THƯỞNG LƯƠNG
    function thuongluongAction(){
        $url = "http://localhost:3000/api/laytatcanhanvien";
        $this->_view->danhsachnhanvien = $this->_model->danhsachnhanvien($url);        
        $this->_view->render('quanlyluong/thuongluong/index');
    }
    function themthuongluongAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/taomoithuongluong', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlyluong', 'thuongluong'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
           
        }
        $url = "http://localhost:3000/api/laytatcanhanvien";
        $this->_view->danhsachnhanvien = $this->_model->danhsachnhanvien($url);
        $this->_view->render('quanlyluong/thuongluong/themthuongluong');
    }

    function chinhsuathuongluongAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/chinhsuathuongluong', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlyluong', 'thuongluong'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
            $idnhanvien = $this->_arrPrams['idnhanvien'];
            $idthuongluong =  $this->_arrPrams['idthuongluong'];
            
            $url = "http://localhost:3000/api/timkiemnhanvien/";
            $this->_view->nhanvien = $this->_model->laymotnhanvien($url ,$idnhanvien);
            
            $url = "http://localhost:3000/api/timkiemmotthuongluong?idnhanvien=$idnhanvien&idthuongluong=$idthuongluong";
            $this->_view->thuongluong = $this->_model->laymotthuongluong($url);
    
            $this->_view->render('quanlyluong/thuongluong/chinhsua');
        }
       
    }

    function xoathuongluongAction(){
        $idthuongluong =  $this->_arrPrams['idthuongluong'];
        $data = array(
            "idthuongluong" => $idthuongluong
        );
        $result = curl::POST('http://localhost:3000/api/xoathuongluong', $data);
        if($result){
            url::redirect(url::createLink('admin', 'quanlyluong', 'thuongluong'));
        }else{
            url::redirect(url::createLink('admin', 'error', 'error'));
        }
    }
    // KẾT THÚC PHẦN THƯỞNG LƯƠNG


    // PHẦN PHẠT LƯƠNG
    function phatluongAction(){
        $url = "http://localhost:3000/api/laytatcanhanvien";
        $this->_view->danhsachnhanvien = $this->_model->danhsachnhanvien($url);  
        $this->_view->render('quanlyluong/phatluong/index');
    }
    function themphatluongAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/phatluong/taomoiphatluong', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlyluong', 'phatluong'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
           
        }
        $url = "http://localhost:3000/api/laytatcanhanvien";
        $this->_view->danhsachnhanvien = $this->_model->danhsachnhanvien($url);
        $this->_view->render('quanlyluong/phatluong/themphatluong');
    }
    function chinhsuaphatluongAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/phatluong/chinhsuaphatluong', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlyluong', 'phatluong'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
            $idnhanvien = $this->_arrPrams['idnhanvien'];
            $idphatluong =  $this->_arrPrams['idphatluong'];
            
            $url = "http://localhost:3000/api/timkiemnhanvien/";
            $this->_view->nhanvien = $this->_model->laymotnhanvien($url ,$idnhanvien);
            
            $url = "http://localhost:3000/api/phatluong/timkiemmotphatluong?idnhanvien=$idnhanvien&idphatluong=$idphatluong";
            $this->_view->phatluong = $this->_model->laymotphatluong($url);
    
            $this->_view->render('quanlyluong/phatluong/chinhsua');
        }
    }
    function xoaphatluongAction(){
        $idphatluong =  $this->_arrPrams['idphatluong'];
        $data = array(
            "idphatluong" => $idphatluong
        );
        $result = curl::POST('http://localhost:3000/api/xoaphatluong', $data);
        if($result){
            url::redirect(url::createLink('admin', 'quanlyluong', 'phatluong'));
        }else{
            url::redirect(url::createLink('admin', 'error', 'error'));
        }
    }
    // KẾT THÚC PHẦN PHẠT LƯƠNG

    // PHẦN TẠM ỨNG LƯƠNG
    function tamungAction(){
        $url = "http://localhost:3000/api/laytatcanhanvien";
        $this->_view->danhsachnhanvien = $this->_model->danhsachnhanvien($url);  
        $this->_view->render('quanlyluong/tamungluong/index');
    }
    function themtamungAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/tamung/taomoitamung', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlyluong', 'tamung'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
           
        }
        $url = "http://localhost:3000/api/laytatcanhanvien";
        $this->_view->danhsachnhanvien = $this->_model->danhsachnhanvien($url);
        $this->_view->render('quanlyluong/tamungluong/them');
    }
    function chinhsuatamungAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:3000/api/tamung/chinhsuatamung', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlyluong', 'tamung'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
            $idnhanvien = $this->_arrPrams['idnhanvien'];
            $idtamung =  $this->_arrPrams['idtamung'];
            
            $url = "http://localhost:3000/api/timkiemnhanvien/";
            $this->_view->nhanvien = $this->_model->laymotnhanvien($url ,$idnhanvien);
            
            $url = "http://localhost:3000/api/tamung/timkiemmottamung?idnhanvien=$idnhanvien&idtamung=$idtamung";
            $this->_view->tamung = $this->_model->laymottamung($url);
    
            $this->_view->render('quanlyluong/tamungluong/chinhsua');
        }
    }
    function xoatamungAction(){
        $idtamung =  $this->_arrPrams['idtamung'];
        $data = array(
            "idtamung" => $idtamung
        );
        $result = curl::POST('http://localhost:3000/api/tamung/xoatamung', $data);
        if($result){
            url::redirect(url::createLink('admin', 'quanlyluong', 'tamung'));
        }else{
            url::redirect(url::createLink('admin', 'error', 'error'));
        }
    }
    // KẾT THÚC PHẦN TẠM ỨNG LƯƠNG

    function bangluongAction(){
        $this->_view->render('quanlyluong/bangluong');
    }
}
?>