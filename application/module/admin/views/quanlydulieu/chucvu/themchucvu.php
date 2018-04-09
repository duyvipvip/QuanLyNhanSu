<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>THÊM CHỨC VỤ </h3>
        </div>
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlydulieu', 'themchucvu'); ?>" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Tên Chức Vụ: </label>
                        <input name="tenchucvu" type="text" class="form-control"  placeholder="Tên chức vụ" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary disabled">Thêm Chức Vụ</button>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </form>
        </div>
    </div>
</div>