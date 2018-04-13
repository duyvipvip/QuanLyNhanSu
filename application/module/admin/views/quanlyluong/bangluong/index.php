<?php
    $danhSachNhanVien = $this->danhsachnhanvien;
    if($danhSachNhanVien){
        // TẠO HTML DANH SACH NHAN VIÊN
        $xhtmlDanhSachNhanVien = '';
        foreach ($danhSachNhanVien as $key => $nhanvien) {
            $class = ($key % 2 == 0) ? '' : 'active';
            
            $nhanvien->totalthuongluong = number_format($nhanvien->totalthuongluong);
            $nhanvien->totaltamung = number_format($nhanvien->totaltamung)*-1;
            $nhanvien->totalphatluong = number_format($nhanvien->totalphatluong)*-1;
            $nhanvien->totalluong = number_format($nhanvien->totalluong);
            
            $xhtmlDanhSachNhanVien .= " <div class='row'>
                <p style='width: 20%'>$nhanvien->_id</p>
                <p style='width: 20%'>$nhanvien->hoten</p>
                <p style='width: 10%'>$nhanvien->totalthuongluong</p>
                <p style='width: 10%'>$nhanvien->totaltamung</p>
                <p style='width: 10%'>$nhanvien->totalphatluong</p>
                <p>$nhanvien->totalluong</p>
            </div>";
        }
    }
    
?>
<?
?>
<form style="margin-bottom: 20px;" action="index.php?module=admin&controller=quanlyluong&action=bangluong" method="POST">
    <input type="hidden" name="module" value="admin">
    <input type="hidden" name="controller" value="quanlyluong">
    <input type="hidden" name="action" value="bangluong">
    <label for="">Tháng: </label>
    <select name="thang" required="true" class="at-required">
        <?php
            $currentMonth = empty($_GET['thang']) ? date('m', strtotime('0 month')) : $_GET['thang'];
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
            $currentYear = empty($_GET['nam']) ? date('Y'): $_GET['nam'];
            for($i = 2018;$i >= 1995 ; $i--){
                if($i == $currentYear){
                    echo "<option selected=selected value=$i>$i</option>";
                }else{
                    echo "<option value=$i>$i</option>";
                }
            }
        ?>
    </select>
    <input class="btn btn-success" type="submit" value="Lọc dữ liệu"/>
</form>
<div class="panel panel-widget">
    <h3>Quản lý phạt lương</h3>
    <div style="width: 1000px; height: 300px;">
        <div class="list">
            <div class="row head" >
                <p style="width: 20%">Mã nhân viên</p>
                <p style='width: 20%'>Họ tên</p>
                <p style='width: 10%'>Tổng thưởng</p>
                <p style='width: 10%'>Tổng tạm ứng</p>
                <p style='width: 10%'>Tiền phạt</p>
                <p>Tổng lương</p>
            </div>
            <?php echo $xhtmlDanhSachNhanVien;?>
        </div>
    </div>
</div>
<a href="<?php echo url::createLink('admin', 'quanlyluong', 'themphatluong') ?>" class="btn btn-primary">Thêm nhân viên bị phạt lương</a>    
<a href="<?php echo url::createLink('admin', 'quanlyluong', 'bangluong', array('checkreport' => 'true')) ?>" class="btn btn-success">Xuất báo cáo</a>    

