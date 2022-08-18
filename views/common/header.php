<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lostaria • Statistiques</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/style/main.css">

    <link rel="icon" type="image/png" href="./public/images/LostariaLogo.png">
    <meta property="og:image" content="./public/images/LostariaLogo.png">

    <meta name="theme-color" content="#6477e6">

    <meta property="site_name" content="Lostaria">
    <meta property="og:site_name" content="Lostaria">

    <meta name="description" content="Découvrez les statistiques des joueurs du serveur Minecraft Lostaria">
    <meta name="og:description" content="Découvrez les statistiques des joueurs du serveur Minecraft Lostaria">

    <meta name="keywords" content="Lostaria, Minecraft, Serveur, Statistiques">
</head>

<body class="<?= isset($_GET['id']) ? 'brick' : '' ?>">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <?php
        if (isset($_GET['uuid'])) {
            echo '<a class="navbar-brand" href="./">← Retour</a>';
        } else {
            echo '<a class="navbar-brand" href="./">Lostaria</a>';
        }
        ?>

        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex flex-grow justify-content-end flex-grow p-2">
            <a href="http://discord.lostaria.fr" target="_blank" class="btn btn-outline-light" style="margin-left: 10px;">Discord</a>
            <a href="https://github.com/LostariaMC" target="_blank" class="btn btn-outline-light" style="margin-left: 10px;">GitHub</a>
        </ul>
    </div>
</nav>