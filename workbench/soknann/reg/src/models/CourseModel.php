<?php
/**
 * Created by PhpStorm.
 * User: SOKNANN
 * Date: 8/28/14
 * Time: 8:44 AM
 */

namespace Soknann\Reg;

use Eloquent;
class CourseModel extends Eloquent {

    protected $table = 'tbl_course';
    protected $primaryKey = 'cou_id';
    protected $timestamp= true;

} 