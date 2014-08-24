<?php
namespace Soknann\Reg\Validators;


use Fadion\ValidatorAssistant\ValidatorAssistant;
use Illuminate\Validation\Validator;

class SubjectValidator extends ValidatorAssistant
{
    protected function before()
    {
        \Rule::add('subject')->alphaDashSpace()->message('Subject field must be letter');
        \Rule::add('duration')->alphaAndNum()->message('The Khmer last name must be letter');
        \Rule::add('price')->numeric()->message('Price field must be number');
        \Rule::add('start')->required();
        \Rule::add('end')->required();

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