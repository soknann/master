<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/13/14
 * Time: 11:19 AM
 */

namespace Soknann\Reg;

use Soknann\Reg\BaseController;
use Chumper\Datatable\Datatable;
use Soknann\Reg\Libraries\Report;
use Soknann\Reg\Validators\StudentValidator;
use Soknann\Reg\Validators\UserValidator;
use Redirect;
use View;
use Input;


class StudentController extends BaseController
{

    public function index()
    {
        $item = array(
            'Action',
            'ID',
            'First Name',
            'Last Name',
            'Gender',
            'Date Of Birth',
            'Phone Number',
            'E-mail',
        );
//        $data['btnAction'] = array('Add New' => route('cpanel.user.create'));
        $tb = new Datatable();
        $data['table'] = $tb->table()
            ->addColumn($item) // these are the column headings to be shown
            ->setUrl(route('api.student')) // this is the route where data will be retrieved
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
            \View::make('soknann/reg::student.index', $data)
        );
    }

    public function add()
    {
        return $this->renderLayout(
            \View::make('soknann/reg::student.add')
        );
    }

    public function store()
    {
        $validator = StudentValidator::make();
        if ($validator->passes()) {
            $data = new StudentModel();
            $photo = Input::file('attach_photo');
            $photoPath = \URL::to('/').'/packages/soknann/reg/photo/no-image.png';
            if(!empty($photo)){
                $destinationPath = public_path().'/packages/soknann/reg/photo/';
                $filename = Input::get('en_fname').
                            Input::get('en_lname').'_'.
                            Input::get('dob').'.'.$photo->getClientOriginalExtension();
                $photo->move($destinationPath,$filename);
                $photoPath = \URL::to('/').'/packages/soknann/reg/photo/'.$filename;
            }
            $this->saveData($data,$photoPath,false);

            return Redirect::back()
                ->with('success', "Save Successful");

        }
        return \Redirect::back()->withInput()->withErrors($validator->errors());
    }

    public function edit($id)
    {
        $data['row'] = StudentModel::where('st_id', '=', $id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::student.edit', $data)
        );
    }

    public function show($id)
    {
        $data['row'] = StudentModel::where('st_id', '=', $id)->first();
        return $this->renderLayout(
          \View::make('soknann/reg::student.show', $data)
        );
    }

    public function update($id)
    {
        try {
            $validator = StudentValidator::make();
            if ($validator->passes()) {

                $data = StudentModel::where('st_id', '=', $id)->first();
                $photo = Input::file('attach_photo');
                $photoPath = $data->photo;
                if(!empty($photo)){
                    $destinationPath = public_path().'/packages/soknann/reg/photo/';
                    $filename = Input::get('en_fname').
                                Input::get('en_lname').'_'.
                                Input::get('dob').'.'.$photo->getClientOriginalExtension();
                    $photo->move($destinationPath,$filename);
                    $photoPath = \URL::to('/').'/packages/soknann/reg/photo/'.$filename;
                }
                $this->saveData($data,$photoPath,false);

                return Redirect::route('reg.student.index')
                    ->with('success', "Update Successful");
            }
            return Redirect::back()->withInput()->withErrors($validator->errors());
        } catch (\Exception $e) {
            return Redirect::route('reg.student.index')->with('error', "Errors ");
        }
    }

    public function destroy($id)
    {
        try {
            $data = StudentModel::where('st_id', '=', $id)->first();
            $data->delete();
            return Redirect::back()->with('success', trans('soknann/reg::student.delete_success'));
        } catch (\Exception $e) {
            return Redirect::route('reg.student.index')->with('error', trans('soknann/reg::db_error.fail'));
        }
    }

    private function saveData($data,$photoPath,$store=true)
    {
        if($store){
            $data->st_id = Input::get('st_id');
        }
        $data->kh_fname = Input::get('kh_fname');
        $data->kh_lname = Input::get('kh_lname');
        $data->en_fname = Input::get('en_fname');
        $data->en_lname = Input::get('en_lname');
        $data->gender = Input::get('gender');
        $data->dob = Input::get('dob');
        $data->pob = Input::get('pob');
        $data->address = Input::get('address');
        $data->phone = Input::get('phone');
        $data->email = Input::get('email');
        $data->photo = $photoPath;
        $data->memo = Input::get('memo');
//        $data->remember_token = '';
        $data->save();
    }

    public function getDatatable()
    {
        $item = array(
            'st_id',
            'kh_fname',
            'kh_lname',
            'gender',
            'dob',
            'phone',
            'email',
        );
        $arr = \DB::table('tbl_students')->orderBy('st_id');

        return \Datatable::query($arr)
            ->addColumn(
                'action',
                function ($model) {
                    return \Action::make()
                        ->show(route('reg.student.show',$model->st_id))
                        ->edit(route('reg.student.edit', $model->st_id))
                        ->delete(route('reg.student.destroy', $model->st_id))
                        ->get();
                }
            )
            ->showColumns($item)
            ->searchColumns(array('st_id','kh_fname','kh_lname','gender','phone','email'))
            ->orderColumns($item)
            ->make();
    }

    public function reportStudent()
    {
        $data['result'] = \DB::select('select * from tbl_students');
        //var_dump($data);
        //exit;
        $report = new Report();
        return $report->make('student/reportstudent', $data);



    }

}
