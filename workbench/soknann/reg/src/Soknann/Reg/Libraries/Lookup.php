<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 6/24/14
 * Time: 9:08 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Soknann\Reg\Libraries;


use Soknann\Reg\GroupModel;

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
        return array('M-F'=>'M-F', 'Weekly'=>'Weekly');
    }

    public function getStudentList(){
        $stList = \DB::select('select * from tbl_students');
        foreach ($stList as $row){
            $data[$row->st_id] = $row->kh_fname.' '. $row->kh_lname;
        }
        return $data;
    }

    public function getSubjectList(){
        $subList = \DB::select('select * from tbl_subject');
        foreach ($subList as $row){
            $data[$row->sub_id] = $row->sub_name;
        }
        return $data;
    }
}