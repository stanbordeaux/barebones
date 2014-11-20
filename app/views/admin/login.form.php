<?php 
use app\classes\Token;
if (isset($data))
{
    extract($data);
    include $head;
}



?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in</h1>
             <?php if(isset($_SESSION['error'])):?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <?php echo $_SESSION['error'];?>.
            </div>
        <?php endif;?>
             <div class="account-wall text-center top-buffer">
                <img class="profile-img img-circle" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="top-buffer form-signin"  action="<?=BASE_URL;?>/user/check" method="post">
                <input type="text" class="form-control top-buffer" name="email" placeholder="Email" required autofocus>
                 <input type="hidden" name="token"  value="<?=Token::generate();?>">
                <input type="password" class="form-control top-buffer" name="password" placeholder="Password" required>
                <input type="submit" class="btn btn-lg btn-primary btn-block top-buffer " name='login' value="Sign in">
                </form>

            </div>
            <div class="text-center top-buffer">
                <a href="register.form.php" class="btn text-center new-account">Not registered? Create an account here! </a>
            </div>
            
        </div>
    </div>
</div>
<script src="http://cdn.jsdelivr.net/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/bootstrap/3.2.0/js/bootstrap.min.js"></script>