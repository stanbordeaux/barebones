<?php

namespace app\controllers;

use app\classes\Input;
use app\classes\Validation; 
use app\core\Controller;
use app\classes\Session;
use app\classes\Redirect;

class Register  extends Controller {

  public function index()
  {
  	$this->create();
  }
	public function create()
	{
		$data['head'] = $this->partial('head');
		$this->view('register/register', $data);
	}

	public function check()
	{
		if (Input::exists())
			{
			    if (Token::check(Input::get('token')))
			    {
			        $validate = new Validation;
			        $check = $validate->check($_POST, array(
			                    'username' => array(
			                    'required' => true,
			                    'minlength' => 2,
			                    'maxlength' => 50,
			                    'unique' => 'users'
			                    ),
			                'email' => array(
			                    'required' => true,

			                     ),
			                'password' => array(),
			                'confirmpassword' => array(
			                    'matches' => 'password'
			                    )
			            ));
			        if ($validate->passed())
			        {
			            $user = new User;
			            $salt = Hash::salt(32);

			            try
			            {
			                $user->create(
			                    [
			                        'username' => Input::get('username'),
			                        'email' => Input::get('email'),
			                        'salt' => $salt,
			                        'password' => Hash::make(Input::get('password'), $salt)
			                    ]
			                    );
			                Redirect::to('index.php');
			            }
			            catch(Exception $e)
			            {
			                die($e->getMessage());
			            }
			        }
			        else
			        {
			            // Redirect::to();
			            Session::flash('fail', 'Sorry please fix the following errors');
			             $regerrors = $validate->errors();
			        }
			    }
			  
			}
		}
}