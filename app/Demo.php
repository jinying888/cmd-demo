<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/16
 * Time: 9:10
 */

namespace app;


class Demo
{
    protected static $object;
    public static function set($key,$obj)
    {
        static::$object[$key] = $obj;
    }
    public static function tounset($key)
    {
        unset(static::$object[$key]);
    }

    public static function get($key)
    {
        return static::$object[$key];
    }


}