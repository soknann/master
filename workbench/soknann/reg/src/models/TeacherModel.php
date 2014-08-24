<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/13/14
 * Time: 11:16 AM
 */

namespace Soknann\Reg;


use Eloquent;

class TeacherModel  extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_teacher';
    protected $primaryKey= 'tea_id';
    protected $timestamp = true;

}