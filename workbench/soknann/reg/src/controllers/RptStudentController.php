<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 8/23/14
 * Time: 3:03 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Soknann\Reg;


use Illuminate\View\View;
use Soknann\Reg\Libraries\Report;

class RptStudentController extends BaseController {

    public function index()
    {
        return $this->renderLayout(
            \View::make('soknann/reg::rpt_student.index')
        );
    }

    public function report()
    {
        $data['from'] = \Input::get('from');
        $data['to'] = \Input::get('to');
        $condition = ' where 1 = 1';
            $condition.= " and dob between STR_TO_DATE('".$data['from']." " . " 00:00:00" . "','%Y-%m-%d %H:%i:%s')
            and STR_TO_DATE('".$data['to']." " . " 00:00:00" . "','%Y-%m-%d %H:%i:%s')";
        $data['result'] = \DB::select('select * from tbl_students'. $condition);
        $report = new Report();
        return $report->make('rpt_student/rptstudent', $data);
    }


}