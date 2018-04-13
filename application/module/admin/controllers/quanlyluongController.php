<?php
class quanlyluongController extends Controller{
    private $datareport= 'dedw';
    function __construct($arrPrams){
        if(!auth::login()){
            Session::get('token');
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

    // PHẦN PHẠT LƯƠNG
    function bangluongAction(){
        $checkReport = empty($this->_arrPrams['checkreport']) ? '' : $this->_arrPrams['checkreport'];
        $currentMonth = empty($_GET['thang']) ? date('m', strtotime('0 month')) : $_GET['thang'];
        $currentYear = empty($_GET['nam']) ? date('Y'): $_GET['nam'];

        $url = "http://localhost:3000/api/laytatcanhanvien";
        $dsnhanvien = $this->_model->danhsachnhanvien($url);

        $timeCurrentMonthFirst = date("Y-m-d", mktime(0, 0, 0, $currentMonth ,1 ,$currentYear));
        $timeCurrentMonthLast = date("Y-m-d", mktime(0, 0, 0, $currentMonth+1,0,$currentYear));

        $timeCurrentMonthFirst = (new DateTime($timeCurrentMonthFirst))->getTimestamp();
        $timeCurrentMonthLast = (new DateTime($timeCurrentMonthLast))->getTimestamp();

        foreach($dsnhanvien as $key => $nhanvien){
            $totalthuongluong = 0;
            foreach($nhanvien->thuongluongs as $key => $thuongluongs){
                $time = date("Y-m-d", strtotime($thuongluongs->ngaythuong));
                $time = (new DateTime($time))->getTimestamp();
                if($time >= $timeCurrentMonthFirst && $time <= $timeCurrentMonthLast){
                    $totalthuongluong += $thuongluongs->sotienthuong;
                }
            }
            $nhanvien->totalthuongluong = $totalthuongluong;

            $totalphatluong = 0;
            foreach($nhanvien->phatluongs as $key => $phatluongs){
                $time = date("Y-m-d", strtotime($phatluongs->ngayphat));
                $time = (new DateTime($time))->getTimestamp();
                if($time >= $timeCurrentMonthFirst && $time <= $timeCurrentMonthLast){
                    $totalphatluong += $phatluongs->sotienphat *-1;
                }
                
            }
            $nhanvien->totalphatluong = $totalphatluong;

            $totaltamung = 0;
            foreach($nhanvien->tamungs as $key => $tamungs){
                $time = date("Y-m-d", strtotime($tamungs->ngaytamung));
                $time = (new DateTime($time))->getTimestamp();
                if($time >= $timeCurrentMonthFirst && $time <= $timeCurrentMonthLast){
                    $totaltamung += $tamungs->sotientamung *-1;
                }
            }
            $nhanvien->totaltamung = $totaltamung;

            $nhanvien->luongcanban = 3000000;
            $nhanvien->hsluong = 1.5;

            $nhanvien->totalluong = ($nhanvien->luongcanban * $nhanvien->hsluong) + $totalthuongluong + $totaltamung + $totalphatluong;
        }
        $this->_view->danhsachnhanvien = $dsnhanvien;
        if($checkReport == true){
            $tempDataReport = [];
            foreach($dsnhanvien as $key => $nhanvien){
                $datareport = array('id' => $nhanvien->_id,
                    'Họ tên' => $nhanvien->hoten,
                    'Tổng thưởng lương' => $nhanvien->totalthuongluong,
                    'Tổng phạt lương' => $nhanvien->totalphatluong*-1,
                    'Tổng tạm ứng' => $nhanvien->totaltamung*-1,
                    'Lương can bản' => $nhanvien->luongcanban,
                    'Hệ số lương' => $nhanvien->hsluong,
                    'Tổng lương' => $nhanvien->totalluong,
                );
                array_push($tempDataReport,$datareport);
            }
            $output = fopen("php://output",'w') or die("Can't open php://output");
            header('Content-Encoding: UTF-8');
            header("Content-Type:application/csv;charset=UTF-8"); 
            header("Content-Disposition:attachment;filename=\"quanlynhansu.csv\""); 
            fputcsv($output, array_keys($tempDataReport[0]));
            foreach($tempDataReport as $product) {
                fputcsv($output, array_values($product));
            }
            fclose($output) or die("Can't close php://output");
        }else{
            $this->_view->render('quanlyluong/bangluong/index');
        }
    }
    // KẾT THÚC PHẦN PHẠT LƯƠNG

    // PHẦN CHẤM CÔNG
    function chamcongAction(){
        $url = "http://localhost:3000/api/laytatcanhanvien";
        $this->_view->danhsachnhanvien = $this->_model->danhsachnhanvien($url); 
        print_r($_POST);
       
        if($_POST){
            
            $data['idnhanvien'] = explode(';', $_POST['data'])[0];
            $data['time'] = explode(';', $_POST['data'])[1];
            $result = curl::POST('http://localhost:3000/api/chamcong/thuchienchamcong', $data);
            if($result){
                url::redirect(url::createLink('admin', 'quanlyluong', 'chamcong'));
            }else{
                url::redirect(url::createLink('admin', 'error', 'error'));
            }
        }else{
            $this->_view->render('quanlyluong/chamcong/index');
        }
    }
}
?>