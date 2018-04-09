<?php
    $danhsachchucvu = $this->danhsachchucvu;
    
    // TẠO HTML DANH SACH NHAN VIÊN
    $xhtmldanhsachchucvu = '';
    foreach ($danhsachchucvu as $key => $value) {
        $class = ($key % 2 == 0) ? '' : 'active';
        $urlEdit = url::createLink('admin', 'quanlydulieu', 'chinhsuachucvu', array('idchucvu' => $value->_id));
        $urlTrash = url::createLink('admin', 'quanlydulieu', 'xoachucvu', array('idchucvu' => $value->_id));

        $key += 1;
        $xhtmldanhsachchucvu .= " <div class='row $class'>
            <p style='width: 10%'>$key</p>
            <p style='width: 30%'>$value->_id</p>
            <p style='width: 40%'>$value->tenchucvu</p>
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
            <p style='width: 30%'>ID Chức Vụ</p>
            <p style='width: 40%'>Tên Chức Vụ</p>
            <p>Chức năng</p>
        </div>
        <?php echo $xhtmldanhsachchucvu;?>
    </div>
    <a href="<?php echo url::createLink('admin', 'quanlydulieu', 'themchucvu') ?>" class="btn btn-primary">Thêm dân tộc</a>
</div>
