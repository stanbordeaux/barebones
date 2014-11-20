<?php

namespace app\controllers;

use app\core\Controller;

class Task extends Controller {

	// public function index()
	// {
	// 	// $this->create($id);
		
	// }
	
	protected $validator;

	public function create($id  = null)
	{
		$data['userId'] = $id;
		$data['head'] = $this->partial('head');
		$data['form_action'] = 'Add';
		$data['task_name'] = '';
		$data['task_desc'] = '';
		$data['duedate'] = '';
		$data['task_id'] = '';
		$this->view('tasks/task.form', $data);
	}

	public function store()
	{

		require_once '../app/library/ErrorHandler.php';
		require_once '../app/library/Validator.php';
		
		$this->errorHandler = new ErrorHandler;
		$this->validator = new Validator($this->errorHandler);
		$rules[ 'task_name' ] = [ 'required' => true,  'minlength' => 4 ];
		$rules[ 'duedate' ] = ['required' => true ];
		

		$this->check = $this->validator->check($_POST, $rules);

		// varDump($check);

		if ($this->check->fails())
		{

			$data = $this->check->errors()->all();
			$this->redirect('task/create/',  $data);
			
		}
		else
		{
			echo 'hi shithead!!';
		}
	}
}