<?php 
    // lấy danh sách chức vụ
    $xhtmlChucVu = '';
    foreach($this->danhsachchucvu as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tenchucvu;
        $xhtmlChucVu .= "<option value=$id>$chucvu</option>";
    }

    // lấy tất cả ngoại ngữ
    $xhtmlNgoaiNgu = '';
    foreach($this->danhsachngoaingu as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tenngoaingu;
        $xhtmlNgoaiNgu .= "<option value=$id>$chucvu</option>";
    }

    // lấy tất cả tỉnh thành
    $xhtmlTinhThanh = '';
    foreach($this->danhsachtinhthanh as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tentinhthanh;
        $xhtmlTinhThanh .= "<option value=$id>$chucvu</option>";
    }

    // lấy tất cả hệ đào tạo
    $xhtmlHeDaoTao = '';
    foreach($this->danhsachhedaotao as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tenhedaotao;
        $xhtmlHeDaoTao .= "<option value=$id>$chucvu</option>";
    }

    // lấy tất cả dân tộc
    $xhtmlDanToc = '';
    foreach($this->danhsachdantoc as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tendantoc;
        $xhtmlDanToc .= "<option value=$id>$chucvu</option>";
    }
?>
<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>THÊM NHÂN VIÊN </h3>
        </div>
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlynhanvien', 'themnhanvien'); ?>" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Họ Tên: </label>
                        <input name="hoten" type="text" class="form-control"  placeholder="họ tên" required="">
                    </div>
                    <div class="form-group has-feedback">
                        <label>Email: </label>
                        <input name="email" type="email" class="form-control" placeholder="Email" data-error="Không phải email" required="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors">Please enter a valid email address</span>
                    </div>
                    <div class="form-group">
                        <label>Chứng minh ND: </label>
                        <input name="cmnd" type="input" data-toggle="validator" data-minlength="9" class="form-control"  placeholder="Chứng minh nhân dân" required="">
                        <span class="help-block">Minimum of 9 characters</span>
                    </div>
                    <div class="form-group">
                        <label>Ngày Sinh: </label>
                        <input name="ngaysinh" type="Date" class="form-control"  placeholder="ngày sinh" required="">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ: </label>
                        <input name="diachi" type="input" class="form-control"  placeholder="địa chỉ" required="">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Số điện thoại: </label>
                        <input name="sodienthoai" type="input" class="form-control"  placeholder="số điện thoại" required="">
                    </div>
                    <div class="form-group">
                        <label>Gia đình: </label>
                        <select name="giadinh" id="giadinh" required="true" class="form-control at-required">
                            <option value="1">Gia đình</option>
                            <option value="0">Chưa có gia đình</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giới tính: </label>
                        <select name="gioitinh" required="true" class="form-control at-required">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tình trạng: </label>
                        <select name="tinhtrang" id="tinhtrang" required="true" class="form-control at-required">
                            <option value="1">Nghỉ việc</option>
                            <option value="0">Làm việc</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Chức vụ: </label>
                        <select name="chucvu" required="true" class="form-control at-required">
                            <?php echo $xhtmlChucVu; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ngoại ngữ: </label>
                        <select name="ngoaingu" required="true" class="form-control at-required">
                            <?php echo $xhtmlNgoaiNgu; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tỉnh thành: </label>
                        <select name="tinhthanh" required="true" class="form-control at-required">
                            <?php echo $xhtmlTinhThanh; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Hệ đào tạo: </label>
                        <select name="hedaotao" required="true" class="form-control at-required">
                            <?php echo $xhtmlHeDaoTao; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Dân tộc: </label>
                        <select name="dantoc" required="true" class="form-control at-required">
                            <?php echo $xhtmlDanToc; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh: </label>
                        <input name="hinhanh" type="file">
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary disabled">Thêm nhân viên</button>
                </div>
            </form>
        </div>
    </div>
</div>