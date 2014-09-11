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
use Soknann\Reg\Validators\SubjectValidator;
use Soknann\Reg\Validators\TeacherValidator;
use Soknann\Reg\Validators\UserValidator;
use Redirect;
use View;
use Input;

class CourseController extends BaseController
{

    public function index()
    {
        $item = array(
            'Action',
            'ID',
            'Course Name',
            'Semester',
            'Amount of Student',
            'Start Date',
            'End Date',
        );
//        $data['btnAction'] = array('Add New' => route('cpanel.user.create'));
        $tb = new Datatable();
        $data['table'] = $tb->table()
            ->addColumn($item) // these are the column headings to be shown
            ->setUrl(route('api.course')) // this is the route where data will be retrieved
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
            \View::make('soknann/reg::course.index', $data)
        );
    }

    public function add()
    {
        return $this->renderLayout(
            \View::make('soknann/reg::course.add')
        );
    }

    public function store()
    {
        //$validator = SubjectValidator::make();
       // if ($validator->passes()) {
            $data = new CourseModel();
            $this->saveData($data);

            return Redirect::back()
                ->with('success', "Save Successful");
        //}
        return \Redirect::back()->withInput()->withErrors($validator->errors());
    }

    public function edit($id)
    {
        $data['row'] = CourseModel::where('cou_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::course.edit', $data)
        );
    }

    public function show($id)
    {
        $data['row'] = SubjectModel::where('sub_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::subject.show', $data)
        );
    }

    public function update($id)
    {
        try {
           $validator = SubjectValidator::make();
           if ($validator->passes()) {

                $data = SubjectModel::where('sub_id', '=' ,$id)->first();
                $this->saveData($data,false);

                return Redirect::route('reg.subject.index')
                    ->with('success', "Update Successful");
           }
            return Redirect::back()->withInput()->withErrors($validator->errors());
        } catch (\Exception $e) {
            return Redirect::route('reg.subject.index')->with('error', "Errors ");
        }
    }

    public function destroy($id)
    {
        try {
            $data = SubjectModel::where('sub_id', '=', $id)->first();
            $data->delete();
            return Redirect::back()->with('success', trans('soknann/reg::subject.delete_success'));
        } catch (\Exception $e) {
            return Redirect::route('reg.subject.index')->with('error', trans('soknann/reg::db_error.fail'));
        }
    }

    private function saveData($data,$store=true)
    {
        if ($store){
            $data->cou_id = Input::get('cou_id');
        }
        $data->tea_id = Input::get('tea_id');
        $data->cou_semester = Input::get('semester');
        $data->cou_amount_of_student = Input::get('student_amount');
        $data->cou_start_date = Input::get('start');
        $data->cou_end_date = Input::get('end');
//        $data->remember_token = '';
        $data->save();
    }

    public function getDatatable()
    {
        $item = array(
            'cou_id',
            'cou_name',
            'tea_id',
            'cou_term',
            'cou_amount_of_student',
            'cou_start_date',
            'cou_end_date',
        );
        $arr = \DB::table('tbl_course')->orderBy('cou_id');

        return \Datatable::query($arr)
           ->addColumn(
                'action',
                function ($model) {
                    return \Action::make()
                        ->show(route('reg.course.show',$model->cou_id))
                        ->edit(route('reg.course.edit', $model->cou_id))
                        ->delete(route('reg.course.destroy', $model->cou_id))
                        ->get();
                }
            )
            ->showColumns($item)
            ->searchColumns(array('cou_id','tea_id','cou_semester','cou_amount_of_student'))
            ->orderColumns($item)
            ->make();
    }

}