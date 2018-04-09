<?php
    $danhsachhedaotao = $this->danhsachhedaotao;
    
    // TẠO HTML DANH SACH NHAN VIÊN
    $xhtmldanhsachhedaotao = '';
    foreach ($danhsachhedaotao as $key => $value) {
        $class = ($key % 2 == 0) ? '' : 'active';
        $urlEdit = url::createLink('admin', 'quanlydulieu', 'chinhsuahedaotao', array('idhedaotao' => $value->_id));
        $urlTrash = url::createLink('admin', 'quanlydulieu', 'xoahedaotao', array('idhedaotao' => $value->_id));

        $key += 1;
        $xhtmldanhsachhedaotao .= " <div class='row $class'>
            <p style='width: 10%'>$key</p>
            <p style='width: 30%'>$value->_id</p>
            <p style='width: 40%'>$value->tenhedaotao</p>
            <p>
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
            <p style="width: 10%">STT</p>
            <p style='width: 30%'>ID Hệ Đào Tạo</p>
            <p style='width: 40%'>Tên Hệ Đào Tạo</p>
            <p>Chức năng</p>
        </div>
        <?php echo $xhtmldanhsachhedaotao;?>
    </div>
    <a href="<?php echo url::createLink('admin', 'quanlydulieu', 'themhedaotao') ?>" class="btn btn-primary">Thêm hệ đào tạo</a>
</div>
