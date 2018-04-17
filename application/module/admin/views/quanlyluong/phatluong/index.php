<?php
    $danhSachNhanVien = $this->danhsachnhanvien;
    if($danhSachNhanVien){
        // TẠO HTML DANH SACH NHAN VIÊN
        $xhtmlDanhSachNhanVien = '';
        foreach ($danhSachNhanVien as $key => $nhanvien) {
            if($nhanvien->phatluongs != null){
                foreach ($nhanvien->phatluongs as $key => $phatluong) {
                    $class = ($key % 2 == 0) ? '' : 'active';
                    $phatluong->ngayphat = date("d-m-Y", strtotime($phatluong->ngayphat));
                    $nhanvien->ngaysinh = date("d-m-Y", strtotime($nhanvien->ngaysinh));

                    $urlEdit = url::createLink('admin', 'quanlyluong', 'chinhsuaphatluong',
                                                array('idnhanvien' => $nhanvien->_id, 'idphatluong'=> $phatluong->_id));
                    $urlTrash = url::createLink('admin', 'quanlyluong', 'xoaphatluong', 
                                                array('idnhanvien' => $nhanvien->_id, 'idphatluong' => $phatluong->_id));
                    
                    $phatluong->sotienphat = number_format($phatluong->sotienphat);
                    $xhtmlDanhSachNhanVien .= " <div class='row'>
                        <p style='width: 20%'>$nhanvien->_id</p>
                        <p style='width: 20%'>$nhanvien->hoten</p>
                        <p style='width: 10%'>$nhanvien->ngaysinh</p>
                        <p style='width: 10%'>$phatluong->ngayphat</p>
                        <p style='width: 10%'>$phatluong->sotienphat</p>
                        <p style='width: 10%'>$phatluong->lydophat</p>
                        <p>
                            <a href=$urlEdit>
                                <i class='fa fa-edit'></i>
                            </a>
                            <a href=$urlTrash>
                                <i class='fa fa-trash'></i>
                            </a>
                        </p>
                    </div>";
                }   
            }
        }
    }
    
?>
<div class="form">
    <h3>Bảng Phạt Lương</h3>
</div>
<div class="panel panel-widget">
    <div style="width: 1000px;">
        <div class="list">
            <div class="row head" >
                <p style="width: 20%">Mã nhân viên</p>
                <p style='width: 20%'>Họ tên</p>
                <p style='width: 10%'>Ngày sinh</p>
                <p style='width: 10%'>Ngày phạt</p>
                <p style='width: 10%'>Tiền phạt</p>
                <p style='width: 10%'>Nội dung</p>
                <p>Chức năng</p>
            </div>
            <?php echo $xhtmlDanhSachNhanVien;?>
        </div>
    </div>
</div>
<a href="<?php echo url::createLink('admin', 'quanlyluong', 'themphatluong') ?>" class="btn btn-primary">Thêm nhân viên bị phạt lương</a>    

