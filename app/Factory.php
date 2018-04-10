<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/16
 * Time: 9:29
 */

namespace app;

use db\MysqlPdo;


class Factory
{
    public static function createDmConfig()
    {
        $obj = new DemoConfig(dirname(__DIR__).DIRECTORY_SEPARATOR.'config');
        Demo::set('demo_config', $obj);
        return $obj;
    }

    public static function createObj()
    {
        $dm_cfg = Demo::get('demo_config');
        $app_key = $dm_cfg['params']['app_key'];
        $master_secret = $dm_cfg['params']['master_secret'];

        return $obj;
    }

    public static function createDmSth($obj, $obj2)
    {
        $dm_cfg = Demo::get('demo_config');
        $obj = new DemoSth($dm_cfg, $obj, $obj2);

        return $obj;

    }

    public static function createX()
    {

        $obj = new XStrategy();
        return $obj;

    }

    public static function createY()
    {

        $obj = new YStrategy();
        return $obj;

    }

    public static function createObPerist()
    {
        $obj = new ObserverPersist();
        return $obj;
    }



    /**
     * @param $dm_cfg
     * @param $dbname 就是db配置数组的key
     */
    public static function getDb($db_cfg_key)
    {
            $dm_cfg = Demo::get('demo_config');
            try{
                //$dm_cfg['db']正式，$dm_cfg['db-dev']测试
                if(ENV == 'prod'){
                    $db = MysqlPdo::getInstance($dm_cfg['db'][$db_cfg_key], $db_cfg_key);
                }else if(ENV == 'test'){
                    $db = MysqlPdo::getInstance($dm_cfg['db-dev'][$db_cfg_key], $db_cfg_key);
                }else{
                    throw new \Exception('huanjiang env error');
                }


                return $db;
            }catch(\Exception $ex){
                echo $ex->getMessage();
        }

    }
}