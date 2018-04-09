<?php
    $danhsachdantoc = $this->danhsachdantoc;
    
    // TẠO HTML DANH SACH NHAN VIÊN
    $xhtmldanhsachdantoc = '';
    foreach ($danhsachdantoc as $key => $value) {
        $class = ($key % 2 == 0) ? '' : 'active';
        $urlEdit = url::createLink('admin', 'quanlydulieu', 'chinhsuadantoc', array('iddantoc' => $value->_id));
        $urlTrash = url::createLink('admin', 'quanlydulieu', 'xoadantoc', array('iddantoc' => $value->_id));

        $key += 1;
        $xhtmldanhsachdantoc .= " <div class='row $class'>
            <p style='width: 10%'>$key</p>
            <p style='width: 30%'>$value->_id</p>
            <p style='width: 40%'>$value->tendantoc</p>
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
            <p style='width: 30%'>ID Dân Dân</p>
            <p style='width: 40%'>Tên Dân Dân</p>
            <p>Chức năng</p>
        </div>
        <?php echo $xhtmldanhsachdantoc;?>
    </div>
    <a href="<?php echo url::createLink('admin', 'quanlydulieu', 'themdantoc') ?>" class="btn btn-primary">Thêm dân tộc</a>
</div>
