<div class="container">

    <div class="row pt-5" style="margin-bottom: 30px;">

        <?php if(isset($error) && $error == true): ?>
            <div class="alert alert-danger" style="text-align: center;"><?= strip_tags($_POST['error']) ?></div>
        <?php endif; ?>

        <h1 style="color: #FFF;">Rechercher un joueur</h1>

        <form method="GET" action="./search">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="q" required="required" placeholder="pseudo">
                <label for="floatingInput">Pseudo</label>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Rechercher</button>
            </div>
        </form>
    </div>
</div>