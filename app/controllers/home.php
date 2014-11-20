<?php
namespace app\controllers;

use app\core\Controller;

class Home extends Controller {

	public function index()
	{
		$data['head'] = $this->partial('head');
		$this->view('home/index', $data);


	}

	public function show()
	{
		$data['tasks'] = $this->model('Task')->getAll();
		$data['head'] = $this->partial('head');
		$data['footer'] = $this->partial('footer');
		$data['pagetitle'] = "This is the page title";
		$this->view('tasks/tasks', $data);

	}

	public function showOne($value = null)
	{
		$value = '%an%';
		$data['tasks'] = $this->model('Task')->where('task_name', 'LIKE', $value);


		$this->view('tasks/onetask', $data);
	}

	public function test()
	{
		
	}

}