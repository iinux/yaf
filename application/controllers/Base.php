<?php

/**
 * Created by PhpStorm.
 * User: nalux
 * Date: 2016/8/17
 * Time: 22:25
 */

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class BaseController extends Yaf_Controller_Abstract
{
    /** @var Smarty_Adapter  */
    protected $view = null;

    /** @var Logger */
    protected $log = null;
    
    protected function init()
    {
        $this->view = $this->getView();

        // create a log channel
        $this->log = new Logger('yaf');
        if (Yaf_Registry::get('config')->get('application.monolog')) {
            $this->log->pushHandler(new StreamHandler('application/logs/yaf.log', Logger::WARNING));
        }
    }
}