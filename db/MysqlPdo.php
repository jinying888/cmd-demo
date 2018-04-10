<?php
/**
 * Created by PhpStorm.
 * User: wanghe
 * Date: 2017/10/16
 * Time: 10:32
 */

namespace db;


class MysqlPdo
{
    protected $dbh = null;
    protected static $instance = null;

    //建立数据库连接
    protected function __construct($param)
    {

        try {
            $dbname = $param['dbname'];
            $host =$param['host'];
            $user = $param['user'];
            $port = $param['port'];
            $pw = $param['password'];
            $this->dbh = new \PDO("mysql:dbname=$dbname;host=$host;port=$port", $user, $pw);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            $this->dbh->exec("set names utf8mb4");

        } catch (\PDOException $e) {
            $arr = [ 'errno'=>'2','errmsg'=>'连接失败: ' . $e->getMessage()];
            echo json_encode($arr);

        }
    }

    protected function __clone(){}

    public static function getInstance($param, $key)
    {

        if ( empty(static::$instance[$key])) {
            static::$instance[$key] = new static($param);
        }
        return static::$instance[$key];

    }

    public function exec($sql)
    {
        return $this->dbh->exec($sql);
    }

    public function query($sql)
    {
        return $this->dbh->query($sql);
    }

    public function prepare($sql)
    {
        return $this->dbh->prepare($sql);
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    /**
     * beginTransaction 事务开始
     */
    public function beginTransaction()
    {
        //关闭自动提交
        $this->dbh->setAttribute(\PDO::ATTR_AUTOCOMMIT,0);
        $this->dbh->exec("SET TRANSACTION ISOLATION LEVEL REPEATABLE READ");
        $this->dbh->beginTransaction();

    }

    /**
     * commit 事务提交
     */
    public function commit()
    {
        $this->dbh->commit();
        //事务结束后，关闭自动提交
        $this->dbh->setAttribute(\PDO::ATTR_AUTOCOMMIT,1);
    }

    /**
     * rollback 事务回滚
     */
    public function rollback()
    {
        $this->dbh->rollback();
        //事务结束后，关闭自动提交
        $this->dbh->setAttribute(\PDO::ATTR_AUTOCOMMIT,1);
    }

    /**
     * close the database connection
     */
    public function __destruct()
    {
        // close the database connection
        $this->dbh = null;
    }

}