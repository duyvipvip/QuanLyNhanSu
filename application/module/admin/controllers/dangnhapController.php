<?php
    class dangnhapController extends controller{
        function __construct($arrPrams){
            // if(auth::login()){
            //     url::redirect(url::createLink('admin', 'quanlytrangchu', 'index'));
            // }

            parent::__construct($arrPrams);

             // CÀI ĐẶT ĐƯỜNG DẪN ĐẾN TEMPLATE
            $this->_template->setConfigTemplate("template.ini");
            $this->_template->setFolderTemplate("admin/main/");
            $this->_template->setFileTemplate("login.php");
            $this->_template->load();
        }

        function indexAction(){
            if(!empty($_GET['token'])){
                $token = $_GET['token'];
                $url = "/auth/me?token=".$token;
                $nguoidung = $this->_model->getAPI($url);
                if(!empty($nguoidung)){
                    Session::set('nguoidung', $nguoidung);
                    Session::set('token', $token);
                    // url::redirect(url::createLink('admin', 'quanlytrangchu', 'index'));
                }
                
            }
            if($_POST){
                $data = $_POST;
                $token =  json_decode(curl::POST('/auth/login', $data));
                if($token->token != null){
                        Session::set('nguoidung', $token->nguoidung);
                        Session::set('token', $token->token);
                        // url::redirect(url::createLink('admin', 'quanlytrangchu', 'index'));
                }else{
                    Session::set('message', $token->message);
                    $this->_view->render('dangnhap/index');
                }
            }else{
                $this->_view->render('dangnhap/index');
            }
    
        }

        function logoutAction(){
            Session::delete('token');
            Session::delete('nguoidung');
            // url::redirect(url::createLink('admin', 'dangnhap', 'index'));
        }
    }
?>