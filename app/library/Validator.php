<?php
namespace app\library;

use app\core\DBClass;
use app\library\ErrorHandler;

class Validator extends DBclass {

    protected $db;
    protected $errorHandler;
    protected $rules = ['minlength', 'maxlength', 'email', 'required'];
    public $messages = [
        'required' => 'The :field field is required',
        'minlength' => 'The :field field must contain a minimum of :satisfier characters',
        'maxlength' => 'The :field field must contain a maximum of :satisfier characters',
        'email' => 'Must be a valid email address'
    ];

    // public function  __construct(ErrorHandler $errorHandler)
    public function  __construct()
    {
        // $this->db = $db;
        // $this->errorHandler = $errorHandler;
    }

    public function check($items, $rules)
    {
        foreach($items as $item => $value)
        {
            if (in_array($item, array_keys($rules)))
            {
                $this->validate([
                    'field' => $item,
                    'value' => $value,
                    'rules' => $rules[$item]
                    ]);
            }
        }
        return $this;
    }

    public function fails()
    {

        return $this->errorHandler->hasErrors();
    }

    public function errors()
    {
        // FB::trace('fails');
        return $this->errorHandler;
    }

    protected function validate($data)
    {

        $field = $data['field'];

        foreach ($this->data['rules'] as $rule => $satisfier)
        {

            if (in_array($rule, $this->rules))
            {
 
                if (!call_user_func_array([$this, $rule], [$field, $data['value'], $satisfier]))
                {
                    $error = str_replace([':field', ':satisfier'], [$field, $satisfier], $this->messages[$rule]);
                    $this->errorHandler->addError($error, $field);
                }
            }
        }
    }

    protected function required($field, $value, $satisfier)
    {
        return !empty(trim($value));
    }

    protected function minlength($field, $value, $satisfier)
    {
        return mb_strlen($value) >= $satisfier;
    }

    protected function maxlength($field, $value, $satisfier)
    {
         return mb_strlen($value) <= $satisfier;
    }

    protected function email($field, $value, $satisfier)
    {
         return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}