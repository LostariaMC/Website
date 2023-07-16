<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h1 style="font-size: 2rem;">Lostaria</h1>
                <h2 style="font-size: 1.75rem; margin-top: 20px;">Résultats Survie</h2>
                <ul style="margin-top: 40px; list-style-type: decimal; font-size: 1.5rem;">
                    <?php use entities\LostariaPlayer;
                    foreach ($playersAchievements as $uuid => $achievements): ?>
                        <?php
                        $redisPlayer = $this->redisModel->getOne("redisplayer:". $uuid);
                        $playerObj = json_decode($redisPlayer, true);
                        $player = new LostariaPlayer($playerObj);
                        $playerName = $player->getName();
                        ?>
                        <li style="margin-bottom: 30px;">
                            <section style="font-size: 1rem;">
                                <h3 style="font-size: 1.5rem;"><?= $playerName ?> <span style="font-size: 1.25rem;">(<?= count($achievements) ?> succès)</span></h3>
                                <div class="accordion" id="accordion<?= $playerName ?>">
                                    <div class="accordion-item">
                                        <p class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $playerName ?>" aria-expanded="false" aria-controls="collapse<?= $playerName ?>">
                                                Voir les succès réalisés
                                            </button>
                                        </p>
                                        <div id="collapse<?= $playerName ?>" class="accordion-collapse collapse" data-bs-parent="#accordion<?= $playerName ?>">
                                            <div class="accordion-body">
                                                <ul style="list-style: inside;">
                                                    <?php foreach ($achievements as $achievement): ?>
                                                        <?php
                                                        $achievementDisplay = $achievement;
                                                        if(array_key_exists($achievement, $achievementsInfos)){
                                                            $achievementDisplay = "<a href='".$achievementsInfos[$achievement][1]."' target='_blank'>". $achievementsInfos[$achievement][0] ."</a>";
                                                        }
                                                        ?>
                                                        <li><?= $achievementDisplay ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>