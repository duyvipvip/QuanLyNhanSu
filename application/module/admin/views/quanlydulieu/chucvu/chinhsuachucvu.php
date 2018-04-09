<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>CHỈNH SỬA CHỨC VỤ </h3>
        </div>
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlydulieu', 'chinhsuachucvu'); ?>" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Tên Chức Vụ: </label>
                        <input value="<?php echo $this->chucvu->_id; ?>" name="idchucvu" type="hidden" class="form-control"  placeholder="Tên dân tộc" required="">
                        <input value="<?php echo $this->chucvu->tenchucvu; ?>" name="tenchucvu" type="text" class="form-control"  placeholder="Tên dân tộc" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary disabled">chỉnh sửa dân tộc</button>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </form>
        </div>
    </div>
</div>