<div class="container">
    <div class="row pt-5">

        <h1>Entrez votre pseudo</h1>

        <form method="GET" action="./player">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" required="required" placeholder="pseudo">
                <label for="floatingInput">Votre pseudo</label>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Rechercher</button>
            </div>
        </form>
    </div>
    <hr class="rounded">
    <section class="playerList">
        <h1>Liste des joueurs</h1>

        <?php
        //TODO get from Redis
        $players = array(
            "938e86bd-5d16-49d4-b26a-6775036d744e",
            "b2410d25-93d3-4045-a807-cdf3ebb4a323",
            "e272b935-1500-40a8-b79d-6f5844f1bc9d",
            "95fe8a20-67e6-4a09-96c5-e01ce73870a0",
            "b8220a38-99ce-4347-8af1-53cbf55667ff",
            "aaf7f527-7e9b-41d9-abfd-dab6e2c7b2e9",
            "beb88774-a96c-4553-8379-c42c75395af7",
            "f174ad80-7008-4d6c-82d3-f635a49a97c8"
        );

        $i = 0;
        foreach ($players as $p) {
            $i++;
            ?>
            <a href="/player?name=<?php echo $p ?>"><img src="https://mc-heads.net/avatar/<?php echo $p ?>/50"></a>
            <?php
            if ($i == 5) {
                $i = 0;
                echo "<br>";
            }
        }
        ?>
    </section>
</div>