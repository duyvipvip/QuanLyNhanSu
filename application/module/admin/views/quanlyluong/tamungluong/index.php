<?php
    $danhSachNhanVien = $this->danhsachnhanvien;
    if($danhSachNhanVien){
        // TẠO HTML DANH SACH NHAN VIÊN
        $xhtmlDanhSachNhanVien = '';
        foreach ($danhSachNhanVien as $key => $nhanvien) {
            if($nhanvien->tamungs != null){
                foreach ($nhanvien->tamungs as $key => $tamung) {
                    $class = ($key % 2 == 0) ? '' : 'active';

                    $tamung->ngaytamung = date("d-m-Y", strtotime($tamung->ngaytamung));
                    $nhanvien->ngaysinh = date("d-m-Y", strtotime($nhanvien->ngaysinh));

                    $urlEdit = url::createLink('admin', 'quanlyluong', 'chinhsuatamung',
                                                array('idnhanvien' => $nhanvien->_id, 'idtamung'=> $tamung->_id));
                    $urlTrash = url::createLink('admin', 'quanlyluong', 'xoatamung', 
                                                array('idnhanvien' => $nhanvien->_id, 'idtamung' => $tamung->_id));

                    $xhtmlDanhSachNhanVien .= " <div class='row'>
                        <p style='width: 20%'>$nhanvien->_id</p>
                        <p style='width: 20%'>$nhanvien->hoten</p>
                        <p style='width: 10%'>$nhanvien->ngaysinh</p>
                        <p style='width: 10%'>$tamung->ngaytamung</p>
                        <p style='width: 10%'>$tamung->sotientamung</p>
                        <p style='width: 10%'>$tamung->lydotamung</p>
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
    <h3>Bảng Tạm Ứng Lương</h3>
</div>
<div class="panel panel-widget">
    <div style="width: 1000px;">
        <div class="list">
            <div class="row head" >
                <p style="width: 20%">Mã nhân viên</p>
                <p style='width: 20%'>Họ tên</p>
                <p style='width: 10%'>Ngày sinh</p>
                <p style='width: 10%'>Ngày tạm ứng</p>
                <p style='width: 10%'>Tiền tạm ứng</p>
                <p style='width: 10%'>Nội dung</p>
                <p>Chức năng</p>
            </div>
            <?php echo $xhtmlDanhSachNhanVien;?>
        </div>
    </div>
</div>
<a href="<?php echo url::createLink('admin', 'quanlyluong', 'themtamung') ?>" class="btn btn-primary">Thêm nhân viên tạm ứng</a>    

