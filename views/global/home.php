<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="./public/images/LostariaLogo.png" height="20" width="20" class="rounded me-2" alt="Lostaria">
            <strong class="me-auto">Lostaria - Information</strong>
            <small></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Nous utilisons des cookies pour nous permettre de déterminer le nombre de visites sur notre site.
            Toutes ces informations sont anonymisées et stockées de manière limitée.
        </div>
    </div>
</div>

<script>

    $(function() {
        const toastLiveExample = document.getElementById('liveToast')
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    });
</script>

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

        $competences = "";
        foreach ($p[1] as $c){
            $competences = $competences . "<span style='margin-right: 3px' class=\"badge rounded-pill text-bg-primary text-light\">". $c ."</span>";
        }

        echo '
            <div class="col">
                <div class="col-sm-12 p-3">
                    <div class="card card-hover">
                        <div class="card-body d-flex">
                            <div class="p-3">
                                <img class="preview-image" src="'. \utils\HeadUtils::getHeadLink($p[0]) .'/100">
                            </div>
                            <div class="p-3 flex-grow-1">
                                <h5 class="mb-1 pb-0">'. \utils\MojangUtils::getName($p[0]) .'</h5>
                                '. $competences .'<br>
                                <a style="margin-top: 20px;" href="./player?uuid='. $p[0] .'" class="btn btn-outline-primary">Voir le profil →</a>
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