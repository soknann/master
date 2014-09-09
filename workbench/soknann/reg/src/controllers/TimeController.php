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

class TimeController extends BaseController
{

    public function index()
    {
        $item = array(
            'Action',
            'ID',
            'Time',
            'Weekly',
        );
//        $data['btnAction'] = array('Add New' => route('cpanel.user.create'));
        $tb = new Datatable();
        $data['table'] = $tb->table()
            ->addColumn($item) // these are the column headings to be shown
            ->setUrl(route('api.time')) // this is the route where data will be retrieved
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
            \View::make('soknann/reg::time.index', $data)
        );
    }

    public function add()
    {
        return $this->renderLayout(
            \View::make('soknann/reg::time.add')
        );
    }

    public function store()
    {
        //$validator = SubjectValidator::make();
        //if ($validator->passes()) {
            $data = new TimeModel();
            $this->saveData($data);

            return Redirect::back()
                ->with('success', "Save Successful");
        //}
        return \Redirect::back()->withInput()->withErrors($validator->errors());
    }

    public function edit($id)
    {
        $data['row'] = TimeModel::where('ti_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::time.edit', $data)
        );
    }

    public function show($id)
    {
        $data['row'] = TimeModel::where('ti_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::time.show', $data)
        );
    }

    public function update($id)
    {
        try {
           //$validator = SubjectValidator::make();
           //if ($validator->passes()) {

                $data = TimeModel::where('ti_id', '=' ,$id)->first();
                $this->saveData($data,false);

                return Redirect::route('reg.time.index')
                    ->with('success', "Update Successful");
           //}
            return Redirect::back()->withInput()->withErrors($validator->errors());
        } catch (\Exception $e) {
            return Redirect::route('reg.subject.index')->with('error', "Errors ");
        }
    }

    public function destroy($id)
    {
        try {
            $data = TimeModel::where('ti_id', '=', $id)->first();
            $data->delete();
            return Redirect::back()->with('success', trans('soknann/reg::time.delete_success'));
        } catch (\Exception $e) {
            return Redirect::route('reg.time.index')->with('error', trans('soknann/reg::db_error.fail'));
        }
    }

    private function saveData($data,$store=true)
    {
        if ($store){
            $data->ti_id = Input::get('ti_id');
        }
        $data->time = Input::get('time');
        $data->weekly = Input::get('weekly');
//        $data->remember_token = '';
        $data->save();
    }

    public function getDatatable()
    {
        $item = array(
            'ti_id',
            'time',
            'weekly',
        );
        $arr = \DB::table('tbl_time')->orderBy('ti_id');

        return \Datatable::query($arr)
           ->addColumn(
                'action',
                function ($model) {
                    return \Action::make()
                        ->show(route('reg.time.show',$model->ti_id))
                        ->edit(route('reg.time.edit', $model->ti_id))
                        ->delete(route('reg.time.destroy', $model->ti_id))
                        ->get();
                }
            )
            ->showColumns($item)
            ->searchColumns(array('time','weekly'))
            ->orderColumns($item)
            ->make();
    }

}