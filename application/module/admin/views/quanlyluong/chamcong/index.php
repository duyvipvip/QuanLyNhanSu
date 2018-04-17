<?php 
    // ============== PHẦN XỬ LÝ CÁC NGÀY TRONG THÁNG ========================
    $currentMonth = empty($_GET['thang']) ? date('m', strtotime('0 month')) : $_GET['thang'];
    $currentYear = empty($_GET['nam']) ? date('Y'): $_GET['nam'];

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
            $xhtmlHearderDay .= "<p style='width: 2.5%'>$dayHeader</p>";
            $xhtmlHearderDay .= "<p>Tổng ngày làm</p>";
            break;
        }else{
            $xhtmlHearderDay .= "<p style='width: 2.5%'>$dayHeader</p>";
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
            // tính tổng ngày làm
            $totalChamCong = 0;
            if($nhanvien->chamcongs){
                foreach ($nhanvien->chamcongs as $key => $chamcong) {
                    if(date('m',$chamcong->time) == $currentMonth && date('Y',$chamcong->time) == $currentYear){
                        $totalChamCong++;
                    }
                }
            }
            $xhtmlDanhSachNhanVien .= " <div class='row'>
                <p style='width: 10%'>$nhanvien->hoten</p>
                $htmlCheck
                <p>
                    <span>$totalChamCong</span>
                </p>
            </div>";
        }
    }

    // tạo check box
    function checkBox($idnhanvien, $timesamp, $danhSachNhanVien){
        foreach ($danhSachNhanVien as $key => $nhanvien) {
            if($nhanvien->chamcongs != null){
                foreach ($nhanvien->chamcongs as $key => $chamcong) {
                    if($chamcong->time == $timesamp && $nhanvien->_id == $idnhanvien){
                        return "<p style='width: 2.5%'>
                            <input type='checkbox' checked name='data' value='$idnhanvien;$timesamp'>
                        </p>";
                    }
                }
            }
        }
        return "<p style='width: 2.5%'>
                    <input type='checkbox' name='data' value='$idnhanvien;$timesamp'>
                </p>";
    }
?>
<div class="form">
    <h3>Bảng Chấm Công</h3>
    <form id="formchamcong" style="margin-bottom: 20px;" action="index.php" method="GET">
        <input type="hidden" name="module" value="admin">
        <input type="hidden" name="controller" value="quanlyluong">
        <input type="hidden" name="action" value="chamcong">
        <label for="">Tháng: </label>
        <select name="thang" required="true" class="at-required">
            <?php
                for($i = 1; $i <= 12; $i++){
                    if($i == $currentMonth){
                        echo "<option selected=selected value=$i>$i</option>";
                    }else{
                        echo "<option value=$i>$i</option>";
                    }
                }
            ?>
        </select>
        <label for="">Năm: </label>
        <select name="nam" required="true" class="at-required">
            <?php
                for($i = 2018;$i >= 1995 ; $i--){
                    if($i == $currentYear){
                        echo "<option selected=selected value=$i>$i</option>";
                    }else{
                        echo "<option value=$i>$i</option>";
                    }
                }
            ?>
        </select>
    </form>
    <div class="clr"></div>
</div>

<div class="panel panel-widget">
    <div style="width: 2000px; height: 300px;">
        <div class="list">
            <div class="row head" >
                <p style='width: 10%'>Họ tên</p>
                <?php echo $xhtmlHearderDay ?>
            </div>
            <form id="formcheckbox" action="index.php?module=admin&controller=quanlyluong&action=chamcong" method="POST">
                <?php echo $xhtmlDanhSachNhanVien;?>
                
            </form>
        </div>
    </div>
</div>
<a href="<?php echo url::createLink('admin', 'quanlyluong', 'themphatluong') ?>" class="btn btn-primary">Thêm nhân viên bị phạt lương</a>    

