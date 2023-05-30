<?php

function isTimeStat($statId){
    return $statId === "timePlayed" || $statId === "kothCapture";
}

?>

<div class="container">
    <div class="card card-hover border-0" style="padding: 20px;">
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
                }else{
                    echo '<div>';
                }

                foreach ($badges as $badge){
                    if($badge == "Responsable"){
                        echo '<span style="margin-right: 5px; margin-top: 5px; background-color: #FF5555;" class="badge rounded-pill">Membre de l\'équipe ✸</span>';
                    }
                    if($badge == "Président"){
                        echo '<span style="margin-right: 5px; margin-top: 5px; background-color: #55FFFF;" class="badge rounded-pill text-light">Président ✪</span>';
                    }
                    if($badge == "Champion"){
                        echo '<span style="margin-right: 5px; margin-top: 5px; background-color: #FF55FF;" class="badge rounded-pill text-light">Champion ☬</span>';
                    }
                    if($badge == "Abonné"){
                        echo '<span style="margin-right: 5px; margin-top: 5px; background-color: #FFAA00;" class="badge rounded-pill text-light">Abonné ✰</span>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php if($sanction != ""): ?>
        <?php
        $quotes = [];
        array_push($quotes, "La sagesse est l'art de vivre");
        array_push($quotes, "La véritable force commence par la sagesse");
        array_push($quotes, "La sagesse est la plus grande des vertus");
        array_push($quotes, "Pour accéder à la sagesse, il faut le vouloir");
        array_push($quotes, "Apprends la sagesse dans la sottise des autres");
        array_push($quotes, "Celui qui augmente sa sagesse allonge sa vie");
        $randomQuote = $quotes[array_rand($quotes)];
        ?>
        <div class="alert alert-danger" style="text-align: center; margin-left: 25%; margin-right: 25%; margin-top: 40px;"><?= "Ce joueur est ". $sanction ." !" ?><br/><span style="font-style: italic; color: gray;">"<?= $randomQuote; ?>"</span></div>
    <?php endif; ?>
    <div style="margin-top: 50px; flex-wrap: wrap-reverse;" class="row">
        <div style="margin-top: 30px;" class="col-md-8">
            <h4 class="page-header">Statistiques</h4>
            <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
                <?php foreach ($gameStats->getGames() as $gameId => $gameName): ?>
                    <div class="card col-lg-4 col-md-6 col-sm-4 col-xs-12" style="width: 16.5rem; margin-right: 10px; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $gameName ?></h5>
                            <?php if(!$gameStats->hasPlay($gameId) && !$gameStats->hasPlay($gameId, "host")): ?>
                                <p class="card-text">Aucune partie jouée 😥</p>
                            <?php else: ?>
                                <?php
                                $stats = $gameStats->getStats($gameId);
                                foreach ($stats as $statId => $statName):
                                    $statValueFinally = 0;
                                    if(str_starts_with($statId, "#")){
                                        if($gameId == "moutron"){
                                            if($statId == "#bonusUsed"){
                                                $statValueClassicBonusUsedAveuglement = $gameStats->getStat($gameId, "classic", "bonusUsedAveuglement");
                                                if(!is_bool($statValueClassicBonusUsedAveuglement)){
                                                    $statValueFinally += $statValueClassicBonusUsedAveuglement;
                                                }
                                                $statValueClassicBonusUsedInvisibilite = $gameStats->getStat($gameId, "classic", "bonusUsedInvisibilité");
                                                if(!is_bool($statValueClassicBonusUsedInvisibilite)){
                                                    $statValueFinally += $statValueClassicBonusUsedInvisibilite;
                                                }
                                                $statValueClassicBonusUsedMur = $gameStats->getStat($gameId, "classic", "bonusUsedMur");
                                                if(!is_bool($statValueClassicBonusUsedMur)){
                                                    $statValueFinally += $statValueClassicBonusUsedMur;
                                                }
                                                $statValueClassicBonusUsedNettoyeur = $gameStats->getStat($gameId, "classic", "bonusUsedNettoyeur");
                                                if(!is_bool($statValueClassicBonusUsedNettoyeur)){
                                                    $statValueFinally += $statValueClassicBonusUsedNettoyeur;
                                                }
                                                $statValueClassicBonusUsedVitesse = $gameStats->getStat($gameId, "classic", "bonusUsedVitesse");
                                                if(!is_bool($statValueClassicBonusUsedVitesse)){
                                                    $statValueFinally += $statValueClassicBonusUsedVitesse;
                                                }
                                                $statValueHostBonusUsedAveuglement = $gameStats->getStat($gameId, "host", "bonusUsedAveuglement");
                                                if(!is_bool($statValueHostBonusUsedAveuglement)){
                                                    $statValueFinally += $statValueHostBonusUsedAveuglement;
                                                }
                                                $statValueHostBonusUsedInvisibilite = $gameStats->getStat($gameId, "host", "bonusUsedInvisibilité");
                                                if(!is_bool($statValueHostBonusUsedInvisibilite)){
                                                    $statValueFinally += $statValueHostBonusUsedInvisibilite;
                                                }
                                                $statValueHostBonusUsedMur = $gameStats->getStat($gameId, "host", "bonusUsedMur");
                                                if(!is_bool($statValueHostBonusUsedMur)){
                                                    $statValueFinally += $statValueHostBonusUsedMur;
                                                }
                                                $statValueHostBonusUsedNettoyeur = $gameStats->getStat($gameId, "host", "bonusUsedNettoyeur");
                                                if(!is_bool($statValueHostBonusUsedNettoyeur)){
                                                    $statValueFinally += $statValueHostBonusUsedNettoyeur;
                                                }
                                                $statValueHostBonusUsedVitesse = $gameStats->getStat($gameId, "host", "bonusUsedVitesse");
                                                if(!is_bool($statValueHostBonusUsedVitesse)){
                                                    $statValueFinally += $statValueHostBonusUsedVitesse;
                                                }
                                            }
                                            if($statId == "#playedmoutronFinale"){
                                                $statValueClassicPlayedmoutronFinaleBLOCKS = $gameStats->getStat($gameId, "classic", "playedmoutronFinaleBLOCKS");
                                                if(!is_bool($statValueClassicPlayedmoutronFinaleBLOCKS)){
                                                    $statValueFinally += $statValueClassicPlayedmoutronFinaleBLOCKS;
                                                }
                                                $statValueClassicPlayedmoutronFinaleSHEARS = $gameStats->getStat($gameId, "classic", "playedmoutronFinaleSHEARS");
                                                if(!is_bool($statValueClassicPlayedmoutronFinaleSHEARS)){
                                                    $statValueFinally += $statValueClassicPlayedmoutronFinaleSHEARS;
                                                }
                                                $statValueHostPlayedmoutronFinaleBLOCKS = $gameStats->getStat($gameId, "host", "playedmoutronFinaleBLOCKS");
                                                if(!is_bool($statValueHostPlayedmoutronFinaleBLOCKS)){
                                                    $statValueFinally += $statValueHostPlayedmoutronFinaleBLOCKS;
                                                }
                                                $statValueHostPlayedmoutronFinaleSHEARS = $gameStats->getStat($gameId, "host", "playedmoutronFinaleSHEARS");
                                                if(!is_bool($statValueHostPlayedmoutronFinaleSHEARS)){
                                                    $statValueFinally += $statValueHostPlayedmoutronFinaleSHEARS;
                                                }
                                            }
                                            if($statId == "#winmoutronFinale"){
                                                $statValueClassicWinmoutronFinaleBLOCKS = $gameStats->getStat($gameId, "classic", "winmoutronFinaleBLOCKS");
                                                if(!is_bool($statValueClassicWinmoutronFinaleBLOCKS)){
                                                    $statValueFinally += $statValueClassicWinmoutronFinaleBLOCKS;
                                                }
                                                $statValueClassicWinmoutronFinaleSHEARS = $gameStats->getStat($gameId, "classic", "winmoutronFinaleSHEARS");
                                                if(!is_bool($statValueClassicWinmoutronFinaleSHEARS)){
                                                    $statValueFinally += $statValueClassicWinmoutronFinaleSHEARS;
                                                }
                                                $statValueHostWinmoutronFinaleBLOCKS = $gameStats->getStat($gameId, "host", "winmoutronFinaleBLOCKS");
                                                if(!is_bool($statValueHostWinmoutronFinaleBLOCKS)){
                                                    $statValueFinally += $statValueHostWinmoutronFinaleBLOCKS;
                                                }
                                                $statValueHostWinmoutronFinaleSHEARS = $gameStats->getStat($gameId, "host", "winmoutronFinaleSHEARS");
                                                if(!is_bool($statValueHostWinmoutronFinaleSHEARS)){
                                                    $statValueFinally += $statValueHostWinmoutronFinaleSHEARS;
                                                }
                                            }
                                        }
                                    }else{
                                        $statValueClassic = $gameStats->getStat($gameId, "classic", $statId);
                                        if(!is_bool($statValueClassic)){
                                            $statValueFinally += $statValueClassic;
                                        }
                                        $statValueHost = $gameStats->getStat($gameId, "host", $statId);
                                        if(!is_bool($statValueHost)){
                                            $statValueFinally += $statValueHost;
                                        }
                                        if(isTimeStat($statId)){
                                            $statValueFinally = \utils\DateUtils::convertSecondsToHoursMinutes($statValueFinally);
                                        }
                                    }
                                    ?>
                                    <div style="display: flex; justify-content: space-between; height: 20px; margin-bottom: 2px;">
                                        <p><?= $statName; ?></p>
                                        <span class="badge text-bg-success"><?= $statValueFinally; ?></span>
                                    </div>
                                <?php endforeach; ?>
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
                $lastConnectionStr = "";

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
                <p><i class="uil uil-angle-right-b"></i> <?= ($player->isConnected() ? "Connecté depuis" : "Dernière connexion") ?> <span class="badge text-bg-<?= ($player->isConnected() ? "success" : "danger") ?>"><?= ($player->isConnected() ? $lastConnectionStr : 'Il y a '. $lastConnectionStr) ?></span></p>
                <p><i class="uil uil-angle-right-b"></i> Temps de jeu <span class="badge text-bg-success"><?= \utils\DateUtils::convertSecondsToHoursMinutes($gameStats->getSumTimePlayed()); ?></span></p>
                <p><i class="uil uil-angle-right-b"></i> Inscription <span class="badge text-bg-info text-light"><?= $firstConnectionStr; ?></span></p>
                <p><i class="uil uil-angle-right-b"></i> Tickets <span class="badge text-bg-success"><?= $player->getTickets(); ?></span></p>
                <figure style="margin-top: 50px; margin-left: -30px;" class="highcharts-figure">
                    <div id="container"></div>
                </figure>
            </div>
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


    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 450px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>
<script>
    Highcharts.chart('container', {
        chart: {
            type: 'area'
        },
        accessibility: {
            description: "Evolution de l'expérience du joueur au fil du temps"
        },
        title: {
            text: "Évolution de l'expérience"
        },
        xAxis: {
            allowDecimals: false,
            /*type: 'datetime',*/
            labels: {
                formatter: function () {
                    return this.value; // clean, unformatted number for year
                },
                enabled: false
            },
        },
        yAxis: {
            title: {
                text: 'Expérience'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            pointFormat: '<?= $playerName ?> avait <b>{point.y:,.0f}</b> points d\'expériences'
        },
        plotOptions: {
            area: {
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            name: "Expérience de <?= $playerName; ?>",
            data: [
                <?php
                $year = 2022;
                $yearStart = 0;
                $month = 1;
                $monthStart = 0;
                $day = 1;
                $dayStart = 0;
                $currentDate = date("Y-m-d");
                $builderDate = $year . '-' . ($month < 10 ? '0' . $month : $month) . '-' . ($day < 10 ? '0' . $day : $day);
                while ($builderDate != $currentDate) {
                    $day++;
                    if ($day > 31) {
                        $day = 1;
                        $month++;
                        if ($month > 12) {
                            $month = 1;
                            $year++;
                        }
                    }
                    $builderDate = $year . '-' . ($month < 10 ? '0' . $month : $month) . '-' . ($day < 10 ? '0' . $day : $day);
                    if (array_key_exists($builderDate, $player->getExperienceHistoric())) {
                        if($dayStart == 0){
                            $dayStart = $day;
                            $monthStart = $month;
                            $yearStart = $year;
                        }
                        echo $player->getExperienceHistoric()[$builderDate]. ', ';
                    }
                }
                ?>
            ],
            /*pointStart: Date.UTC(<?= $yearStart ?>, <?= $monthStart - 1 ?>, <?= $dayStart ?>),
            pointInterval: 24 * 3600 * 1000*/
        }]
    });
</script>