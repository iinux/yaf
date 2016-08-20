<?php
/**
 * Created by PhpStorm.
 * User: nalux
 * Date: 2016/8/20
 * Time: 18:12
 */

namespace App\Services;


class Service
{
    protected static $self = null;

    private function __construct()
    {
    }
    
    public static function getInstance()
    {
        if (empty(static::$self)) {
            return static::$self = new static();
        }
        return static::$self;
    }
}