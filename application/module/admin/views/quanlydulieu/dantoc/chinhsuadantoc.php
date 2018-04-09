<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>CHỈNH SỬA DÂN TỘC </h3>
        </div>
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlydulieu', 'chinhsuadantoc'); ?>" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Tên Dân Tộc: </label>
                        <input value="<?php echo $this->dantoc->_id; ?>" name="iddantoc" type="hidden" class="form-control"  placeholder="Tên dân tộc" required="">
                        <input value="<?php echo $this->dantoc->tendantoc; ?>" name="tendantoc" type="text" class="form-control"  placeholder="Tên dân tộc" required="">
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