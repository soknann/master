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

class SubjectController extends BaseController
{

    public function index()
    {
        $item = array(
            'Action',
            'ID',
            'Subject Name',
            'Duration',
            'Price ($)',
            'Start Date',
            'End Date',
        );
//        $data['btnAction'] = array('Add New' => route('cpanel.user.create'));
        $tb = new Datatable();
        $data['table'] = $tb->table()
            ->addColumn($item) // these are the column headings to be shown
            ->setUrl(route('api.subject')) // this is the route where data will be retrieved
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
            \View::make('soknann/reg::subject.index', $data)
        );
    }

    public function add()
    {
        return $this->renderLayout(
            \View::make('soknann/reg::subject.add')
        );
    }

    public function store()
    {
        $validator = SubjectValidator::make();
        if ($validator->passes()) {
            $data = new SubjectModel();
            $this->saveData($data);

            return Redirect::back()
                ->with('success', "Save Successful");
        }
        return \Redirect::back()->withInput()->withErrors($validator->errors());
    }

    public function edit($id)
    {
        $data['row'] = SubjectModel::where('sub_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::subject.edit', $data)
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
            $data->sub_id = Input::get('sub_id');
        }
        $data->sub_name = Input::get('subject');
        $data->sub_cost = Input::get('price');
        $data->sub_duration = Input::get('duration');
        $data->sub_start_date = Input::get('start');
        $data->sub_end_date = Input::get('end');
//        $data->remember_token = '';
        $data->save();
    }

    public function getDatatable()
    {
        $item = array(
            'sub_id',
            'sub_name',
            'sub_duration',
            'sub_cost',
            'sub_start_date',
            'sub_end_date',
        );
        $arr = \DB::table('tbl_subject')->orderBy('sub_id');

        return \Datatable::query($arr)
           ->addColumn(
                'action',
                function ($model) {
                    return \Action::make()
                        ->show(route('reg.subject.show',$model->sub_id))
                        ->edit(route('reg.subject.edit', $model->sub_id))
                        ->delete(route('reg.subject.destroy', $model->sub_id))
                        ->get();
                }
            )
            ->showColumns($item)
            ->searchColumns(array('sub_id','sub_name','sub_duration','sub_cost'))
            ->orderColumns($item)
            ->make();
    }

}