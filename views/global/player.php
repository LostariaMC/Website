<div class="container">
    <div style="text-align: center; margin-left: 20%; margin-right: 20%;">
        <div class="alert alert-warning" role="alert">
            Cette page est en cours de développement !<br>
            En attendant, rejoins-nous sur notre <a href="http://discord.lostaria.fr" target="_blank" class="alert-link">Discord</a>
        </div>
    </div>
    <div class="card card-hover border-0">
        <div class="card-body d-flex">
            <div class="p-3">
                <img class="preview-image" src="<?= \utils\HeadUtils::getHeadLink($playerUuid) ?>/120" alt="<?= $playerName ?> avatar">
            </div>
            <div class="flex-grow-1" style="margin-left: 15px;">
                <?php
                $rank = $player->getRank();
                $color = "";

                if(substr($rank, 0, 7) === "Comète"){
                    $color = "mccolor-yellow";
                }
                if(substr($rank, 0, 9) === "Météore"){
                    $color = "mccolor-gold";
                }
                if(substr($rank, 0, 7) === "Étoile"){
                    $color = "mccolor-aqua";
                }
                if(substr($rank, 0, 6) === "Cosmos"){
                    $color = "mccolor-lightpurple";
                }

                $badges = $player->getBadges();
                $stylePlayerName = "";
                if(count($badges) > 0){
                    $stylePlayerName = "margin-bottom: 5px; margin-top: 5px;";
                }else{
                    $stylePlayerName = "margin-bottom: 5px; margin-top: 35px;";
                }
                echo '<h1 style="'. $stylePlayerName .'" class="pb-0 '. $color .'">'. $player->getRank() . ' ' . $playerName .'</h1>';

                echo '<span>Expérience </span><span class="badge text-bg-success">'. $player->getPoints() .' / '. $player->getMaxPoints() .'</span>';

                if(count($badges) > 0){
                    echo '<div style="margin-top: 5px;">
                    <hr style="height: 2px; margin-right: 60%; color: #606060; background-color: #606060; border: none;">';
                }

                foreach ($badges as $badge){
                    if($badge == "Responsable"){
                        echo '<span style="margin-right: 5px; margin-top: 5px;" class="badge rounded-pill text-bg-warning">Responsable ✰</span>';
                    }
                    if($badge == "Donateur"){
                        echo '<span style="margin-right: 5px; margin-top: 5px;" class="badge rounded-pill text-bg-danger text-light">Donateur ❤</span>';
                    }
                    if($badge == "Président"){
                        echo '<span style="margin-right: 5px; margin-top: 5px;" class="badge rounded-pill text-bg-info text-light">Président ✪</span>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div style="margin-top: 50px;" class="row">
        <div style="margin-top: 30px;" class="col-md-8">
            <h4 class="page-header">Statistiques</h4>
            <div class="row">
                <?php
                $gamesCards = "";
                foreach ($gameStats->getGames() as $gameId => $gameName){
                    $gamesCards = $gamesCards. '<div class="col-lg-4 col-md-6 col-sm-4 col-xs-12"><div class="card" style="width: 16rem; margin-bottom: 20px;"><div class="card-body">';
                    $gamesCards = $gamesCards. '<h5 class="card-title">'. $gameName .'</h5>';
                    if(!$gameStats->hasPlay($gameId) && !$gameStats->hasPlay($gameId, "host")){
                        $gamesCards = $gamesCards. '<p class="card-text">Aucune partie jouée</p>';
                    }else{
                        $gamesCards = $gamesCards. '<h6 class="card-subtitle mb-2 text-muted">Classic</h6>';
                        if(!$gameStats->hasPlay($gameId)){
                            $gamesCards = $gamesCards. '<p class="card-text">Aucune partie jouée</p>';
                        }else{
                            $stats = $gameStats->getStats($gameId);
                            $gamesCards = $gamesCards. '<p class="card-text">';
                            foreach ($stats as $statId => $statName){
                                $statValue = $gameStats->getStat($gameId, "classic", $statId);
                                //$gamesCards = $gamesCards. '<div class="row"><div class="col" style="font-size: 15px;">'. $statName .'</div><div class="col" style="text-align: right; font-size: 15px;"><span class="badge text-bg-success">'. $statValue .'</span></div></div>';
                                $gamesCards = $gamesCards. '<div>'. $statName .' <b style="float: right;"><span class="badge text-bg-success">'. $statValue .'</span></b></div>';
                            }
                            $gamesCards = $gamesCards. '</p>';
                        }
                        $gamesCards = $gamesCards. '<h6 class="card-subtitle mb-2 text-muted" style="margin-top: 30px;">Host</h6>';
                        if(!$gameStats->hasPlay($gameId, "host")){
                            $gamesCards = $gamesCards. '<p class="card-text">Aucune partie jouée</p>';
                        }else{
                            $stats = $gameStats->getStats($gameId);
                            $gamesCards = $gamesCards. '<p class="card-text">';
                            foreach ($stats as $statId => $statName){
                                $statValue = $gameStats->getStat($gameId, "host", $statId);
                                //$gamesCards = $gamesCards. '<div class="row"><div class="col" style="font-size: 15px;">'. $statName .'</div><div class="col" style="text-align: right; font-size: 15px;"><span class="badge text-bg-success">'. $statValue .'</span></div></div>';
                                $gamesCards = $gamesCards. '<div>'. $statName .' <b style="float: right;"><span class="badge text-bg-success">'. $statValue .'</span></b></div>';
                            }
                            $gamesCards = $gamesCards. '</p>';
                        }
                    }
                    $gamesCards = $gamesCards. '</div></div></div>';
                }
                echo $gamesCards;
                ?>
            </div>
        </div>
        <div style="margin-top: 30px;" class="col-md-4">
            <h4 class="page-header">Informations</h4>
            <div style="margin-left: 15px;">
                <?php
                date_default_timezone_set("Europe/Paris");
                $lastConnectionSeconds = $player->getLastConnection() / 1000;
                $lastConnectionTimeInput = date('Y-m-d\TH:i:s', $lastConnectionSeconds);
                $lastConnectionTime = new DateTime($lastConnectionTimeInput);
                $nowTimeInput = date('Y-m-d\TH:i:s');
                $nowTime = new DateTime($nowTimeInput);
                $lastConnectionDiff = $nowTime->diff($lastConnectionTime);
                $lastConnectionStr = "Il y a ";

                if($lastConnectionDiff->y == 0){
                    if($lastConnectionDiff->m == 0){
                        if($lastConnectionDiff->days == 0){
                            if($lastConnectionDiff->h == 0){
                                $lastConnectionStr = $lastConnectionStr. $lastConnectionDiff->i .' minute'. ($lastConnectionDiff->i > 1 ? "s" : "");
                            }else{
                                $lastConnectionStr = $lastConnectionStr. $lastConnectionDiff->h .' heure'. ($lastConnectionDiff->h > 1 ? "s" : "");
                            }
                        }else{
                            $lastConnectionStr = $lastConnectionStr. $lastConnectionDiff->days .' jour'. ($lastConnectionDiff->days > 1 ? "s" : "");
                        }
                    }else{
                        $lastConnectionStr = $lastConnectionStr. $lastConnectionDiff->m .' mois';
                    }
                }else{
                    $lastConnectionStr = $lastConnectionStr. $lastConnectionDiff->y .' an'. ($lastConnectionDiff->y > 1 ? "s" : "");
                }

                $firstConnectionSeconds = $player->getFirstConnection() / 1000;
                $firstConnectionStr = \utils\DateUtils::convertMillisToDateStr($firstConnectionSeconds);

                ?>
                <p><i class="uil uil-angle-right-b"></i> Dernière connexion <span class="badge text-bg-danger"><?= $lastConnectionStr; ?></span></p>
                <p><i class="uil uil-angle-right-b"></i> Inscription <span class="badge text-bg-info text-light"><?= $firstConnectionStr; ?></span></p>
                <p><i class="uil uil-angle-right-b"></i> Tickets <span class="badge text-bg-success"><?= $player->getTickets(); ?></span></p>
            </div>
        </div>
    </div>
</div>
<style>
    .mccolor-yellow{
        color: #ffc100;
    }
    .mccolor-gold{
        color: #e97420;
    }
    .mccolor-aqua{
        color: #27bfbf;
    }
    .mccolor-lightpurple{
        color: #FF55FF;
    }

    .page-header{
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

</style>