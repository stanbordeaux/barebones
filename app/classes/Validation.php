<?php

namespace app\classes;

use app\classes\DB;
use app\library\Funky;

class Validation {

	private $passed = false;
	private $db = null;
	private $errors = [];

	public function __construct()
	{
		$this->db = DB::getInstance();
	}

	public function check($data, $items = array())
	{


		foreach($items as $item => $rules)
		{

			foreach ($rules as $rule => $rule_value)
			{

				$value = $data[$item];

				if ($rule === 'required'  && empty($value))
				{
					$this->addError("$item is required");
				}
				elseif(!empty($rule))
				{
					switch ($rule)
					{
						case 'minlength':
							if (strlen($value) < $rule_value)
							{
								$this->addError("$item must be minimum of $rule_value chars");
							}
							break;
						case 'maxlength':
							if (strlen($value) > $rule_value)
							{
								$this->addError("$item cannot be more than $rule_value chars");
							}
							break;

							case 'matches':
								if ($value !== $data[$rule_value])
								{
									$this->addError("passwords must match");
								}
							break;

							case 'unique':

							 $check = $this->db->get($rule_value,  array($item, '=', $value));

							 if ($check->count())
							 {
							 	$this->addError("$item has already been taken");
							 }
							 break;

					}
				}
			}
		}

		if (empty($this->errors))
		{

			$this->passed = true;
		
		}
	}

	public function addError($error)
	{
		$this->errors[] = $error;
	}

	public function errors()
	{
		return $this->errors;
	}

	public function passed()
	{
		
		return $this->passed;
	}
}