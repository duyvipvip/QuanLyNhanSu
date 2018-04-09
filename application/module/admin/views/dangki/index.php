<div class="login-body">
    <div class="login-heading">
        <h1>Đăng kí</h1>
    </div>
    <div class="login-info">
        <?php 
            
            // MESSAGE
            $message	= Session::get('message');
            Session::delete('message');
            echo $strMessage = helper::createMess($message);
        ?>
        <form method="post" action="<?php echo url::createLink('admin', 'dangki', 'index'); ?>">
            <input type="text" class="user" name="tendangnhap" placeholder="Name" required="">
            <input type="text" class="user" name="email" placeholder="Email" required="">
            <input type="password" name="password" class="lock" placeholder="Password">
            <input type="password" name="confirmpassword" class="lock" placeholder="Confirm Password">
            <input type="submit" value="Đăng kí">
            <div class="signup-text">
                <a href="login.html">Already have an account? Login here.</a>
            </div>
        </form>
    </div>
</div>
<div class="go-back login-go-back">
    <a href="index.html">Go To Home</a>
</div>