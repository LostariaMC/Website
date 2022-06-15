<?php

namespace controllers;

use controllers\base\Web;

class Main extends Web
{
    function home()
    {
        $this->header();
        include("views/global/home.php");
        $this->footer();
    }

    function player()
    {
        if(!isset($_GET['name']) || strip_tags($_GET['name']) == ""){
            $this->redirect("./");
            return;
        }

        $player = strip_tags($_GET['name']);


        $this->header();
        include("views/global/player.php");
        $this->footer();
    }
}