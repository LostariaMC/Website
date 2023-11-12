<?php

namespace entities;

class GameStats {

    private $playerUuid;
    private $redisModel;

    private $games = [
        "arrow" => "Arrow",
        "boom" => "Boom",
        "colorsplash" => "ColorSplash",
        "defense" => "Defense",
        "diecraft" => "Diecraft",
        "gravity" => "Gravity",
        "koth2" => "KOTH",
        "mlgrush" => "MLGRush",
        "moutron" => "Moutron",
        "pitchout" => "Pitchout",
        "ploufcraft" => "PloufCraft",
        "rn" => "Runaway",
        "sw" => "SheepWars",
        "spleef" => "Spleef",
        "survivor" => "Survivor",
        "teamfortress2" => "TeamFortress",
        "tower" => "Tower",
    ];

    private $arrow = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "arrow:lostLives" => "Vies perdues",
        "arrow:shotArrows" => "Flèches tirées",
        "arrow:arrowKills" => "Kills par flèche",
        "arrow:swordKills" => "Kills à l'épée",
        "arrow:bestStreak" => "Meilleure série"
    ];
    private $boom = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "boomNumberBombs" => "Nombre de fois bombe"
    ];
    private $colorsplash = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "kills" => "Tués",
        "cs_used_dye_nb" => "Teintures utilisées",
        "damages" => "Dégâts infligés",
        "cs_care" => "Vies soignées",
        "win" => "Victoires"
    ];
    private $defense = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "defenseCapture" => "Temps de capture",
        "kills" => "Tués",
        "deaths" => "Morts",
        "defenseRings" => "Anneaux activés",
        "defenseBells" => "Cloches activées"
    ];
    private $diecraft = [
        "timePlayed" => "Temps de jeu",
        "played" => "Survies lancées",
        "diecraftBestDifficulty" => "Meilleure difficulté",
        "diecraftBestScore" => "Meilleur score",
        "diecraftBestTime" => "Meilleur temps",
        "diecraftChunksDiscovered" => "Chunks découverts",
        "diecraftQuestsFinished" => "Quêtes terminées"
    ];
    private $gravity = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires"
    ];
    private $koth = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "kills" => "Tués",
        "assists" => "Assistances",
        "damages" => "Dégâts",
        "kothCapture" => "Capture",
        "kothGolems" => "Golems tués",
        "win" => "Victoires"
    ];
    private $mlgrush = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "kills" => "Tués",
        "mlgrushPoints" => "Points marqués",
        "mlgrushDefenses" => "Défense",
        "mlgrushBlockBreak" => "Blocs cassés",
        "mlgrushBlockPlace" => "Blocs posés"
    ];
    private $moutron = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "kills" => "Éliminations",
        "#bonusUsed" => "Bonus utilisés",
        "#playedmoutronFinale" => "Finales jouées",
        "#winmoutronFinale" => "Finales gagnées"
    ];
    private $pitchout = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "ejections" => "Éjections",
        "lifesLost" => "Vies perdues",
        "bonusUsed" => "Bonus utilisés"
    ];
    private $ploufcraft = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "plouf_items_crafted" => "Items craftés",
        "plouf_unique_items_crafted" => "Items uniques craftés"
    ];
    private $runaway = [
        "timePlayed" => "Temps de jeu",
        "transformations" => "Succombations",
        "played" => "Parties jouées",
        "timesInfected" => "Nombre de fois infecté",
        "timesSick" => "Nombre de fois malade",
        "infections" => "Nombre de joueurs infectés",
        "bonusUsed" => "Bonus utilisés",
        "winsSick" => "Victoires (Malade)",
        "winsInfected" => "Victoires (Infecté)"
    ];
    private $spleef = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "lastSurvivor" => "Survivant",
        "blocksBreak" => "Blocs cassés"
    ];
    private $survivor = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "kills" => "Zombies tués",
        "downfalls" => "Chutes au sol",
        "deaths" => "Morts"
    ];
    private $sw = [
        "timePlayed" => "Temps de jeu",
        "kills" => "Tués",
        "sheepKilled" => "Moutons tués",
        "played" => "Parties jouées",
        "sheepLaunch" => "Moutons lancés",
        "swBonusUsed" => "Laines activées",
        "win" => "Victoires"
    ];
    private $teamfortress = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "kills" => "Tués",
        "deaths" => "Morts",
        "damages" => "Dégâts",
        "flagCaptureCount" => "Captures de drapeaux",
        "pushTime" => "Temps de push",
        "captureTime" => "Temps de capture"
    ];
    private $tower = [
        "timePlayed" => "Temps de jeu",
        "played" => "Parties jouées",
        "win" => "Victoires",
        "kills" => "Tués",
        "twPoints" => "Points marqués",
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

            case "boom":
                return $this->boom;

            case "colorsplash":
                return $this->colorsplash;

            case "defense":
                return $this->defense;

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

            case "spleef":
                return $this->spleef;

            case "survivor":
                return $this->survivor;

            case "sw":
                return $this->sw;

            case "teamfortress2":
                return $this->teamfortress;

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