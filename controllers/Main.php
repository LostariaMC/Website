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
            ["95fe8a20-67e6-4a09-96c5-e01ce73870a0", ["Owner", "Développeur"], "À l'origine du projet, Worsewarn continue de développer Lostaria et de le maintenir depuis plus de 4 ans. Il est le créateur de la grande majorité des mini-jeux."], // Worsewarn
            ["b8220a38-99ce-4347-8af1-53cbf55667ff", ["Développeur", "Sys Admin"], "Erpriex développe des fonctionnalités internes au serveur et s'occupe également de l'infrastructure. Il est au même titre à l'origine du développement du site de statistiques."], // Erpriex
            ["b2410d25-93d3-4045-a807-cdf3ebb4a323", ["Constructeur"], "Le build est le passe-temps favoris de Lycheesis. Il a construit un bon nombre de maps pour Lostaria, notamment en Pitchout, en Runaway, et en Gravity !"], // Lycheesis
            ["e272b935-1500-40a8-b79d-6f5844f1bc9d", ["Constructeur"], "D'une passion incontestable pour les maths, XEL0 réunit théorèmes et manuels pour construire les maps de vos rêves ! Il est notamment à l'origine de la réalisation du hub."], // XEL0
            ["938e86bd-5d16-49d4-b26a-6775036d744e", ["Développeuse"], "Convaincue que le hub soit un véritable terrain de jeux, ElloWorld est à l'origine du développement de la discothèque, de la pêche, et du dé à coudre."], // ElloWorld
            ["beb88774-a96c-4553-8379-c42c75395af7", ["Développeur"], "lumin0u intervient sur le développement de Lostaria depuis 2 ans. Il a notamment développé quelques jeux, comme le Arrow et le PloufCraft !"], // lumin0u
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
        if(!isset($_GET['q']) || strip_tags($_GET['q']) == ""){
            $this->redirect("./");
            return;
        }

        $playerName = strip_tags($_GET['q']);
        $playerUuid = MojangUtils::getUuid($playerName);
        if($playerUuid == ""){
            $_POST['error'] = "Aucun compte Minecraft n'est associé à ce joueur";
            $this->home();
            return;
        }
        $playerUuid = MojangUtils::getDashesUuid($playerUuid);

        $registered = $this->redisModel->keyExist("redisplayer:". $playerUuid);
        if(!$registered){
            $_POST['error'] = "Ce joueur ne s'est jamais connecté sur Lostaria, tu devrais l'inviter 😉";
            $this->home();
            return;
        }

        $redisPlayer = $this->redisModel->getOne("redisplayer:". $playerUuid);
        $playerObj = json_decode($redisPlayer, true);
        $player = new LostariaPlayer($playerObj);

        $gameStats = new GameStats($playerUuid, $this->redisModel);

        $this->header("Profil de ". $playerName ." • Lostaria", $playerName);
        include("views/common/searchbar.php");
        include("views/global/player.php");
        $this->footer();
    }

    function legal(){
        $this->header();
        include("views/common/legal.php");
    }
}