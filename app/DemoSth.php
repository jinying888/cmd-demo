<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/16
 * Time: 9:13
 */

namespace app;

class DemoSth implements ISubject
{
    protected $config;
    protected $client;
    protected $client2;
    protected $observers;
    protected $message;
    protected $app;
    protected $strategy;
    protected $return;

    public function __construct($dm_cfg, $obj, $obj2)
    {
        $this->config = $dm_cfg;
        $this->client = $obj;
        $this->client2 = $obj2;

    }

    public function addObserver(Observer $ob)
    {
        $this->observers[] = $ob;
    }

    public function notify($message = null)
    {
        foreach ($this->observers as $ob)
        {
            $ob->update($message);
        }
    }

    public function setApp($app, Strategy $stg)
    {
        $this->app = $app;
        $this->strategy = $stg;
    }

    public function dosth()
    {
        $this->message = $this->strategy->articles();

        $this->mssage = $this->strategy->filterSth($this->message);

        $this->test();

    }


    public function test()
    {

    }


}