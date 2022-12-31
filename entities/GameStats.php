<?php

namespace entities;

class GameStats {

    private $playerUuid;
    private $redisModel;

    private $games = [
        "sw" => "SheepWars",
        "pitchout" => "Pitchout",
        "rn" => "Runaway",
        "koth2" => "KOTH",
        "mlgrush" => "MLGRush",
        "tower" => "Tower",
        "ploufcraft" => "PloufCraft"
    ];

    private $sw = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "kills" => "Tués",
        "sheepLaunch" => "Moutons lancés",
        "sheepKilled" => "Moutons tués",
        "swBonusUsed" => "Laines activées"
    ];
    private $pitchout = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "ejections" => "Éjections",
        "lifesLost" => "Vies perdues"
    ];
    private $runaway = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "winsInfected" => "Victoires (Infecté)",
        "winsSick" => "Victoires (Malade)",
        "infections" => "Nombre de joueurs infectés",
        "timesInfected" => "Nombre de fois infecté",
        "timesSick" => "Nombre de fois malade",
        "transformations" => "Succombations",
        "bonusUsed" => "Bonus utilisés"
    ];
    private $koth = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "kills" => "Tués",
        "damages" => "Dégâts",
        "assists" => "Assistances",
        "kothCapture" => "Capture",
        "kothGolems" => "Golems tués"
    ];
    private $mlgrush = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "mlgrushPoints" => "Points marqués",
        "kills" => "Tués",
        "mlgrushBlockPlace" => "Blocs posés",
        "mlgrushBlockBreak" => "Blocs cassés",
        "mlgrushDefenses" => "Défense"
    ];
    private $tower = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "twPoints" => "Points marqués",
        "kills" => "Tués",
        "twDefenses" => "Défense"
    ];
    private $ploufcraft = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "plouf_items_crafted" => "Items craftés",
        "plouf_unique_items_crafted" => "Items uniques craftés",
    ];

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

            case "rn":
                return $this->runaway;

            case "koth2":
                return $this->koth;

            case "mlgrush":
                return $this->mlgrush;

            case "tower":
                return $this->tower;

            case "ploufcraft":
                return $this->ploufcraft;

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

    public function getSumTimePlayed(){
        $timePlayed = 0;
        foreach ($this->getGames() as $gameId => $gameName){
            $timePlayedGameClassic = $this->getStat($gameId, "classic", "timePlayed");
            if(!is_bool($timePlayedGameClassic)){
                $timePlayed += $timePlayedGameClassic;
            }
            $timePlayedGameHost = $this->getStat($gameId, "host", "timePlayed");
            if(!is_bool($timePlayedGameHost)){
                $timePlayed += $timePlayedGameHost;
            }
        }
        return $timePlayed;
    }

}