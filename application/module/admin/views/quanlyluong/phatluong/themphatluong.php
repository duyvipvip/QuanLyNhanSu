<?php
    $xhtml = '';
    foreach($this->danhsachnhanvien as $key => $value){
        $xhtml .= " <option value='$value->_id'>$value->hoten</option>";
    }
?>
<div class="panel panel-widget">
    <h3>Thêm phạt lương</h3>
    
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlyluong', 'themphatluong')?>" method="post" data-toggle="validator" novalidate="true">
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
                        <label for="">Ngày phạt: </label>
                        <input name="ngayphat" type="Date" class="form-control"  placeholder="Ngày phạt" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Mức phạt: </label>
                        <input name="sotienphat" type="number" class="form-control"  placeholder="Mức phạt" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung phạt: </label>
                        <textarea name="lydophat"  required="" placeholder="Nội dung phạt" class="form-control at-required"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary disabled">Thêm nhân viên bị phạt</button>
                </div>
            </form>
        </div>
    </div>
</div>
