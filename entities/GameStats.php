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
        "kills" => "Tués",
        "played" => "Parties jouées",
        "sheepKilled" => "Moutons tués",
        "sheepLaunch" => "Moutons lancés",
        "swBonusUsed" => "Laines activées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires"
    ];
    private $pitchout = [
        "ejections" => "Éjections",
        "lifesLost" => "Vies perdues",
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires"
    ];
    private $runaway = ["bonusUsed" => "Bonus utilisés",
        "infections" => "Nombre de joueurs infectés",
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "timesInfected" => "Nombre de fois infecté",
        "timesSick" => "Nombre de fois malade",
        "transformations" => "Succombations",
        "winsInfected" => "Victoires (Infecté)",
        "winsSick" => "Victoires (Malade)"
    ];
    private $koth = [
        "assists" => "Assistances",
        "damages" => "Dégâts",
        "kills" => "Tués",
        "kothCapture" => "Capture",
        "kothGolems" => "Golems tués",
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires"
    ];
    private $mlgrush = [
        "kills" => "Tués",
        "mlgrushBlockBreak" => "Blocs cassés",
        "mlgrushBlockPlace" => "Blocs posés",
        "mlgrushDefenses" => "Défense",
        "mlgrushPoints" => "Points marqués",
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires"
    ];
    private $tower = [
        "kills" => "Tués",
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "twDefenses" => "Défense",
        "twPoints" => "Points marqués",
        "win" => "Victoires"
    ];
    private $ploufcraft = [
        "played" => "Parties jouées",
        "plouf_items_crafted" => "Items craftés",
        "plouf_unique_items_crafted" => "Items uniques craftés",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires"
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

}