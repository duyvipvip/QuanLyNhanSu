<?php
    $xhtml = '';
    foreach($this->danhsachnhanvien as $key => $value){
        $xhtml .= " <option value='$value->_id'>$value->hoten</option>";
    }
?>
<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>Thưởng nhân viên </h3>
        </div>
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlyluong', 'themthuongluong')?>" method="post" data-toggle="validator" novalidate="true">
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
                        <label for="">Tháng thưởng: </label>
                        <input name="thangthuong" type="number" class="form-control"  placeholder="Tháng thưởng" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày thưởng: </label>
                        <input name="ngaythuong" type="Date" class="form-control"  placeholder="Ngày thưởng" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Mức thưởng: </label>
                        <input name="sotienthuong" type="number" class="form-control"  placeholder="Mức thưởng" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung thưởng: </label>
                        <textarea name="lydothuong"  required="" placeholder="Nội dung thưởng" class="form-control at-required"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary disabled">Thêm nhân viên được thưởng</button>
                </div>
            </form>
        </div>
    </div>
</div>
