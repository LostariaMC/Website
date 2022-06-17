<div class="container">

    <div class="row pt-5">

        <?php
        if(isset($error) && $error == true){
            echo '<div style="text-align: center;" class="alert alert-danger">Une erreur est survenue</div>';
        }
        ?>

        <h1>Entrez votre pseudo</h1>

        <form method="GET" action="./search">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="q" required="required" placeholder="pseudo">
                <label for="floatingInput">Votre pseudo</label>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Rechercher</button>
            </div>
        </form>
    </div>
    <div style="margin: 3%">
        <hr style="height: 2px; color: #606060; background-color: #606060; width: 80%; border: none; margin: auto;">
    </div>
</div>