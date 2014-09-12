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
use Chumper\Datatable\Datatable;
use Input;
use View;
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

    public function index(){

        $item = array(
            'Action',
            'Student Name',
            'Teacher Name',
            'Course Study',
            'Lab',
            'Time For Study',
            'Register Date',
        );
//        $data['btnAction'] = array('Add New' => route('cpanel.user.create'));
        $tb = new Datatable();
        $data['table'] = $tb->table()
            ->addColumn($item) // these are the column headings to be shown
            ->setUrl(route('api.dashboard')) // this is the route where data will be retrieved
            ->setOptions(
                'aLengthMenu',
                array(
                    array('10', '25', '50', '100', '-1'),
                    array('10', '25', '50', '100', 'All')
                )
            )
            ->setOptions("iDisplayLength", '10')// default show entries
            ->render('soknann/reg::template.dataTable');
        return $this->renderLayout(
            \View::make('soknann/reg::dashboard.index', $data)
        );

    }

    public function store()
    {
        //$validator = CourseValidator::make();
        //if ($validator->passes()) {
            $data = new HomeModel();
            $this->saveData($data);

            return Redirect::back()
                ->with('success', "Save Successful");
        //}
        return \Redirect::back()->withInput()->withErrors($validator->errors());
    }

    public function edit($id)
    {
        $data['row'] = HomeModel::where('reg_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::dashboard.edit', $data)
        );
    }

    public function update($id)
    {
        try {
            //$validator = CourseValidator::make();
            //if ($validator->passes()) {

                $data = HomeModel::where('reg_id', '=' ,$id)->first();
                $this->saveData($data,false);

                return Redirect::route('reg.dashboard.index')
                    ->with('success', "Update Successful");
            //}
            return Redirect::back()->withInput()->withErrors($validator->errors());
        } catch (\Exception $e) {
            return Redirect::route('reg.dashboard.index')->with('error', "Errors ");
        }
    }

    public function destroy($id)
    {
        try {
            $data = HomeModel::where('reg_id', '=', $id)->first();
            $data->delete();
            return Redirect::back()->with('success', trans('soknann/reg::dashboard.delete_success'));
        } catch (\Exception $e) {
            return Redirect::route('reg.dashboard.index')->with('error', trans('soknann/reg::db_error.fail'));
        }
    }

    private function saveData($data,$store=true)
    {
        if ($store){
            $data->reg_id = Input::get('reg_id');
        }
        $data->stu_id = Input::get('student');
        $data->tea_id = Input::get('teacher');
        $data->ti_id = Input::get('time');
        $data->lab_id = Input::get('lab');
        $data->cou_de_id = json_encode(Input::get('course'));
        $data->reg_date = Input::get('date');
//        $data->remember_token = '';
        $data->save();
    }

    public function getDatatable(){
        $item = array(
            'khmername',
            'fullname',
            'cou_de_id',
            'lab_name',
            'fulltime',
            'reg_date',

        );
        $arr = \DB::table('regstudent')->orderBy('reg_id', 'DESC');

        return \Datatable::query($arr)
            ->addColumn(
                'action',
                function ($model) {
                    return \Action::make()
                        //->show(route('reg.course.show',$model->cou_id))
                        ->edit(route('reg.dashboard.edit', $model->reg_id))
                        ->delete(route('reg.dashboard.destroy', $model->reg_id))
                        ->get();
                }
            )
            ->showColumns($item)
            ->addColumn('cou_de_id',function($model){
                foreach(json_decode($model->cou_de_id) as $key=> $row){
                    $tmp[] = \Lookup::getCou($row);
                }
                return implode(', ',$tmp);
            })
            ->searchColumns(array('khmerName','fullname'))
            ->orderColumns($item)
            ->make();
    }



    public function getLogout(){
        if (Auth::check() == true) {
            Auth::logout();
           //\UserSession::clear();
            return Redirect::route('reg.login')->with('success', 'Log Out Successful.');
        }
    }
}