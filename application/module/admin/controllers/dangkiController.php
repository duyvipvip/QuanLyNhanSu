<?php
    class dangkiController extends controller{
        function __construct($arrPrams){
            parent::__construct($arrPrams);

             // CÀI ĐẶT ĐƯỜNG DẪN ĐẾN TEMPLATE
            $this->_template->setConfigTemplate("template.ini");
            $this->_template->setFolderTemplate("admin/main/");
            $this->_template->setFileTemplate("signup.php");
            $this->_template->load();
        }

        function indexAction(){
            if($_POST){
                $data = $_POST;
                if($data['password'] != $data['confirmpassword']){
                    url::redirect(url::createLink('admin', 'dangki', 'index'));
                }else{
                    unset($data['confirmpassword']);
                    $result =json_decode(curl::POST('/api/taomoinguoidung', $data));
                    if(!empty($result->message)){
                        Session::set('message', $result->message);
                        $this->_view->render('dangki/index');
                    }else{
                        echo 'vao';
                        url::redirect(url::createLink('admin', 'dangnhap', 'index'));
                    }
                    // if($result){
                    // }else{
                    //     url::redirect(url::createLink('admin', 'dangki', 'index'));
                    // }
                }
            }else{
                $this->_view->render('dangki/index');
            }
        }
    }
?>