
<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>CHỈNH SỬA NGƯỜI DÙNG </h3>
        </div>
        <div class="form-body form-body-info">
            <form action="index.php?module=admin&controller=nhanvien&action=xoanhanvien" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label for="">Tên Tài Khoản: </label>
                        <input name="tentaikhoan" type="text" class="form-control"  placeholder="Tên tài khoản" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Quyền sửa: </label>
                        <select name="quyensua" required="true" class="form-control at-required">
                            <option value="yes">Có</option>
                            <option value="no">Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Quyền xoá: </label>
                        <select name="quyenxoa" required="true" class="form-control at-required">
                            <option value="yes">Có</option>
                            <option value="no">Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Quyền thêm: </label>
                        <select name="quyenthem" required="true" class="form-control at-required">
                            <option value="yes">Có</option>
                            <option value="no">Không</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary disabled">Chỉnh sửa người dùng</button>
                    </div>
                </div>
                <div style="clear: both;"></div>
            </form>
        </div>
    </div>
</div>
