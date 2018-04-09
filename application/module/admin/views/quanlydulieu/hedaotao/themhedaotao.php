<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>THÊM HỆ ĐÀO TẠO </h3>
        </div>
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlydulieu', 'themhedaotao'); ?>" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Tên Hệ Đào Tạo: </label>
                        <input name="tenhedaotao" type="text" class="form-control"  placeholder="Tên hệ đào tạo" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary disabled">Thêm hệ đào tạo</button>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </form>
        </div>
    </div>
</div>