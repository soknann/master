<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 6/22/14
 * Time: 10:30 AM
 * To change this template use File | Settings | File Templates.
 */

namespace Soknann\Reg;


use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent;

class UserModel extends Eloquent implements UserInterface,RemindableInterface{
    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tbl_user';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'remember_token');

}