<div class="container" style="background-color: #FFF; border-radius: 10px; padding-top: 15px; padding-left: 15px; padding-right: 55px;">

    <div style="margin: 20px;">
        <h1>Bienvenue sur Lostaria !</h1>
        <p style="margin-top: 20px;">D'origine une communauté de guildes du serveur Epicube, Lostaria est un serveur événementiel qui recrée les jeux qui nous ont rassemblés.</p>
        <p>En développement constant, Lostaria réunit aujourd'hui une petite communauté autour de ses jeux dans une ambiance amicale et de détente.</p>
    </div>

    <div style="margin: 20px;">
        <h2 style="margin-top: 50px;">Lostaria, c'est :</h2>
        <div class="details__stats" style="display: flex; justify-content: space-around; text-align: center; margin-top: 50px;">
            <div>
                <p style="font-size: 2rem; margin-bottom: 0px;">+15</p>
                <p>jeux</p>
            </div>
            <div>
                <p style="font-size: 2rem; margin-bottom: 0px;">+350</p>
                <p>joueurs inscrits</p>
            </div>
            <div>
                <p style="font-size: 2rem; margin-bottom: 0px;">+5</p>
                <p>ans d'existence</p>
            </div>
        </div>
    </div>


    <div style="margin-top: 50px;">
        <h2 style="font-size: 1.5rem; margin: 20px;">Membres de l'équipe :</h2>
        <?php

        use entities\LostariaPlayer;

        $i = 0;
        foreach ($staffMembers as $p) {
            if ($i >= 2) {
                echo '</div>';
                $i = 0;
            }
            if ($i == 0) {
                echo '<div style="display: flex; justify-content: center;">';
            }

            $competences = "";
            foreach ($p[1] as $c) {
                $competences = $competences . "<span style='margin-right: 3px' class=\"badge rounded-pill text-bg-primary text-light\">" . $c . "</span>";
            }

            $redisPlayer = $this->redisModel->getOne("redisplayer:". $p[0]);
            $playerObj = json_decode($redisPlayer, true);
            $player = new LostariaPlayer($playerObj);
            $staffName = $player->getName();

            echo '
                <div style="margin-left: 20px; margin-bottom: 20px; width: 400px;" class="card card-hover">
                        <div class="card-body d-flex">
                            <div class="p-3">
                                <img class="preview-image" src="' . \utils\HeadUtils::getHeadLink($p[0]) . '/100" alt="' . $staffName . ' avatar">
                            </div>
                            <div class="p-3 flex-grow-1">
                                <h5 class="mb-1 pb-0">' . $staffName . '</h5>
                                ' . $competences . '<br/>
                                <a style="margin-top: 10px;" href="./player?q=' . $staffName . '" class="btn btn-outline-primary">Voir le profil →</a>
                            </div>
                        </div>
                    </div>
            ';
            $i++;
        }
        if ($i >= 2) {
            echo '</div>';
        }
        ?>
    </div>
</div>

<style>
@media screen and (max-width: 490px) {
    .staff__description {
        display: none;
    }

    .details__stats {
        flex-direction: column;
    }
}

}
</style>