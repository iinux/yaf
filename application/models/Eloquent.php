<?php

/**
 * Created by PhpStorm.
 * User: nalux
 * Date: 2016/8/20
 * Time: 13:19
 */
class EloquentModel extends Illuminate\Database\Eloquent\Model
{
    public function say()
    {
        return 'say hello';
    }

}