<?php

header("content-type=text/html;charset=utf-8");

unset ( $_SERVER["argv"][0] );

$args = array();
foreach ( $_SERVER["argv"] as $arg )
    $args[] = $arg;

if(empty($args['0'])){
    echo '参数不能为空！xsb或caijing';exit;
}else{
    $ts_type = $args['0'];
}



require __DIR__ . '/../autoload.php';
require __DIR__ . '/../vendor/autoload.php';
