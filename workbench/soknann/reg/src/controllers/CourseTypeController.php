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
use Soknann\Reg\Validators\CourseTypeValidator;
use Soknann\Reg\Validators\StudentValidator;
use Soknann\Reg\Validators\SubjectValidator;
use Soknann\Reg\Validators\TeacherValidator;
use Soknann\Reg\Validators\UserValidator;
use Redirect;
use View;
use Input;

class CourseTypeController extends BaseController
{

    public function index()
    {
        $item = array(
            'Action',
            'ID',
            'Course Type',
            'Subject Name',
        );
//        $data['btnAction'] = array('Add New' => route('cpanel.user.create'));
        $tb = new Datatable();
        $data['table'] = $tb->table()
            ->addColumn($item) // these are the column headings to be shown
            ->setUrl(route('api.course_type')) // this is the route where data will be retrieved
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
            \View::make('soknann/reg::course_type.index', $data)
        );
    }

    public function add()
    {
        return $this->renderLayout(
            \View::make('soknann/reg::course_type.add')
        );
    }

    public function store()
    {
        $validator = CourseTypeValidator::make();
        if ($validator->passes()) {
            $data = new CourseTypeModel();
            $this->saveData($data);

            return Redirect::back()
                ->with('success', "Save Successful");
        }
        return \Redirect::back()->withInput()->withErrors($validator->errors());
    }

    public function edit($id)
    {
        $data['row'] = CourseTypeModel::where('cou_de_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::course_type.edit', $data)
        );
    }

    /*public function show($id)
    {
        $data['row'] = CourseTypeModel::where('cou_de_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::course_type.show', $data)
        );
    }*/

    public function update($id)
    {
        try {
           $validator = CourseTypeValidator::make();
           if ($validator->passes()) {

                $data = CourseTypeModel::where('cou_de_id', '=' ,$id)->first();
                $this->saveData($data,false);

                return Redirect::route('reg.course_type.index')
                    ->with('success', "Update Successful");
           }
            return Redirect::back()->withInput()->withErrors($validator->errors());
        } catch (\Exception $e) {
            return Redirect::route('reg.course_type.index')->with('error', "Errors ");
        }
    }

    public function destroy($id)
    {
        try {
            $data = CourseTypeModel::where('cou_de_id', '=', $id)->first();
            $data->delete();
            return Redirect::back()->with('success', trans('soknann/reg::course_type.delete_success'));
        } catch (\Exception $e) {
            return Redirect::route('reg.course_type.index')->with('error', trans('soknann/reg::db_error.fail'));
        }
    }

    private function saveData($data,$store=true)
    {
        if ($store){
            $data->cou_de_id = Input::get('cou_de_id');
        }
        $data->sub_id = json_encode(Input::get('sub_id'));
        $data->cou_de_name = Input::get('cou_name');
//        $data->remember_token = '';
        $data->save();
    }

    public function getDatatable()
    {
        $item = array(
            'cou_de_id',
            'cou_de_name',
            'sub_id',
        );
        $arr = \DB::table('tbl_course_detail')->orderBy('cou_de_id');

        return \Datatable::query($arr)
           ->addColumn(
                'action',
                function ($model) {
                    return \Action::make()
                        ->edit(route('reg.course_type.edit', $model->cou_de_id))
                        ->delete(route('reg.course_type.destroy', $model->cou_de_id))
                        ->get();
                }
            )
            ->showColumns($item)
            ->addColumn('sub_id',function($model){
                foreach(json_decode($model->sub_id) as $key=> $row){
                    $tmp[] = \Lookup::getSub($row);
                }
                return implode(', ',$tmp);
            })
            ->searchColumns(array('cou_de_id','sub_id','cou_de_name'))
            ->orderColumns($item)
            ->make();
    }

}