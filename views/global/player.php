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
            <div class="p-3 flex-grow-1">
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
                    $stylePlayerName = "margin-bottom: 10px; margin-top: 15px;";
                }else{
                    $stylePlayerName = "margin-top: 33px;";
                }
                echo '<h1 style="'. $stylePlayerName .'" class="pb-0 '. $color .'">'. $player->getRank() . ' ' . $playerName .'</h1>';

                foreach ($badges as $badge){
                    if($badge == "Responsable"){
                        echo '<span style="margin-right: 5px" class="badge rounded-pill text-bg-warning">Responsable ✰</span>';
                    }
                    if($badge == "Donateur"){
                        echo '<span style="margin-right: 5px" class="badge rounded-pill text-bg-danger text-light">Donateur ❤</span>';
                    }
                    if($badge == "Président"){
                        echo '<span style="margin-right: 5px" class="badge rounded-pill text-bg-info text-light">Président ✪</span>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<style>
    .mccolor-yellow{
        color: #FFFF55;
    }
    .mccolor-gold{
        color: #FFAA00;
    }
    .mccolor-aqua{
        color: #55FFFF;
    }
    .mccolor-lightpurple{
        color: #FF55FF;
    }
</style>