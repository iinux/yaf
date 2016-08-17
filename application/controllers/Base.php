<?php

/**
 * Created by PhpStorm.
 * User: nalux
 * Date: 2016/8/17
 * Time: 22:25
 */
class BaseController extends Yaf_Controller_Abstract
{
    /** @var Smarty_Adapter  */
    protected $view = null;
    
    protected function init()
    {
        $this->view = $this->getView();
    }
}