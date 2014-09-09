<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 9/9/14
 * Time: 11:46 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Soknann\Reg;
use Eloquent;


class LabModel extends Eloquent {

    protected $table = 'tbl_lab';
    protected $primaryKey = 'lab_id';
    protected $timestamp = true;

}