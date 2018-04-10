<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/18
 * Time: 17:08
 */
namespace app;

interface IObserver
{
    function update($message);
}