<?php
/**
 * Created by PhpStorm.
 * User: SOKNANN
 * Date: 8/28/14
 * Time: 8:44 AM
 */

namespace Soknann\Reg;

use Eloquent;
class CourseTypeModel extends Eloquent {

    protected $table = 'tbl_course_detail';
    protected $primaryKey = 'cou_de_id';
    protected $timestamp= true;

} 