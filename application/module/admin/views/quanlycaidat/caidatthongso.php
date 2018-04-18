<div class="form">
    <h3>Cài đặt thông số  </h3>
</div>
<div class="panel panel-widget">
    <form action="<?php echo url::createLink('admin', 'quanlycaidat', 'caidatthongso'); ?>" method="post" data-toggle="validator" novalidate="true">
        <div class="form-group valid-form">
            <label>Mức lương bắt đầu tính thuế thu nhập cá nhân: </label>
            <input type="number" value='<?php echo $this->caidatluong[0]->luongbatdautinhthue;?>' class="form-control" style="width:66%;display:inline-block;"  required="">
        </div>
        <div class="row">
            <div class="col-md-5 col-doanhnghep">
                <h4>Doanh Nghiệp</h4>
                <div class="form-group valid-form">
                    <label>% BHXH doanh nghiệp: </label>
                    <input type="number"  value='<?php echo $this->caidatluong[0]->bhxhdoanhnghiep;?>' class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHYT doanh nghiệp: </label>
                    <input type="number" value='<?php echo $this->caidatluong[0]->bhytdoanhnghiep;?>' class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHTN doanh nghiệp: </label>
                    <input type="number" value='<?php echo $this->caidatluong[0]->bhtndoanhnghiep;?>' class="form-control"  required="">
                </div>
                
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 col-nguoilaodong">
                <h4>Người lao động</h4>
                <div class="form-group valid-form">
                    <label>% BHXH lao động: </label>
                    <input type="number" value='<?php echo $this->caidatluong[0]->bhxhnguoilaodong;?>' class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHYT lao động: </label>
                    <input type="number" value='<?php echo $this->caidatluong[0]->bhytnguoilaodong;?>' class="form-control"  required="">
                </div>
                <div class="form-group valid-form">
                    <label>% BHTN lao động: </label>
                    <input type="number" value='<?php echo $this->caidatluong[0]->bhtnnguoilaodong;?>' class="form-control"  required="">
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
                        <input type="number" value='<?php echo $this->caidatluong[0]->muc5;?>' class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 10%: </label>
                        <input type="number" value='<?php echo $this->caidatluong[0]->muc10;?>' class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 15%:: </label>
                        <input type="number" value='<?php echo $this->caidatluong[0]->muc15;?>' class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 20%:: </label>
                        <input type="number" value='<?php echo $this->caidatluong[0]->muc20;?>' class="form-control"  required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group valid-form">
                        <label>Mức 25%: </label>
                        <input type="number" value='<?php echo $this->caidatluong[0]->muc25;?>' class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 30%: </label>
                        <input type="number" value='<?php echo $this->caidatluong[0]->muc30;?>' class="form-control"  required="">
                    </div>
                    <div class="form-group valid-form">
                        <label>Mức 35%: </label>
                        <input type="number" value='<?php echo $this->caidatluong[0]->muc35;?>' class="form-control"  required="">
                    </div>
                </div>
            </div>
        </div>
        <button style="margin-bottom:20px;" type="submit" class="btn btn-primary disabled">Lưu lại</button>
    </form>
</div>
<div class="clr"></div>
    
        
