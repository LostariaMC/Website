<div class="container" style="background-color: #FFF; border-radius: 10px;">

    <div class="row">
        <div style="padding-right: 50px;" class="col-md-8">
            <h4 style="margin: 20px">Membres de l'équipe :</h4>
            <?php
            $i = 0;
            foreach ($staffMembers as $p) {
                if ($i >= 2) {
                    echo '</div>';
                    $i = 0;
                }
                if ($i == 0) {
                    echo '<div class="row">';
                }

                $competences = "";
                foreach ($p[1] as $c) {
                    $competences = $competences . "<span style='margin-right: 3px' class=\"badge rounded-pill text-bg-primary text-light\">" . $c . "</span>";
                }

                $staffName = \utils\MojangUtils::getName($p[0]);

                echo '
                <div style="margin-left: 20px; margin-bottom: 20px;" class="card card-hover">
                        <div class="card-body d-flex">
                            <div class="p-3">
                                <img class="preview-image" src="' . \utils\HeadUtils::getHeadLink($p[0]) . '/100" alt="' . $staffName . ' avatar">
                            </div>
                            <div class="p-3 flex-grow-1">
                                <h5 class="mb-1 pb-0">' . $staffName . '</h5>
                                ' . $competences . '<br/>
                                <p class="staff__description" style="margin-top: 10px;">'. $p[2] .'</p>
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
            <!-- <a style="margin-top: 20px; margin-right: 30px; margin-bottom: 40px; float: right;" href="https://guide.lostaria.fr/team.html" target="_blank" class="btn btn-outline-primary">Qui sommes-nous →</a> -->
        </div>
        <div style="margin-top: 30px; padding-bottom: 40px;" class="col-md-4">
            <a class="twitter-timeline" href="https://twitter.com/LostariaMC?ref_src=twsrc%5Etfw" data-height="900">Tweets par LostariaMC</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
    </div>
</div>

<style>
@media screen and (max-width: 490px) {
    .staff__description {
        display: none;
    }
}

}
</style>