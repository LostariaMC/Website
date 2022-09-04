<?php

namespace entities;

class LostariaRank{

    public $ranks = ['Comète I' => 0, 'Comète II' => 100, 'Comète III' => 500, 'Météore I' => 1000, 'Météore II' => 1400, 'Météore III' => 2000, 'Étoile I' => 2800, 'Étoile II' => 3600, 'Étoile III' => 5000, 'Cosmos I' => 6200, 'Cosmos II' => 7500, 'Cosmos III' => 8600];

    public function getFromPoints($points){
        $rankBefore = "Cosmos III";
        foreach($this->ranks as $rank => $minPoints){
            if($minPoints <= $points){
                $rankBefore = $rank;
            }
        }
        return $rankBefore;
    }

    public function getNextRank($rank){
        $nextRank = "~";
        $finded = false;
        foreach ($this->ranks as $rankName => $points){
            if($finded){
                $finded = false;
                $nextRank = $rankName;
            }
            if($rank === $rankName){
                $finded = true;
            }
        }
        return $nextRank;
    }

}