<?php

namespace entities;

class LostariaPlayer {

    private $redisPlayer;
    private $lostariaRank;

    public function __construct($redisPlayer) {
        $this->redisPlayer = $redisPlayer;
        $this->lostariaRank = new LostariaRank();
    }

    public function getPoints(){
        return $this->redisPlayer['points'];
    }

    public function getRank(){
        return $this->lostariaRank->getFromPoints($this->getPoints());
    }

    public function getTickets(){
        return $this->redisPlayer['tickets'];
    }

    public function getBadges(){
        return $this->redisPlayer['badges'][1];
    }

}