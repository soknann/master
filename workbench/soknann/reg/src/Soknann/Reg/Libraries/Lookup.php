<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 6/24/14
 * Time: 9:08 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Soknann\Reg\Libraries;


use Soknann\Reg\CourseTypeModel;
use Soknann\Reg\GroupModel;
use Soknann\Reg\LabModel;
use Soknann\Reg\SubjectModel;
use Soknann\Reg\TeacherModel;
use Soknann\Reg\TimeModel;

class Lookup {
    public function getUserActiveList(){
        return array('1'=>'Yes','0'=>'No');
    }

    public function getGroupList(){
        return GroupModel::lists('name','id');
    }

    public function getStudentGender(){
        return array('male'=>'Male', 'female'=>'Female');
    }

    public function getWeekly(){
        return array('M-F'=>'M-F', 'Weekend'=>'Weekend');
    }

    public function getStudentList(){
        $stList = \DB::select('select * from tbl_students');
        foreach ($stList as $row){
            $data[$row->st_id] = $row->kh_fname.' '. $row->kh_lname;
        }
        return $data;
    }

    public function getTeacherList(){
        $teaList = \DB::select('select * from tbl_teacher');
        foreach ($teaList as $row){
            $data[$row->tea_id] = $row->tea_kh_fname.' '. $row->tea_kh_lname;
        }
        return $data;
    }

    public function getTime(){
        $timeList = \DB::select('select * from tbl_time');
        foreach ($timeList as $row){
            $data[$row->ti_id] = $row->time.' For '. $row->weekly;
        }
        return $data;
    }


    public function getSubjectList(){
        /*$subList = \DB::select('select * from tbl_subject');
        foreach ($subList as $row){
            $data[$row->sub_id] = $row->sub_name;
        }
        return $data;*/
        return SubjectModel::lists('sub_name','sub_id');
    }

    public function getCourseType(){
        return CourseTypeModel::lists('cou_de_name','cou_de_id');
    }

    public function getLab(){
        return LabModel::lists('lab_name', 'lab_id');
    }

    public function getSub($code){
        {
            $tmp='';
            $d = SubjectModel::where('sub_id', '=', $code)->limit(1)->get();
            foreach ($d as $key=>$row) {
                $tmp = $row->sub_name;
            }
            return $tmp;
        }
    }

    public function getCou($code){
        {
            $tmp='';
            $d = CourseTypeModel::where('cou_de_id', '=', $code)->limit(1)->get();
            foreach ($d as $key=>$row) {
                $tmp = $row->cou_de_name;
            }
            return $tmp;
        }
    }
}