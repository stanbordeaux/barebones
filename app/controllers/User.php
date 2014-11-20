<?php

namespace app\controllers;

use app\classes\DB;
use app\classes\Input;
use app\classes\Token;
use app\classes\Validation;
use app\classes\Hash;
use app\classes\Config;
use app\library\Funky;
use app\classes\Session;

class User {

	private $db;
	private $data;
	private $checktype;

	public function __construct($user = null)
	{
		$this->db = DB::getInstance();
	}

	public function create($fields =array())
	{
		if (!$this->db->insert('users', $fields))
		{
			echo 'shit';
			// throw new Exception("There was a problem creating a new account");
		}
	}

	public function find($user = null)
	{
		if ($user)
		{
			$field = (is_numeric($user)) ? 'id' : 'email';
			$data = $this->db->get('users', [$field, '=', $user]);
			if ($data->count())
			{
				$this->data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function check()
	{
		$this->checktype = implode('', Config::get('verify'));

		if(Token::check( Input::get('token')))
		{
			$validate = new Validation;
			$valid = $validate->check($_POST, [
					$this->checktype => ['required'],
					'password' => ['required']
				]);

			if ($validate->passed())
			{
				$this->login(Input::get($this->checktype), Input::get('password'));

			}
			else
			{

			}
		}
		return false;
	}

	public function login($type, $password)
	{
		$user = $this->find($type);
		// Funky::dump($user);
		if ($user)
		{
			if ($this->data()->password === Hash::make($password, $this->data()->salt))
			{
			  echo $this->data()->username. ' has '. $this->data()->email;
			}
		}
		return false;
	}

	private function data()
	{
		return $this->data;
	}
	
}