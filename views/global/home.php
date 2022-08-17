<div class="container">

    <h3 style="margin: 20px">Membres de l'équipe :</h3>
    <?php
    $i = 0;
    foreach ($staffMembers as $p) {
        if($i >= 2){
            echo '</div>';
            $i = 0;
        }
        if($i == 0) {
            echo '<div class="row">';
        }
        echo '
            <div class="col">
                <div class="col-sm-12 p-3">
                    <div class="card card-hover">
                        <div class="card-body d-flex">
                            <div class="p-3">
                                <img class="preview-image" src="'. \utils\HeadUtils::getHeadLink($p) .'/80">
                            </div>
                            <div class="p-3 flex-grow-1">
                                <h5 class="mb-3 pb-0">'. \utils\MojangUtils::getName($p) .'</h5>
                                <a href="./player?uuid='. $p .'" class="btn btn-outline-primary">Voir le profil →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        $i++;
    }
    if($i >= 2){
        echo '</div>';
    }
    ?>
</div>