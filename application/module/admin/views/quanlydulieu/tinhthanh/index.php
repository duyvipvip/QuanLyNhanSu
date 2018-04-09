<?php
    $danhsachtinhthanh = $this->danhsachtinhthanh;
    
    // TẠO HTML DANH SACH NHAN VIÊN
    $xhtmldanhsachtinhthanh = '';
    foreach ($danhsachtinhthanh as $key => $value) {
        $class = ($key % 2 == 0) ? '' : 'active';
        $urlEdit = url::createLink('admin', 'quanlydulieu', 'chinhsuatinhthanh', array('idtinhthanh' => $value->_id));
        $urlTrash = url::createLink('admin', 'quanlydulieu', 'xoatinhthanh', array('idtinhthanh' => $value->_id));

        $key += 1;
        $xhtmldanhsachtinhthanh .= " <div class='row $class'>
            <p style='width: 10%'>$key</p>
            <p style='width: 30%'>$value->_id</p>
            <p style='width: 40%'>$value->tentinhthanh</p>
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
    
?>

<div class="panel panel-widget">
    <div class="list">
        <div class="row head" >
            <p style="width: 10%">STT</p>
            <p style='width: 30%'>ID Tỉnh thành</p>
            <p style='width: 40%'>Tên tỉnh thành</p>
            <p>Chức năng</p>
        </div>
        <?php echo $xhtmldanhsachtinhthanh;?>
    </div>
    <a href="<?php echo url::createLink('admin', 'quanlydulieu', 'themtinhthanh') ?>" class="btn btn-primary">Thêm tỉnh thành</a>
</div>
