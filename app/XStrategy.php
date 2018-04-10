<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/19
 * Time: 14:19
 */

namespace app;


class XStrategy extends Strategy
{

    /**
     * @return mixed
     * 需要处理的文章
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

    }
}