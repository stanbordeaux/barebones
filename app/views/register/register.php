<?php //define('BASE_PATH', realpath(dirname(__FILE__))); 
//require 'app/core/init.php';
//
require_once "bootstrap.php";
use app\classes\Validation;
use app\classes\Input;
use app\classes\Hash;
use app\classes\Token;
use app\controllers\User;

// if (Input::exists())
// {
//     if (Token::check(Input::get('token')))
//     {
//         $validate = new Validation;
//         $check = $validate->check($_POST, array(
//                     'username' => array(
//                     'required' => true,
//                     'minlength' => 2,
//                     'maxlength' => 50,
//                     'unique' => 'users'
//                     ),
//                 'email' => array(
//                     'required' => true,

//                      ),
//                 'password' => array(),
//                 'confirmpassword' => array(
//                     'matches' => 'password'
//                     )
//             ));
//         if ($validate->passed())
//         {
            // $user = new User;
            // $salt = Hash::salt(32);

            // try
            // {
            //     $user->create(
            //         [
            //             'username' => Input::get('username'),
            //             'email' => Input::get('email'),
            //             'salt' => $salt,
            //             'password' => Hash::make(Input::get('password'), $salt)
            //         ]
            //         );
            //     // Redirect::to('index.php');
            // }
            // catch(Exception $e)
            // {
            //     die($e->getMessage());
            // }
        // }
    //     else
    //     {
    //         Redirect::from();
    //         // Session::flash('fail', 'Sorry please fix the following errors');
    //         //  $regerrors = $validate->errors();
    //     }
    // }
  
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>tiny to-do</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
       
        
    </style>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">

            <h1 class="text-center login-title">Register here!</h1>
             <?php if(isset($regerrors)):?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <?php if (Session::exists('fail')):?>
                        <?=Session::flash('fail');?>
                    <?php endif;?>
                        <?php foreach($validate->errors() as $error):?>
                        <span><?=$error;?></span><br>
                    <?php endforeach;?>
            </div>
        <?php endif;?>
             <div class="account-wall text-center top-buffer">
                <img class="profile-img img-circle" src="images/user.png"
                    alt="">
                <form class="top-buffer form-signin"  action="<?=BASE_URL?>register/create" method="post">
                     <input type="text" class="form-control top-buffer" name="username" placeholder="Username"   value="<?=Input::get('username');?>" autofocus>
                <input type="text" class="form-control top-buffer" name="email" placeholder="Email" value="<?=Input::get('email');?>" required autofocus>
                <input type="password" class="form-control top-buffer" name="password" placeholder="Password" required>
                
                 <input type="password" class="form-control top-buffer" name="confirmpassword" placeholder="Password again" required>
                <input type="hidden" class="form-control top-buffer" name="token"  value="<?=Token::generate();?>" >
                <input type="submit" class="btn btn-lg btn-primary btn-block top-buffer " name='login' value="Register">

                </form>

            </div>
            <div class="text-center top-buffer">
                <a href="login.form.php" class="btn text-center new-account">Already registered? Login here! </a>
            </div>
            
        </div>
    </div>
</div>
<script src="http://cdn.jsdelivr.net/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.jsdelivr.net/bootstrap/3.2.0/js/bootstrap.min.js"></script>