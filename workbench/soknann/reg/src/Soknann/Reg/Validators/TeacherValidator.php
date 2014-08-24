<?php
namespace Soknann\Reg\Validators;


use Fadion\ValidatorAssistant\ValidatorAssistant;

class TeacherValidator extends ValidatorAssistant
{
    protected function before()
    {
        \Rule::add('tea_kh_fname')->alpha()->message('The Khmer first name must be letter');
        \Rule::add('tea_kh_lname')->alpha()->message('The Khmer last name must be letter');
        \Rule::add('tea_en_fname')->alpha()->message('The English first name must be letter');
        \Rule::add('tea_en_lname')->alpha()->message('The English last name must be letter');
        \Rule::add('tea_gender')->required();
        \Rule::add('tea_address')->required();
        \Rule::add('tea_phone')->numeric()->message('The phone must be number Ex. 08831139');
        \Rule::add('attach_photo')->chkPhoto()->message('You can use only *.png and *.jpg file');

        $this->inputs['tea_dob'] = date('d-m-Y', strtotime($this->inputs['tea_dob']));
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

   protected function customChkPhoto($attribute, $value, $parameters)
    {
       $ext = \Input::file('attach_photo')->getClientOriginalExtension();
       if(!empty($value) and !in_array($ext,array('png','jpg','PNG','JPG'))){
            return false;
       }
        return true;
    }
}