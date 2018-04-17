<div class="form">
    <h3>Cài đặt thông số</h3>
</div>
<div class="panel panel-widget">
    <form action="<?php echo url::createLink('admin', 'quanlydulieu', 'chinhsuachucvu'); ?>" method="post" data-toggle="validator" novalidate="true">
        <div class="form-group valid-form">
            <label>Mức lương bắt đầu tính thuế thu nhập cá nhân: </label>
            <input type="number" class="form-control" style="width:66%;display:inline-block;"  required="">
        </div>
        <div class="row">
            <div class="col-md-5 col-doanhnghep">
                <h4>Doanh Nghiệp</h4>
                <div class="form-group valid-form">
                    <label>% BHXH doanh nghiệp: </label>
                    <input type="number" class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHYT doanh nghiệp: </label>
                    <input type="number" class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHTN doanh nghiệp: </label>
                    <input type="number" class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHXH doanh nghiệp: </label>
                    <input type="number" class="form-control"  required="">
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 col-nguoilaodong">
                <h4>Người lao động</h4>
                <div class="form-group valid-form">
                    <label>% BHXH lao động: </label>
                    <input type="number" class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHYT lao động: </label>
                    <input type="number" class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHTN lao động: </label>
                    <input type="number" class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHXH lao động: </label>
                    <input type="number" class="form-control"  required="">
                </div>
            </div>
        </div>
        
        <!-- phần thếu thu nhập cá nhân -->
        <div class="col-thunhapcanhan">
            <h4>Thuế TNCN</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Mức 5%: </label>
                        <input type="number" class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 10%: </label>
                        <input type="number" class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 15%:: </label>
                        <input type="number" class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 20%:: </label>
                        <input type="number" class="form-control"  required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Mức 25%: </label>
                        <input type="number" class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 30%: </label>
                        <input type="number" class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 35%: </label>
                        <input type="number" class="form-control"  required="">
                    </div>
                </div>
            </div>
        </div>
        <button style="margin-bottom:20px;" type="submit" class="btn btn-primary disabled">Lưu lại</button>
    </form>
</div>
    
        
