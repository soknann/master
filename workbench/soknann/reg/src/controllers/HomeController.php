<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 6/21/14
 * Time: 5:08 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Soknann\Reg;
use Soknann\Reg\BaseController;
use Input;
use Redirect;
use Auth;

class HomeController extends BaseController{
    public function getLogin(){
        return \View::make('soknann/reg::dashboard.login');
    }

    public function postLogin(){
        $inputs = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
        );

        if (Auth::attempt($inputs)) {
            return Redirect::route('reg.home')
                ->with('success','Login Success !');

        } else {
            return Redirect::back()
                ->withInput()
                ->with('error', 'The user name or password is not a valid.');
        }
    }

    public function getHome(){
        foreach(StudentModel::all() as $row){
            $temp[$row->st_id] = $row->kh_fname. $row->kh_lname;
        }

        $data['stList'] = $temp;
        return $this->renderLayout(
            \View::make('soknann/reg::dashboard.home', $data)
        );

    }

    public function getLogout(){
        if (Auth::check() == true) {
            Auth::logout();
           //\UserSession::clear();
            return Redirect::route('reg.login')->with('success', 'Log Out Successful.');
        }
    }
}