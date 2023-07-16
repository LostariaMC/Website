<?php

namespace entities;

class LostariaPlayer {

    private $redisPlayer;
    private $lostariaRank;

    public function __construct($redisPlayer) {
        $this->redisPlayer = $redisPlayer;
        $this->lostariaRank = new LostariaRank();
    }

    public function getName(){
        return $this->redisPlayer['name'];
    }

    public function getPoints(){
        return $this->redisPlayer['points'];
    }

    public function getMaxPoints(){
        $nextRank = $this->lostariaRank->getNextRank($this->getRank());
        if($nextRank == "~"){
            return 10000;
        }
        return $this->lostariaRank->ranks[$nextRank];
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

    public function getLastConnection(){
        return $this->redisPlayer['lastConnection'];
    }

    public function getFirstConnection(){
        return $this->redisPlayer['firstConnection'];
    }

    public function isConnected(){
        return $this->redisPlayer['connected'];
    }

    public function getExperienceHistoric(){
        $expHistoric = $this->redisPlayer['experienceHistoric'];
        return $expHistoric;
    }

}