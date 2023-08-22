<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        .page_404 {
            padding: 40px 0;
            background: #fff;
            text-align: center;
            font-family: 'Roboto', sans-serif;
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {
            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 400px;
            background-position: center;
            background-repeat: no-repeat;
        }


        .four_zero_four_bg h1 {
            font-size: 80px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
        }

        .link_404 {
            color: #fff !important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;
            text-decoration: none;
        }

        .contant_box_404 {
            margin-top: -50px;
        }
    </style>
</head>

<body>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>
                        </div>
                        <div class="contant_box_404">
                            <h3 class="h2">
                                Oups, cette page n'existe pas !
                            </h3>
                            <?php
                            $quotes = [];
                            array_push($quotes, "Les dinosaures ne sont pas tous morts");
                            array_push($quotes, "J'ai pas compris Géant Casino");
                            array_push($quotes, "Je fais du poney sur une patte");
                            array_push($quotes, "Les roses sont crémeuses");
                            array_push($quotes, "L'ampoule brille, mais pas tout le temps..");
                            array_push($quotes, "Les dinosaures mangent de l'or");
                            array_push($quotes, "Les poulets sont de lointains descendants des dinosaures");
                            array_push($quotes, "Elle était si belle la poubelle");
                            array_push($quotes, "Les violoncelles s'attablèrent et firent du repas un avion");
                            array_push($quotes, "Le clou souffre autant que le trou");
                            array_push($quotes, "Une partie des esperluettes sont généralement indisponibles, quoique nécessaires");
                            array_push($quotes, "Les choux-fleurs sont en chaleur");
                            array_push($quotes, "Les abricots sont très beaux");
                            array_push($quotes, "Les espagnolettes sont malades, on se demande pourquoi..");
                            array_push($quotes, "Jardiner, c'est comme faire du vélo");
                            array_push($quotes, "Comme un puma dans l'antarctique des éléphants");
                            array_push($quotes, "Les échalotes sont patriotes");
                            array_push($quotes, "L'utilisation abusive de la souris est sanctionnée");
                            array_push($quotes, "Qui va la pêche à l'eau car la fin s'y casse");
                            array_push($quotes, "Les tortues inanimées se trouvent bien embêtées, et par géo-localisation");
                            array_push($quotes, "Si c'est cette fonte, rèze");
                            array_push($quotes, "Qu'est ce qu'un idiomatique ?");
                            array_push($quotes, "Un semblant de tartine ne fait pas de mal à un miroir, annonça-t-il");
                            array_push($quotes, "Les esperluettes sont temporairement indisponibles");
                            array_push($quotes, "Vous avez vu ?");
                            array_push($quotes, "Pas de tartes à la crème ici");
                            array_push($quotes, "Réessayez pour voir");
                            array_push($quotes, "Cinquante-sept !");
                            array_push($quotes, "Ce message vaut la peine d'être lu");
                            array_push($quotes, "Papopipépo");
                            array_push($quotes, "Qui donne, dire");
                            array_push($quotes, "Séparez les blancs des jaunes et remettez-les ensemble");
                            array_push($quotes, "Mais c'est génial ici !");
                            array_push($quotes, "Bloup bloup. Oh, pardon");
                            array_push($quotes, "Les pièces d'un euro ont deux faces quand même");

                            echo '<p style="font-style: italic;">'. $quotes[array_rand($quotes, 1)] .'</p>';
                            ?>
                            <a href="./" class="link_404">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>