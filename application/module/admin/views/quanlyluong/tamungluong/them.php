<?php
    $xhtml = '';
    foreach($this->danhsachnhanvien as $key => $value){
        $xhtml .= " <option value='$value->_id'>$value->hoten</option>";
    }
?>
<div class="panel panel-widget">
    <h3>Thêm thưởng lương</h3>
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlyluong', 'themtamung')?>" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label for="">Tên nhân viên: </label>
                        <select name="idnhanvien" id="idnhanvien" required="true" class="form-control at-required">
                            <?php echo $xhtml; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Ngày tạm ứng: </label>
                        <input name="ngaytamung" type="Date" class="form-control"  placeholder="Ngày tạm ứng" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Mức tạm ứng: </label>
                        <input name="sotientamung" type="number" class="form-control"  placeholder="Mức tạm ứng" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung tạm ứng: </label>
                        <textarea name="lydotamung"  required="" placeholder="Nội dung tạm ứng" class="form-control at-required"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary disabled">Thêm nhân viên được tạm ứng</button>
                </div>
            </form>
        </div>
    </div>
</div>
