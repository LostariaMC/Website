<?php

namespace controllers;

use controllers\base\Web;
use entities\GameStats;
use entities\LostariaPlayer;
use models\RedisModel;
use utils\MojangUtils;

class Main extends Web {

    protected $redisModel;

    public function __construct(){
        $this->redisModel = new RedisModel();
    }

    function home() {
        $staffMembers = array(
            ["95fe8a20-67e6-4a09-96c5-e01ce73870a0", ["Développeur", "Constructeur"]], // Worsewarn
            ["b8220a38-99ce-4347-8af1-53cbf55667ff", ["Développeur", "Sys Admin"]], // Erpriex
            ["e272b935-1500-40a8-b79d-6f5844f1bc9d", ["Constructeur"]], // XEL0
            ["938e86bd-5d16-49d4-b26a-6775036d744e", ["Développeur", "Constructeur"]], // ElloWorld
            ["beb88774-a96c-4553-8379-c42c75395af7", ["Développeur"]], // lumin0u
            ["b2410d25-93d3-4045-a807-cdf3ebb4a323", ["Constructeur"]], // Lycheesis
        );

        $error = false;
        if(isset($_POST['error'])){
            $error = true;
        }

        $this->header();
        include("views/common/searchbar.php");
        include("views/global/home.php");
        $this->footer();
    }

    function player() {
        if(!isset($_GET['uuid']) || strip_tags($_GET['uuid']) == ""){
            $this->redirect("./");
            return;
        }

        $playerUuid = strip_tags($_GET['uuid']);

        $registered = $this->redisModel->keyExist("redisplayer:". $playerUuid);
        if(!$registered){
            $_POST['error'] = "Ce joueur ne s'est jamais connecté sur Lostaria, tu devrais l'inviter 😉";
            $this->home();
            return;
        }

        $playerName = MojangUtils::getName($playerUuid);

        $redisPlayer = $this->redisModel->getOne("redisplayer:". $playerUuid);
        $playerObj = json_decode($redisPlayer, true);
        $player = new LostariaPlayer($playerObj);

        $gameStats = new GameStats($playerUuid, $this->redisModel);

        $this->header("Profil de ". $playerName ." • Lostaria", $playerName);
        include("views/common/searchbar.php");
        include("views/global/player.php");
        $this->footer();
    }

    function search(){
        if(!isset($_GET['q']) || strip_tags($_GET['q']) == ""){
            $this->redirect("./");
            return;
        }
        $query = strip_tags($_GET['q']);

        $targetUuid = MojangUtils::getUuid($query);
        if($targetUuid == ""){
            $_POST['error'] = "Aucun compte Minecraft n'est associé à ce joueur";
            $this->home();
        }else{
            header('Location: ./player?uuid=' .MojangUtils::getDashesUuid($targetUuid));
        }

    }
}