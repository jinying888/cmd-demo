<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/16
 * Time: 9:11
 */

namespace app;


class DemoConfig implements \ArrayAccess
{
    protected $path;
    protected $configs = array();

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function offsetGet($offset)
    {

        if(empty($this->configs[$offset])){
            $file_path = $this->path . DIRECTORY_SEPARATOR . $offset . '.php';
            $config = require $file_path;
            $this->configs[$offset] = $config;

        }
        return $this->configs[$offset];
    }

    public function offsetExists($offset)
    {
        throw new \Exception('this is not to be use');
    }

    public function offsetUnset($offset)
    {
        throw new \Exception('this is not to be use');
    }

    public function offsetSet($offset, $val)
    {
        throw new \Exception('this is not to be use');
    }
}