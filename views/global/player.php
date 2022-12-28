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
                        echo '<span style="margin-right: 5px; margin-top: 5px;" class="badge rounded-pill text-bg-warning">Administrateur ✰</span>';
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
    <div style="margin-top: 50px; flex-wrap: wrap-reverse;" class="row">
        <div style="margin-top: 30px;" class="col-md-8">
            <h4 class="page-header">Statistiques</h4>
            <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
                <?php foreach ($gameStats->getGames() as $gameId => $gameName): ?>
                    <div class="card col-lg-4 col-md-6 col-sm-4 col-xs-12" style="width: 17rem; margin-right: 10px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $gameName ?></h5>
                            <?php if(!$gameStats->hasPlay($gameId) && !$gameStats->hasPlay($gameId, "host")): ?>
                                <p class="card-text">Aucune partie jouée</p>
                            <?php else: ?>
                                <h6 class="card-subtitle mb-2 text-muted">> Parties classique</h6>
                                <?php if(!$gameStats->hasPlay($gameId)): ?>
                                    <p class="card-text">Aucune partie jouée</p>
                                <?php else: ?>
                                    <?php
                                    $stats = $gameStats->getStats($gameId);
                                    foreach ($stats as $statId => $statName):
                                        $statValue = $gameStats->getStat($gameId, "classic", $statId);
                                        if($statId === "timePlayed"){
                                            $statValue = \utils\DateUtils::convertSecondsToHoursMinutes($statValue);
                                        }
                                        ?>
                                        <div style="display: flex; justify-content: space-between; height: 20px; margin-bottom: 2px;">
                                            <p><?= $statName; ?></p>
                                            <span class="badge text-bg-success"><?= $statValue; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <h6 style="margin-top: 30px;" class="card-subtitle mb-2 text-muted">> Parties personnalisées (host)</h6>
                                <?php if(!$gameStats->hasPlay($gameId, "host")): ?>
                                    <p class="card-text">Aucune partie jouée</p>
                                <?php else: ?>
                                    <?php
                                    $stats = $gameStats->getStats($gameId);
                                    foreach ($stats as $statId => $statName):
                                        $statValue = $gameStats->getStat($gameId, "host", $statId);
                                        if($statId === "timePlayed"){
                                            $statValue = \utils\DateUtils::convertSecondsToHoursMinutes($statValue);
                                        }
                                        ?>
                                        <div style="display: flex; justify-content: space-between; height: 20px; margin-bottom: 2px;">
                                            <p><?= $statName; ?></p>
                                            <span class="badge text-bg-success"><?= $statValue; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div style="margin-top: 30px; margin-bottom: 20px;" class="col-md-4">
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