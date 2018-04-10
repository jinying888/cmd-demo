<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/18
 * Time: 17:11
 */

namespace app;


class ObserverPersist extends Observer
{
    public function update($message)
    {

        $db = Factory::getDb('db-demo');


    }
}