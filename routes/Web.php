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
        Route::Add('/search', [$main, 'search']);
        Route::Add('/legal', [$main, 'legal']);
    }
}

