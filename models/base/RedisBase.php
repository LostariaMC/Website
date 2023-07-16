<?php

namespace models\base;

class RedisBase implements IDatabase
{

    /**
     * @var $redis
     */
    protected $redis;

    function __construct()
    {
        $this->redis = Database::connect();
    }


    public function getOne($key)
    {
        $response = $this->redis->get($key);
        return $response;
    }

    public function keyExist($key)
    {
        $response = $this->redis->exists($key);
        return $response;
    }

    public function getKeysWithPattern($pattern){
        $response = $this->redis->keys($pattern);
        return $response;
    }
}