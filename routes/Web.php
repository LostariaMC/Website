<?php

namespace routes;

use controllers\Account;
use controllers\Main;
use controllers\VideoWeb;
use routes\base\Route;
use utils\SessionHelpers;

class Web
{
    function __construct()
    {
        $main = new Main();

        Route::Add('/', [$main, 'home']);
        Route::Add('/player', [$main, 'player']);
        Route::Add('/legal', [$main, 'legal']);
        Route::Add('/survival', [$main, 'survival']);
    }
}

