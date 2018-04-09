
<?php
    $this->phatluong = $this->phatluong[0];
    $this->nhanvien->ngaysinh = date("Y-m-d", strtotime($this->nhanvien->ngaysinh));
    $this->phatluong->ngayphat = date("Y-m-d", strtotime($this->phatluong->ngayphat));
?>
<div class="panel panel-widget">
    <h3>Chỉnh sửa phạt lương</h3>
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlyluong', 'chinhsuaphatluong'); ?>" method="post" data-toggle="validator" novalidate="true" enctype="multipart/form-data">
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
                        <input type="hidden" name="idphatluong" value='<?php echo $this->phatluong->_id;?>' class="form-control"  placeholder="Mã nhân viên" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Ngày phạt: </label>
                        <input value='<?php echo $this->phatluong->ngayphat;?>' name="ngayphat" type="Date" class="form-control"  placeholder="Ngày thưởng" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Mức phạt: </label>
                        <input value='<?php echo $this->phatluong->sotienphat;?>' name="sotienphat" type="number" class="form-control"  placeholder="Mức thưởng" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung phạt: </label>
                        <textarea name="lydophat" required="" class="form-control at-required" placeholder="Nội dung thưởng"><?php echo $this->phatluong->lydophat; ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary disabled">Chỉnh sửa dữ liệu</button>
                </div>
            </form>
        </div>
    </div>
</div>
