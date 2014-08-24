<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 6/22/14
 * Time: 3:53 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Soknann\Reg;

use Soknann\Reg\BaseController;
use Chumper\Datatable\Datatable;
use Soknann\Reg\Validators\UserValidator;
use Redirect;
use View;
use Input;

class UserController extends BaseController{
    public function index()
    {
        $item = array(
            'Action',
            'ID',
            'Username',
            'Group',
            'Expire Day',
            'Activated',
        );
//        $data['btnAction'] = array('Add New' => route('cpanel.user.create'));
        $tb = new Datatable();
        $data['table'] = $tb->table()
            ->addColumn($item) // these are the column headings to be shown
            ->setUrl(route('api.user')) // this is the route where data will be retrieved
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
            \View::make('soknann/reg::users.index', $data)
        );
    }

    public function add(){
        return $this->renderLayout(
            \View::make('soknann/reg::users.add')
        );
    }

    public function store()
    {
        $validator = UserValidator::make();
        if ($validator->passes()) {

            $inputs = $validator->inputs();

            $data = new UserModel();
            $this->saveData($data, $inputs);

            return Redirect::back()
                ->with('success', "Save Successful");

        }
        return \Redirect::back()->withInput()->withErrors($validator->errors());
    }

    public function edit($id){
        $data['row'] = UserModel::findOrFail($id);
        return $this->renderLayout(
            \View::make('soknann/reg::users.edit',$data)
        );
    }

    public function update($id)
    {
        try {
            $validator = UserValidator::make();
            if ($validator->passes()) {

                $inputs = $validator->inputs();

                $data = UserModel::findOrFail($id);
                $this->saveData($data, $inputs);

                return Redirect::back()
                    ->with('success', "Update Successful");
            }
            return Redirect::back()->withInput()->withErrors($validator->errors());
        } catch (\Exception $e) {
            return Redirect::route('reg.user.index')->with('error', "Errors ");
        }
    }

    public function destroy($id)
    {
        try {
            $currentUser = \Auth::user()->id;
            if ($currentUser == $id) {
                return Redirect::back()
                    ->with('error', trans('soknann/reg::user.delete_denied'));
            }
            $data = UserModel::findOrFail($id);
            $data->delete();
            return Redirect::back()->with('success', trans('soknann/reg::user.delete_success'));
        } catch (\Exception $e) {
            return Redirect::route('reg.user.index')->with('error', trans('soknann/reg::db_error.fail'));
        }
    }
    private function saveData($data, $inputs)
    {
        $passHash = \Hash::make($inputs['password']);

        $data->first_name = $inputs['first_name'];
        $data->last_name = $inputs['last_name'];
        $data->email = $inputs['email'];
        $data->username = $inputs['username'];
        $data->password = $passHash;
        $data->password_his_arr = json_encode(array($passHash));
        $data->expire_day = $inputs['expire_day'];
        $data->activated = $inputs['activated'];
        $data->activated_at = $inputs['activated_at'];
        $data->group_id = json_encode($inputs['group']);
//        $data->remember_token = '';
        $data->save();
    }

    public function getDatatable()
    {
        $item = array(
            'id',
            /*'first_name',
            'last_name',
            'email',*/
            'username',
            'group_id',
            'expire_day',
            'activated',
            /*'activated_at'*/
        );
            $arr = \DB::table('tbl_user')->orderBy('id');

        return \Datatable::query($arr)
            ->addColumn(
                'action',
                function ($model) {
                    return \Action::make()
                        ->edit(route('reg.user.edit', $model->id))
                        ->delete(route('reg.user.destroy', $model->id))
                        ->get();
                }
            )
            ->showColumns($item)
            ->searchColumns(array('id', 'username'))
            ->orderColumns($item)
            ->make();
    }

}