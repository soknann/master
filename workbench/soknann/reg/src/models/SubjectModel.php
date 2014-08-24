<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 7/13/14
 * Time: 11:16 AM
 */

namespace Soknann\Reg;

use Eloquent;

class SubjectModel  extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_subject';
    protected $primaryKey= 'sub_id';
    protected $timestamp = true;

}