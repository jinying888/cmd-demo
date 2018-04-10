<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/18
 * Time: 17:11
 */

namespace app;


class Observer implements IObserver
{
    public function update($message)
    {
        echo 'i like';

    }
}