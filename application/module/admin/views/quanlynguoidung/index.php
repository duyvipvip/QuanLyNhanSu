<?php
    $danhSachNguoiDung = $this->danhSachNguoiDung;
    
    // TẠO HTML DANH SACH NHAN VIÊN
    $xhtmlDanhSachNguoiDung = '';
    foreach ($danhSachNguoiDung as $key => $value) {

        $urlEdit = url::createLink('admin', 'nguoidung', 'chinhsuanguoidung', array('idnguoidung' => $value->_id));
        $urlTrash = url::createLink('admin', 'nguoidung', 'xoanguoidung', array('idnguoidung' => $value->_id));

        $xhtmlDanhSachNguoiDung .= " <tr>
            <th>$key</th>
            <td>$value->_id</td>
            <td>$value->tendangnhap</td>
            <td>
                <a href=$urlEdit>
                    <i class='fa fa-edit'></i>
                </a>
                <a href=$urlTrash>
                    <i class='fa fa-trash'></i>
                </a>
            </td>
        </tr>";

    }
    
?>

<div class="panel panel-widget">
    <div class="tables">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã Người Dùng</th>
                    <th>Tên Người Dùng</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $xhtmlDanhSachNguoiDung; ?>
            </tbody>
        </table>
    </div>
</div>