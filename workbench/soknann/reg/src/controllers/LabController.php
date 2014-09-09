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
use Soknann\Reg\Validators\LabValidator;
use Soknann\Reg\Validators\StudentValidator;
use Soknann\Reg\Validators\SubjectValidator;
use Soknann\Reg\Validators\TeacherValidator;
use Soknann\Reg\Validators\UserValidator;
use Redirect;
use View;
use Input;

class LabController extends BaseController
{

    public function index()
    {
        $item = array(
            'Action',
            'ID',
            'Lab Name',
            'Note',
        );
//        $data['btnAction'] = array('Add New' => route('cpanel.user.create'));
        $tb = new Datatable();
        $data['table'] = $tb->table()
            ->addColumn($item) // these are the column headings to be shown
            ->setUrl(route('api.lab')) // this is the route where data will be retrieved
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
            \View::make('soknann/reg::lab.index', $data)
        );
    }

    public function add()
    {
        return $this->renderLayout(
            \View::make('soknann/reg::lab.add')
        );
    }

    public function store()
    {
        $validator = LabValidator::make();
        if ($validator->passes()) {
            $data = new LabModel();
            $this->saveData($data);

            return Redirect::back()
                ->with('success', "Save Successful");
        }
        return \Redirect::back()->withInput()->withErrors($validator->errors());
    }

    public function edit($id)
    {
        $data['row'] = LabModel::where('lab_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::lab.edit', $data)
        );
    }

    public function show($id)
    {
        $data['row'] = LabModel::where('lab_id', '=' ,$id)->first();
        return $this->renderLayout(
            \View::make('soknann/reg::lab.show', $data)
        );
    }

    public function update($id)
    {
        try {
           $validator = LabValidator::make();
           if ($validator->passes()) {

                $data = LabModel::where('lab_id', '=' ,$id)->first();
                $this->saveData($data,false);

                return Redirect::route('reg.lab.index')
                    ->with('success', "Update Successful");
           }
            return Redirect::back()->withInput()->withErrors($validator->errors());
        } catch (\Exception $e) {
            return Redirect::route('reg.lab.index')->with('error', "Errors ");
        }
    }

    public function destroy($id)
    {
        try {
            $data = LabModel::where('lab_id', '=', $id)->first();
            $data->delete();
            return Redirect::back()->with('success', trans('soknann/reg::lab.delete_success'));
        } catch (\Exception $e) {
            return Redirect::route('reg.subject.index')->with('error', trans('soknann/reg::db_error.fail'));
        }
    }

    private function saveData($data,$store=true)
    {
        if ($store){
            $data->lab_id = Input::get('lab_id');
        }
        $data->lab_name = Input::get('lab');
        $data->lab_memo = Input::get('memo');
//        $data->remember_token = '';
        $data->save();
    }

    public function getDatatable()
    {
        $item = array(
            'lab_id',
            'lab_name',
            'lab_memo',
        );
        $arr = \DB::table('tbl_lab')->orderBy('lab_id');

        return \Datatable::query($arr)
           ->addColumn(
                'action',
                function ($model) {
                    return \Action::make()
                        ->show(route('reg.lab.show',$model->lab_id))
                        ->edit(route('reg.lab.edit', $model->lab_id))
                        ->delete(route('reg.lab.destroy', $model->lab_id))
                        ->get();
                }
            )
            ->showColumns($item)
            ->searchColumns(array('lab_id','lab_memo'))
            ->orderColumns($item)
            ->make();
    }

}