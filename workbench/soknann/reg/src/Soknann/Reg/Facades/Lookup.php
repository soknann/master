<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 6/24/14
 * Time: 9:21 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Soknann\Reg\Facades;


use Illuminate\Support\Facades\Facade;

class Lookup extends Facade{
    protected static function getFacadeAccessor() { return 'lookup'; }
}