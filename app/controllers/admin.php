<?php
namespace app\controllers;

use app\core\Controller;

class Admin extends Controller {

	private $table = 'users';

  // public function index()
  // {
  // 	$this->check();
  // }
  
  public function index()
  {

  }
	public function check()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$user = $this->model('User')->check($email, $password);
		
		if ($user)
		{
			$id = $user->id;
			// header('Location: task/create?id=' .$id);
			// exit();
			$this->redirect('task/create/'.$id);
		}
		else
		{
			echo 'try again shithead';
		}

	}

	public function create()
	{
		$data['head'] = $this->partial('head');

		$this->view('admin/login.form', $data);
	}



	public function logout()
	{
		$_SESSION = array();
		session_destroy();
		return true;																				
	}
}