<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>CHỈNH SỬA HỆ ĐÀO TẠO </h3>
        </div>
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlydulieu', 'chinhsuahedaotao'); ?>" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Tên hệ đào tạo: </label>
                        <input value="<?php echo $this->hedaotao->_id; ?>" name="idhedaotao" type="hidden" class="form-control" required="">
                        <input value="<?php echo $this->hedaotao->tenhedaotao; ?>" name="tenhedaotao" type="text" class="form-control"  placeholder="Tên hệ đào tạo" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary disabled">Chỉnh sửa hệ đào tạo</button>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </form>
        </div>
    </div>
</div>