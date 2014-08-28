<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 8/24/14
 * Time: 9:35 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Soknann\Reg;

use Eloquent;
class TimeModel extends Eloquent  {

    protected $table = 'tbl_time';
    protected $primaryKey = 'ti_id';
    protected $timestamp = true;

}