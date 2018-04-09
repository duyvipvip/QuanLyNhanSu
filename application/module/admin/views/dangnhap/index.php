
<div class="login-body">
    <?php 
        
        // MESSAGE
        $message	= Session::get('message');
        Session::delete('message');
        $strMessage = helper::createMess($message);
    ?>
    
    <div class="login-heading">
        <h1>Login</h1>
    </div>
    <div class="login-info">
        <?php echo $strMessage; ?>
        <form method="post" action="<?php echo url::createLink('admin', 'dangnhap', 'index'); ?>">
            <input type="text" class="user" name="email" placeholder="Email" required="">
            <input type="password" name="password" class="lock" placeholder="Password">
            <div class="forgot-top-grids">
                <div class="forgot-grid">
                    <ul>
                        <li>
                            <input type="checkbox" value="">
                            <label for="brand1"><span></span>Remember me</label>
                        </li>
                    </ul>
                </div>
                <div class="forgot">
                    <a href="#">Forgot password?</a>
                </div>
                <div class="clearfix"> </div>
            </div>
            <input type="submit"  value="Đăng nhập">
            <div class="signup-text">
                <a href="<?php echo url::createLink('admin', 'dangki', 'index') ?>">Don't have an account? Create one now</a>
            </div>
            <hr>
            <h2>or login with</h2>
            <div class="login-icons">
                <ul>
                    <li><a href="http://localhost:3000/auth/facebook" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="http://localhost:3000/auth/google" class="google"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
        </form>
    </div>
</div>
<div class="go-back login-go-back">
    <a href="index.html">Go To Home</a>
</div>