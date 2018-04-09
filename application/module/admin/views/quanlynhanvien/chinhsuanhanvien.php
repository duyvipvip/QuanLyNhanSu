<?php
    // lấy danh sách chức vụ
    $xhtmlChucVu = '';
    foreach($this->danhsachchucvu as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tenchucvu;
        if($this->nhanvien->chucvu == $id){
            $xhtmlChucVu .= "<option selected='selected' value=$id>$chucvu</option>";
        }else{
            $xhtmlChucVu .= "<option value=$id>$chucvu</option>";
        }
    }

    // lấy tất cả ngoại ngữ
    $xhtmlNgoaiNgu = '';
    foreach($this->danhsachngoaingu as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tenngoaingu;
        if($this->nhanvien->ngoaingu == $id){
            $xhtmlNgoaiNgu .= "<option selected='selected' value=$id>$chucvu</option>";
        }else{
            $xhtmlNgoaiNgu .= "<option value=$id>$chucvu</option>";
        }
    }

    // lấy tất cả tỉnh thành
    $xhtmlTinhThanh = '';
    foreach($this->danhsachtinhthanh as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tentinhthanh;
        if($this->nhanvien->tinhthanh == $id){
            $xhtmlTinhThanh .= "<option selected='selected' value=$id>$chucvu</option>";
        }else{
            $xhtmlTinhThanh .= "<option value=$id>$chucvu</option>";
        }
    }

    // lấy tất cả hệ đào tạo
    $xhtmlHeDaoTao = '';
    foreach($this->danhsachhedaotao as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tenhedaotao;
        if($this->nhanvien->hedaotao == $id){
            $xhtmlHeDaoTao .= "<option selected='selected' value=$id>$chucvu</option>";
        }else{
            $xhtmlHeDaoTao .= "<option value=$id>$chucvu</option>";
        }
    }

    // lấy tất cả dân tộc
    $xhtmlDanToc = '';
    foreach($this->danhsachdantoc as $key => $value){
        $id = $value->_id;
        $chucvu = $value->tendantoc;
        if($this->nhanvien->dantoc == $id){
            $xhtmlDanToc .= "<option selected='selected' value=$id>$chucvu</option>";
        }else{
            $xhtmlDanToc .= "<option value=$id>$chucvu</option>";
        }
    }

    $this->nhanvien->ngaysinh = date("Y-m-d", strtotime($this->nhanvien->ngaysinh));
?>
<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>CHỈNH SỬA NHÂN VIÊN </h3>
        </div>
        <div class="form-body form-body-info">
            <form enctype="multipart/form-data" action="<?php echo url::createLink('admin', 'quanlynhanvien', 'chinhsuanhanvien');?>" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Mã nhân viên: </label>
                        <input value='<?php echo $this->nhanvien->_id;?>' name="_id" type="input" readonly="readonly" class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label for="">Họ Tên: </label>
                        <input value='<?php echo $this->nhanvien->hoten ?>' name="hoten" type="text" class="form-control"  placeholder="họ tên" required="">
                    </div>
                    <div class="form-group has-feedback">
                        <label for="">Email: </label>
                        <input name="email" value='<?php echo $this->nhanvien->email; ?>' type="email" class="form-control" placeholder="Email" data-error="Không phải email" required="">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <span class="help-block with-errors">Please enter a valid email address</span>
                    </div>
                    <div class="form-group">
                        <label for="">Ch``ứng minh ND: </label>
                        <input value='<?php echo $this->nhanvien->cmnd; ?>' name="cmnd" type="input" data-toggle="validator" data-minlength="9" class="form-control"  placeholder="Chứng minh nhân dân" required="">
                        <span class="help-block">Minimum of 9 characters</span>
                    </div>
                    <div class="form-group">
                        <label for="">Ngày Sinh: </label>
                        <input value='<?php echo $this->nhanvien->ngaysinh;?>' name="ngaysinh" type="date" class="form-control"  required="">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ: </label>
                        <input value="<?php echo $this->nhanvien->diachi; ?>" name="diachi" type="input" class="form-control"  placeholder="địa chỉ" required="">
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Số điện thoại: </label>
                        <input value='<?php echo $this->nhanvien->sodienthoai;?>' name="sodienthoai" type="input" class="form-control"  placeholder="số điện thoại" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Gia đình: </label>
                        <select name="giadinh" id="giadinh" required="true" class="form-control at-required">
                            <option <?php if($this->nhanvien->giadinh == "1") echo 'selected="selected"'; ?> value="1">Gia đình</option>
                            <option <?php if($this->nhanvien->giadinh == "0") echo 'selected="selected"'; ?> value="0">Chưa có gia đình</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giới tính: </label>
                        <select name="gioitinh" required="true" class="form-control at-required">
                            <option <?php if($this->nhanvien->gioitinh == "1") echo 'selected="selected"'; ?> value="1">Nam</option>
                            <option <?php if($this->nhanvien->gioitinh == "0") echo 'selected="selected"'; ?> value="0">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tình trạng: </label>
                        <select name="tinhtrang" id="tinhtrang" required="true" class="form-control at-required">
                            <option <?php if($this->nhanvien->tinhtrang == "1") echo 'selected="selected"'; ?> value="1">Nghỉ việc</option>
                            <option <?php if($this->nhanvien->tinhtrang == "0") echo 'selected="selected"'; ?> value="0">Làm việc</option>
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
                        <label for="">Hình ảnh: </label>
                        <input name="hinhanh" type="file">
                        <img class="imageedit"width="100px" height="100px" src="<?php echo $this->_folderImage . $this->nhanvien->hinhanh;?>" alt="">
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary disabled">Chỉnh sửa dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</div>
