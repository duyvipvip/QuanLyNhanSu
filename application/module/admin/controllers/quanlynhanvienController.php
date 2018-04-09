<?php
class quanlynhanvienController extends Controller{
    public function __construct($arrPrams)
    {
        if(!auth::login()){
            print_r(Session::get('token'));
            url::redirect(url::createLink('admin', 'dangnhap', 'index'));
        }

        // TAO CÁC ĐỐI TƯỢNG MODEL, VIEW, TEMPLATE
        parent::__construct($arrPrams);

        // CÀI ĐẶT ĐƯỜNG DẪN ĐẾN TEMPLATE
        $this->_template->setConfigTemplate("template.ini");
        $this->_template->setFolderTemplate("admin/main/");
        $this->_template->setFileTemplate("index.php");
        $this->_template->load();

    }

    public function chinhsuanhanvienAction(){
        
       if($_POST){
           $data = $_POST;
           $data[hinhanh] = $_FILES['hinhanh']['name'];
           $result = curl::POST('http://localhost:9000/api/chinhsuanhanvien', $data);
           if($result){
               url::redirect(url::createLink('admin', 'quanlytrangchu', 'index'));
           }else{
               url::redirect(url::createLink('admin', 'error', 'error'));
           }
       }else{
            $idnhanvien = $this->_arrPrams['idnhanvien'] ;
            // lấy nhân viên
            $url = "http://localhost:9000/api/timkiemnhanvien/";
            $this->_view->nhanvien = $this->_model->laymotnhanvien($url ,$idnhanvien);
           
            // lấy tất cả chức vụ
            $url = "http://localhost:9000/api/chucvu/all";
            $this->_view->danhsachchucvu = $this->_model->getAPI($url); 
            
            // lấy tất cả ngoại ngữ
            $url = "http://localhost:9000/api/ngoaingu/all";
            $this->_view->danhsachngoaingu = $this->_model->getAPI($url); 

            // lấy tất cả các tỉnh
            $url = "http://localhost:9000/api/tinhthanh/all";
            $this->_view->danhsachtinhthanh = $this->_model->getAPI($url); 

            // lấy tất cả các hệ đào tạo
            $url = "http://localhost:9000/api/hedaotao/all";
            $this->_view->danhsachhedaotao = $this->_model->getAPI($url); 
            
            // lấy tất cả dân tộc
            $url = "http://localhost:9000/api/dantoc/all";
            $this->_view->danhsachdantoc = $this->_model->getAPI($url); 
 
             
            $this->_view->render('quanlynhanvien/chinhsuanhanvien');
        }

    }

     // XOÁ NHÂN VIÊN
     public function xoanhanvienAction(){
        $idnhanvien = $this->_arrPrams['idnhanvien'];
        if($idnhanvien){
            $data = array(
                "idnhanvien" => $idnhanvien
            );
            $result = curl::POST('http://localhost:9000/api/xoanhanvien', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlytrangchu', 'index'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
            url::redirect(url::createLink('admin', 'notfound', 'notfound'));
        }

    }

    // THÊM NHÂN VIÊN
    function themnhanvienAction(){
        if($_POST){
            $data = $_POST;
            $result = curl::POST('http://localhost:9000/api/taomoinhanvien', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlytrangchu', 'index'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
            
        }else{
            // lấy tất cả chức vụ
            $url = "http://localhost:9000/api/chucvu/all";
            $this->_view->danhsachchucvu = $this->_model->getAPI($url); 
            
            // lấy tất cả ngoại ngữ
            $url = "http://localhost:9000/api/ngoaingu/all";
            $this->_view->danhsachngoaingu = $this->_model->getAPI($url); 

            // lấy tất cả các tỉnh
            $url = "http://localhost:9000/api/tinhthanh/all";
            $this->_view->danhsachtinhthanh = $this->_model->getAPI($url); 

            // lấy tất cả các hệ đào tạo
            $url = "http://localhost:9000/api/hedaotao/all";
            $this->_view->danhsachhedaotao = $this->_model->getAPI($url); 
            
            // lấy tất cả dân tộc
            $url = "http://localhost:9000/api/dantoc/all";
            $this->_view->danhsachdantoc = $this->_model->getAPI($url); 
            
            $this->_view->render('quanlynhanvien/themnhanvien');
        }
    }
}
?>