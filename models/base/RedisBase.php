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
        // TODO: Implement getOne() method.
    }
}