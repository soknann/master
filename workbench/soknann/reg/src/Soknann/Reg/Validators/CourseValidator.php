<?php
namespace Soknann\Reg\Validators;


use Fadion\ValidatorAssistant\ValidatorAssistant;
use Illuminate\Validation\Validator;

class CourseValidator extends ValidatorAssistant
{
    protected function before()
    {
        \Rule::add('semester')->numeric()->message('Semester field must be number');
        \Rule::add('amount')->numeric()->message('Student amount field must be number');

        $this->rules = \Rule::get();
        $this->messages = \Rule::getMessages();
    }

    protected function customAlphaAndNum($attribute, $value, $parameters)
    {
        if (!preg_match('/[0-9]+/', $value)) {
            return false;
        }

        if (!preg_match('/[a-zA-Z]+/', $value)) {
            return false;
        }

        return true;
    }

    protected function customAlphaDashSpace($attribute, $value ,$parameters)
    {
        return ( ! preg_match("/^([-a-z0-9_ ])+$/i", $value)) ? FALSE : TRUE;
    }

}