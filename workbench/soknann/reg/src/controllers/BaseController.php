<?php namespace Soknann\Reg;
/**
 * Created by JetBrains PhpStorm.
 * User: Asus
 * Date: 6/21/14
 * Time: 5:05 PM
 * To change this template use File | Settings | File Templates.
 */
use Controller;

class BaseController extends Controller {
    public function renderLayout($view){
        $this->layout = $view;
        $this->layout->title = 'Master Center';
        $this->layout->footer = '&copy;  MPP Group Thesis &nbsp;2014 &nbsp;';
        $this->layout->logo = 'Master Information Technology Center';
        $this->layout->mslogo = url('packages/soknann/reg/bs-admin/img/Master.png');
        $this->layout->shicon = url('packages/soknann/reg/bs-admin/img/shicon.png');
    }
}