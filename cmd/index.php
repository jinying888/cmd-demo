<?php
/*
 * 注意:数据库配置文件切换在Factory::getDb()
 *  不用运行这个程序，在测试机，安卓不管false还是true都是正式环境
 */

define('ENV', 'test');
//define('ENV', 'prod');


require "init.php";

use app\Factory;

$dm_cfg = Factory::createDmConfig();

$obj = Factory::createObj();
$obj2 = Factory::createObj();

$sth = Factory::createDmSth($obj,$obj2);


$push->addObserver(Factory::createObPerist());


if($ts_type == 'x'){
    $x = Factory::createX();
    $gx_push->setApp('x', $x);
}elseif($ts_type == 'y'){
    $y = Factory::createY();
    $gx_push->setApp('y', $y);
}

$sth->dosth();



