<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title == "" ? "Lostaria • Statistiques" : $title) ?></title>

    <link rel="stylesheet" href="https://meyerweb.com/eric/tools/css/reset/reset.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="stylesheet" href="./public/style/main.css">

    <link rel="icon" type="image/png" href="./public/images/LostariaLogo.png">
    <meta property="og:image" content="./public/images/LostariaLogo.png">

    <meta name="theme-color" content="#6477e6">

    <meta property="site_name" content="Lostaria">
    <meta property="og:site_name" content="Lostaria">

    <meta name="description" content="Découvrez les statistiques des joueurs du serveur Minecraft Lostaria">
    <meta name="og:description" content="Découvrez les statistiques des joueurs du serveur Minecraft Lostaria">

    <meta name="keywords" content="Lostaria, Minecraft, Serveur, Statistiques<?= ($keywords == "" ? "" : ", " . $keywords) ?>">

    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-DQH14YJE51"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-DQH14YJE51');
    </script>

</head>

<body class="<?= isset($_GET['id']) ? 'brick' : '' ?>">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./"><img src="./public/images/LostariaLogo2.png" height="50" width="50" /> </a>
            <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex flex-grow justify-content-end flex-grow p-2">
                <a href="https://maps.lostaria.fr" target="_blank" class="btn btn-outline-light" style="margin-left: 10px;">Voir les maps</a>
                <a href="https://shop.lostaria.fr" target="_blank" class="btn btn-outline-light" style="margin-left: 10px;">Boutique</a>
            </ul>
        </div>
    </nav>