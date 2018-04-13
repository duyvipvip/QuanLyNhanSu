<?php 
    // ============== PHẦN XỬ LÝ CÁC NGÀY TRONG THÁNG ========================
    $currentMonth = date('m', strtotime('0 month'));
    $currentYear = date('Y');

    // lấy ngày bắt đầu và kết thúc của tháng
    $timeCurrentMonthFirst = date("Y-m-d", mktime(0, 0, 0, $currentMonth ,1 ,$currentYear));
    $timeCurrentMonthLast = date("Y-m-d", mktime(0, 0, 0, $currentMonth+1,0,$currentYear));

    // chuyển ngày bắt đầu với kết thúc thành timesamp
    $timeCurrentMonthFirst = (new DateTime($timeCurrentMonthFirst))->getTimestamp();
    $timeCurrentMonthLast = (new DateTime($timeCurrentMonthLast))->getTimestamp();

    // tạo html hiện thị các ngày trong 1 tháng
    $xhtmlHearderDay = '';
    $tempTimeSamp = $timeCurrentMonthFirst;
    $arrayTimeSamp = [];
    for($i=1; $i <= 40; $i++){
        // thêm timesamp vào array
        array_push($arrayTimeSamp, $tempTimeSamp);
        $dayHeader = date('d/m', $tempTimeSamp);
        if($tempTimeSamp == $timeCurrentMonthLast){
            $xhtmlHearderDay .= "<p style='width: 2.85%'>$dayHeader</p>";
            break;
        }else{
            $xhtmlHearderDay .= "<p style='width: 2.85%'>$dayHeader</p>";
            $tempTimeSamp += 86400;
        }
    }
    // =================== PHẦN XỬ LÝ HIỂN THỊ DANH SÁCH NHÂN VIÊN =========

    $xhtmlDanhSachNhanVien = '';
    $danhSachNhanVien = $this->danhsachnhanvien;
    
    if($danhSachNhanVien){
        foreach ($danhSachNhanVien as $key => $nhanvien) {
            // tạo html checkbox
            $htmlCheck = '';
            foreach ($arrayTimeSamp as $key => $timesamp) {
                $htmlCheck .= checkBox($nhanvien->_id, $timesamp, $danhSachNhanVien);
            }
            $xhtmlDanhSachNhanVien .= " <div class='row'>
                <p style='width: 15%'>$nhanvien->hoten</p>
                $htmlCheck
            </div>";
        }
    }

    // tạo check box
    function checkBox($idnhanvien, $timesamp, $danhSachNhanVien){
        foreach ($danhSachNhanVien as $key => $nhanvien) {
            if($nhanvien->chamcongs != null){
                foreach ($nhanvien->chamcongs as $key => $chamcong) {
                    if($chamcong->time == $timesamp && $nhanvien->_id == $idnhanvien){
                        return "<p style='width: 2.85%'>
                            <input type='checkbox' checked name='data' value='$idnhanvien;$timesamp'>
                        </p>";
                    }
                }
            }
        }
        return "<p style='width: 2.85%'>
                    <input type='checkbox' name='data' value='$idnhanvien;$timesamp'>
                </p>";
    }
?>

<div class="panel panel-widget">
    <h3>Bảng Chấm Công</h3>
    <div style="width: 2000px;">
        <div class="list">
            <div class="row head" >
                <p style='width: 15%'>Họ tên</p>
                <?php echo $xhtmlHearderDay ?>
            </div>
            <form id="formcheckbox" action="index.php?module=admin&controller=quanlyluong&action=chamcong" method="POST">
                <?php echo $xhtmlDanhSachNhanVien;?>
            </form>
        </div>
    </div>
</div>
<a href="<?php echo url::createLink('admin', 'quanlyluong', 'themphatluong') ?>" class="btn btn-primary">Thêm nhân viên bị phạt lương</a>    

