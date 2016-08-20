<?php

/**
 * Created by PhpStorm.
 * User: nalux
 * Date: 2016/8/20
 * Time: 13:25
 */
class UserModel extends EloquentModel
{
    // 软删除
    //use SoftDeletes;

    // 表名
    public $table = 'user';

    // 此字段自动转换成 Carbon 实例
    protected $dates = ['deleted_at'];

    // 允许批量赋值的字段
    protected $fillable = ['name', 'password', 'email'];
}