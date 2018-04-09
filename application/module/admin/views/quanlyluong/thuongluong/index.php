<?php
    $danhSachNhanVien = $this->danhsachnhanvien;
    if($danhSachNhanVien){
        // TẠO HTML DANH SACH NHAN VIÊN
        $xhtmlDanhSachNhanVien = '';
        foreach ($danhSachNhanVien as $key => $nhanvien) {
            if($nhanvien->thuongluongs != null){
                foreach ($nhanvien->thuongluongs as $key => $thuongluong) {
                    $class = ($key % 2 == 0) ? '' : 'active';

                    $thuongluong->ngaythuong = date("d-m-Y", strtotime($thuongluong->ngaythuong));
                    $nhanvien->ngaysinh = date("d-m-Y", strtotime($nhanvien->ngaysinh));

                    $urlEdit = url::createLink('admin', 'quanlyluong', 'chinhsuathuongluong',
                                                array('idnhanvien' => $nhanvien->_id, 'idthuongluong'=> $thuongluong->_id));
                    $urlTrash = url::createLink('admin', 'quanlyluong', 'xoathuongluong', 
                                                array('idnhanvien' => $nhanvien->_id, 'idthuongluong' => $thuongluong->_id));

                    $xhtmlDanhSachNhanVien .= " <div class='row'>
                        <p style='width: 20%'>$nhanvien->_id</p>
                        <p style='width: 10%'>$nhanvien->hoten</p>
                        <p style='width: 10%'>$nhanvien->ngaysinh</p>
                        <p style='width: 10%'>chức vụ</p>
                        <p style='width: 10%'>$thuongluong->thangthuong</p>
                        <p style='width: 10%'>$thuongluong->ngaythuong</p>
                        <p style='width: 10%'>$thuongluong->sotienthuong</p>
                        <p style='width: 10%'>$thuongluong->lydothuong</p>
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
  
<div class="panel panel-widget">
    <div style="width: 1000px;">
        <div class="list">
            <div class="row head" >
                <p style="width: 20%">Mã nhân viên</p>
                <p style='width: 10%'>Họ tên</p>
                <p style='width: 10%'>Ngày sinh</p>
                <p style='width: 10%'>Chức vụ</p>
                <p style='width: 10%'>Tháng thưởng</p>
                <p style='width: 10%'>Ngày thưởng</p>
                <p style='width: 10%'>Tiền thưởng</p>
                <p style='width: 10%'>Nội dung</p>
                <p>Chức năng</p>
            </div>
            <?php echo $xhtmlDanhSachNhanVien;?>
        </div>
    </div>
</div>
<a href="<?php echo url::createLink('admin', 'quanlyluong', 'themthuongluong') ?>" class="btn btn-primary">Thêm nhân viên được thưởng</a>    

