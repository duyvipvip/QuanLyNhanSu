<?php
    $danhSachNhanVien = $this->danhsachnhanvien;
    
    // TẠO HTML DANH SACH NHAN VIÊN
    $xhtmlDanhSachNhanVien = '';
    foreach ($danhSachNhanVien as $key => $value) {

        $class = ($key % 2 == 0) ? '' : 'active';
        $center = "style='text-align: center'";
        $gioitinh = ($value->gioitinh == 1) ? "<i class='fa fa-male'></i>" : "<i class='fa fa-female'></i>";
        
        $urlEdit = url::createLink('admin', 'quanlynhanvien', 'chinhsuanhanvien', array('idnhanvien' => $value->_id));
        $urlTrash = url::createLink('admin', 'quanlynhanvien', 'xoanhanvien', array('idnhanvien' => $value->_id));

        $key += 1;
        $xhtmlDanhSachNhanVien .= " <div class='row'>
            <p style='width: 5%'>$key</p>
            <p style='width: 20%'>$value->hoten</p>
            <p style='width: 20%'>$value->sodienthoai</p>
            <p style='width: 30%'>$value->email</p>
            <p style='width: 10%' $center>$gioitinh</p>
            <p >
                <a href=$urlEdit>
                    <i class='fa fa-edit'></i>
                </a>
                <a href=$urlTrash>
                    xoa
                </a>
            </p>
        </div>";

    }
    
?>

<div class="panel panel-widget">
    <div class="list">
        <div class="row head" >
            <p style="width: 5%">STT</p>
            <p style='width: 20%'>Họ tên</p>
            <p style='width: 20%'>Số  Điện Thoại</p>
            <p style='width: 30%'>Email</p>
            <p style='width: 10%'>Giới tính</p>
            <p>Chức năng</p>
        </div>
        <?php echo $xhtmlDanhSachNhanVien;?>
    </div>
    <a href="<?php echo url::createLink('admin', 'quanlynhanvien', 'themnhanvien') ?>" class="btn btn-primary">Thêm nhân viên</a>
</div>
