<div class="panel panel-widget">
    <div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
        <div class="input-info">
            <h3>THÊM TỈNH THÀNH </h3>
        </div>
        <div class="form-body form-body-info">
            <form action="<?php echo url::createLink('admin', 'quanlydulieu', 'chinhsuatinhthanh'); ?>" method="post" data-toggle="validator" novalidate="true">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Tên tỉnh thành: </label>
                        <input value="<?php echo $this->danhsachtinhthanh->_id; ?>" name="idtinhthanh" type="hidden" class="form-control"  placeholder="Tên tỉnh thành" required="">
                        <input value="<?php echo $this->danhsachtinhthanh->tentinhthanh; ?>" name="tentinhthanh" type="text" class="form-control"  placeholder="Tên tỉnh thành" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary disabled">Chỉnh sửa tỉnh thành</button>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </form>
        </div>
    </div>
</div>