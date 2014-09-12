<?php
/**
 * Created by PhpStorm.
 * User: SOKNANN
 * Date: 8/28/14
 * Time: 8:44 AM
 */

namespace Soknann\Reg;

use Eloquent;
class HomeModel extends Eloquent {

    protected $table = 'tbl_reg';
    protected $primaryKey = 'reg_id';
    protected $timestamp= true;

} 