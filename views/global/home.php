<div class="container">
    <iframe style="width:728px;height:90px;max-width:100%;border:none;display:block;margin:auto" src="https://fr.namemc.com/server/play.lostaria.fr/embed" width="728" height="90"></iframe>

    <div style="margin-top: 4%">
        <h1 style="margin: 2%">Liste des joueurs</h1>
        <?php
        $i = 0;
        foreach ($playersSuggest as $p) {
            $i++;
            echo '<a href="./player?name=' .$p. '"><img src="' .\utils\HeadUtils::getHeadLink($p). '/50"></a>';

            if ($i >= 5) {
                $i = 0;
                echo "<br>";
            }
        }
        ?>
    </div>
</div>