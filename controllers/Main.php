<?php

namespace controllers;

use controllers\base\Web;
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
            ["b8220a38-99ce-4347-8af1-53cbf55667ff", ["Développeur", "SysAdmin"]], // Erpriex
            ["938e86bd-5d16-49d4-b26a-6775036d744e", ["Développeur", "Constructeur"]], // ElloWorld
            ["beb88774-a96c-4553-8379-c42c75395af7", ["Développeur"]], // lumin0u
            ["e272b935-1500-40a8-b79d-6f5844f1bc9d", ["Constructeur"]], // XEL0
            ["b2410d25-93d3-4045-a807-cdf3ebb4a323", ["Constructeur", "Game Designer"]], // Lycheesis
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

        $this->header();
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
            $_POST['error'] = "Le joueur spécifié n'a pas été trouvé";
            $this->home();
        }else{
            header('Location: ./player?uuid=' .MojangUtils::getDashesUuid($targetUuid));
        }

    }
}