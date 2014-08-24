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
use Soknann\Reg\Validators\StudentValidator;
use Soknann\Reg\Validators\TeacherValidator;
use Soknann\Reg\Validators\UserValidator;
use Redirect;
use View;
use Input;

class TeacherController extends BaseController
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
            ->setUrl(route('api.teacher')) // this is the route where data will be retrieved
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
            \View::make('soknann/reg::teacher.index', $data)
        );
    }

    public function add()
    {
        return $this->renderLayout(
            \View::make('soknann/reg::teacher.add')
        );
    }

    public function store()
    {
        $validator = TeacherValidator::make();
        if ($validator->passes()) {
            $data = new TeacherModel();
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
        $data['row'] = TeacherModel::where('tea_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::teacher.edit', $data)
        );
    }

    public function show($id)
    {
        $data['row'] = TeacherModel::where('tea_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::teacher.show', $data)
        );
    }

    public function update($id)
    {
        try {
            $validator = TeacherValidator::make();
            if ($validator->passes()) {

                $data = TeacherModel::where('tea_id', '=', $id)->first();
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

                return Redirect::route('reg.teacher.index')
                    ->with('success', "Update Successful");
            }
            return Redirect::back()->withInput()->withErrors($validator->errors());
        } catch (\Exception $e) {
            return Redirect::route('reg.teacher.index')->with('error', "Errors ");
       }
    }

    public function destroy($id)
    {
        try {
            $data = TeacherModel::where('tea_id', '=', $id)->first();
            $data->delete();
            return Redirect::back()->with('success', trans('soknann/reg::teacher.delete_success'));
        } catch (\Exception $e) {
            return Redirect::route('reg.teacher.index')->with('error', trans('soknann/reg::db_error.fail'));
        }
    }

    private function saveData($data,$photoPath,$store=true)
    {
        if($store){
            $data->tea_id = Input::get('tea_id');
        }
        $data->tea_kh_fname = Input::get('tea_kh_fname');
        $data->tea_kh_lname = Input::get('tea_kh_lname');
        $data->tea_en_fname = Input::get('tea_en_fname');
        $data->tea_en_lname = Input::get('tea_en_lname');
        $data->tea_gender = Input::get('tea_gender');
        $data->tea_dob = Input::get('tea_dob');
        $data->tea_pob = Input::get('tea_pob');
        $data->tea_address = Input::get('tea_address');
        $data->tea_phone = Input::get('tea_phone');
        $data->tea_email = Input::get('tea_email');
        $data->tea_photo = $photoPath;
        $data->tea_memo = Input::get('tea_memo');
//        $data->remember_token = '';
        $data->save();
    }

    public function getDatatable()
    {
        $item = array(
            'tea_id',
            'tea_kh_fname',
            'tea_kh_lname',
            'tea_gender',
            'tea_dob',
            'tea_phone',
            'tea_email',
        );
        $arr = \DB::table('tbl_teacher')->orderBy('tea_id');

        return \Datatable::query($arr)
           ->addColumn(
                'action',
                function ($model) {
                    return \Action::make()
                        ->show(route('reg.teacher.show',$model->tea_id))
                        ->edit(route('reg.teacher.edit', $model->tea_id))
                        ->delete(route('reg.teacher.destroy', $model->tea_id))
                        ->get();
                }
            )
            ->showColumns($item)
            ->searchColumns(array('tea_id','tea_kh_fname','tea_kh_lname','tea_gender','tea_phone','tea_email'))
            ->orderColumns($item)
            ->make();
    }

}