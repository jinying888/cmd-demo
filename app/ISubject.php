<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/18
 * Time: 17:00
 */

namespace app;

interface ISubject
{
    function addObserver(Observer $ob);
    function notify($message = null);
}