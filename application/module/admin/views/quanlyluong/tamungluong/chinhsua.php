
<?php
    $this->tamung = $this->tamung[0];
    
    $this->nhanvien->ngaysinh = date("Y-m-d", strtotime($this->nhanvien->ngaysinh));
    $this->tamung->ngaytamung = date("Y-m-d", strtotime($this->tamung->ngaytamung));
?>
<div class="panel panel-widget">
    <h3>Chỉnh sửa tạm ứng lương</h3>

    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlyluong', 'chinhsuatamung'); ?>" method="post" data-toggle="validator" novalidate="true" enctype="multipart/form-data">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label for="">Mã nhân viên: </label>
                        <input readonly="readonly" name="idnhanvien" value='<?php echo $this->nhanvien->_id;?>' type="text" class="form-control"  placeholder="Mã nhân viên" required="">
                    </div>
                    <div class="form-group valid-form">
                        <label for="">Họ tên: </label>
                        <input disabled name="hoten" value='<?php echo $this->nhanvien->hoten;?>' type="text" class="form-control"  placeholder="Họ tên" required="">
                    </div>
                    <div class="form-group valid-form">
                        <label for="">Ngày sinh: </label>
                        <input value='<?php echo $this->nhanvien->ngaysinh;?>' disabled name="ngaysinh" type="Date" class="form-control"  required="">
                    </div>
                    <div class="form-group">
                        <label for="">Giới tính: </label>
                        <select disabled name="giadinh" id="giadinh" required="true" class="form-control at-required">
                            <option <?php if($this->nhanvien->gioitinh == "1") echo 'selected="selected"'; ?>  value="1">Nam</option>
                            <option <?php if($this->nhanvien->gioitinh == "1") echo 'selected="selected"'; ?>  value="0">Nữ</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Chức vụ: </label>
                        <select disabled name="chucvu" required="true" class="form-control at-required">
                            <option value="nhanvien">Nhân viên</option>
                            <option value="quanly">Quản lý</option>
                        </select>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <input type="hidden" name="idtamung" value='<?php echo $this->tamung->_id;?>' class="form-control"  placeholder="Mã nhân viên" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày tạm ứng: </label>
                        <input value='<?php echo $this->tamung->ngaytamung;?>' name="ngaytamung" type="Date" class="form-control"  placeholder="Ngày tạm ứng" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Mức tạm ứng: </label>
                        <input value='<?php echo $this->tamung->sotientamung;?>' name="sotientamung" type="number" class="form-control"  placeholder="Mức tạm ứng" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung tạm ứng: </label>
                        <textarea name="lydotamung" required="" class="form-control at-required" placeholder="Nội dung tạm ứng"><?php echo $this->tamung->lydotamung; ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary disabled">Chỉnh sửa dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</div>
