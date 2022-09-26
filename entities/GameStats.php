<?php

namespace entities;

class GameStats {

    private $playerUuid;
    private $redisModel;

    private $games = ["sw" => "SheepWars", "pitchout" => "Pitchout"];

    private $sw = ["kills" => "Tués", "played" => "Parties jouées", "sheepKilled" => "Moutons tués", "sheepLaunch" => "Moutons lancés", "swBonusUsed" => "Laines activées", "timePlayed" => "Temps de jeu", "win" => "Victoires"];
    private $pitchout = ["ejections" => "Éjections", "lifesLost" => "Vies perdues", "played" => "Parties jouées", "timePlayed" => "Temps de jeu"];

    public function __construct($playerUuid, $redisModel) {
        $this->playerUuid = $playerUuid;
        $this->redisModel = $redisModel;
    }

    public function getGames(){
        return $this->games;
    }

    public function getStats($gameId){
        switch($gameId){
            case "sw":
                return $this->sw;

            case "pitchout":
                return $this->pitchout;

            default:
                return null;
        }
    }

    public function hasPlay($gameId, $mode = "classic"){
        $gameStatsKey = $this->redisModel->keyExist("games.statistics.". $this->playerUuid .".". $gameId .".". $mode .".played");
        return $gameStatsKey;
    }

    public function getStat($gameId, $mode = "classic", $stat){
        return $this->redisModel->getOne("games.statistics.". $this->playerUuid .".". $gameId .".". $mode .".". $stat);
    }

}