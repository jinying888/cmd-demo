<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/19
 * Time: 14:19
 */

namespace app;


class YStrategy extends Strategy
{

    /**
     * @return mixed
     * 需要推送的文章
     */
    public function articles()
    {
        $db_demo = Factory::getDb('db-news');

    }

    /**
     * @param $message
     * @return array
     * 过滤了重复的文章
     */
    public function filterSth($message)
    {
        $db_demo = Factory::getDb('db-demo');

        foreach($message as $key=>&$val) {
            if($val['id'] > 100) {
                unset($message[$key]);
            }
        }
        unset($val);
        return $message;
    }

}