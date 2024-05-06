<?php

class Validate {
    private $passed = false, $errors = [], $db = null;

    public function __construct()  {

        $this->db = Database::getInstance();
    }

    public function check($source, $items = [])  {

        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {

                $value = $source[$item];



                if ($rule == 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                } else if(!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError("{$item} is too short");
                            }
                            break;
                            case 'max':
                                if (strlen($value) > $rule_value) {
                                    $this->addError("{$item} is too long, must be {$rule_value}");
                                }
                                break;

                        case 'matches':
                            if ($value != $source[$rule_value]) {
                                $this->addError("{$rule_value} does not match {$item}");
                            }
                            break;
                        case 'unique':
                            $check = $this->db->get($rule_value, [$item, '=', $value]);
                            if ($check->count()) {
                                $this->addError("{$item} already exists");
                            }
                            break;
                    }
                }
            }
        }

        if (empty($this->errors)) {
            $this->passed = true;
        }


    }

    public function errors() {
        return $this->errors;
    }

    public function addError($error)
    {
        $this->errors[] = $error;
    }

    public function passed() {
        return $this->passed;
    }


}

