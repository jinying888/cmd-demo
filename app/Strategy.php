<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/19
 * Time: 14:14
 */

namespace app;


abstract class Strategy
{
    abstract protected function articles();
    abstract protected function filterSth($message);
}