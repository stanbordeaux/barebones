<?php
namespace app\controllers;

use app\core\Controller;

class TaskController extends Controller {

	public function index()
	{

		$tasks = $this->model('Task')->getAll();
		

		$this->view('tasks/tasks', $tasks);
	}
}