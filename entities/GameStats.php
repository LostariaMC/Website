<?php

namespace entities;

class GameStats {

    private $playerUuid;
    private $redisModel;

    private $games = [
        "koth2" => "KOTH",
        "colorsplash" => "ColorSplash",
        "gravity" => "Gravity",
        "moutron" => "Moutron",
        "mlgrush" => "MLGRush",
        "pitchout" => "Pitchout",
        "rn" => "Runaway",
        "sw" => "SheepWars",
        "ploufcraft" => "PloufCraft",
        "tower" => "Tower",
        "diecraft" => "Diecraft",
        "arrow" => "Arrow"
    ];

    private $arrow = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "arrow:lostLives" => "Vies perdues",
        "arrow:shotArrows" => "Flèches tirées",
        "arrow:arrowKills" => "Kills par flèche",
        "arrow:swordKills" => "Kills à l'épée",
        "arrow:bestStreak" => "Meilleure série"
    ];
    private $colorsplash = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "kills" => "Tués",
        "damages" => "Dégâts",
        "cs_used_dye_nb" => "Teintures utilisées",
        "cs_care" => "Vies soignées"
    ];
    private $diecraft = [
        "played" => "Survies lancées",
        "timePlayed" => "Temps de jeu",
        "diecraftBestDifficulty" => "Meilleure difficulté",
        "diecraftBestScore" => "Meilleur score",
        "diecraftBestTime" => "Meilleur temps",
        "diecraftChunksDiscovered" => "Chunks découverts",
        "diecraftQuestsFinished" => "Quêtes terminées"
    ];
    private $gravity = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires"
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
    private $moutron = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "kills" => "Éliminations",
        "#bonusUsed" => "Bonus utilisés",
        "#playedmoutronFinale" => "Finales jouées",
        "#winmoutronFinale" => "Finales gagnées"
    ];
    private $pitchout = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "ejections" => "Éjections",
        "lifesLost" => "Vies perdues"
    ];
    private $ploufcraft = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "plouf_items_crafted" => "Items craftés",
        "plouf_unique_items_crafted" => "Items uniques craftés"
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
    private $sw = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "kills" => "Tués",
        "sheepLaunch" => "Moutons lancés",
        "sheepKilled" => "Moutons tués",
        "swBonusUsed" => "Laines activées"
    ];
    private $tower = [
        "played" => "Parties jouées",
        "timePlayed" => "Temps de jeu",
        "win" => "Victoires",
        "twPoints" => "Points marqués",
        "kills" => "Tués",
        "twDefenses" => "Défense"
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
            case "arrow":
                return $this->arrow;

            case "colorsplash":
                return $this->colorsplash;

            case "diecraft":
                return $this->diecraft;

            case "gravity":
                return $this->gravity;

            case "koth2":
                return $this->koth;

            case "mlgrush":
                return $this->mlgrush;

            case "moutron":
                return $this->moutron;

            case "pitchout":
                return $this->pitchout;

            case "ploufcraft":
                return $this->ploufcraft;

            case "rn":
                return $this->runaway;

            case "sw":
                return $this->sw;

            case "tower":
                return $this->tower;

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