<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>Simple PHP MVC</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>

<body class="show-bg">
    <?php  ?>
    <div class="poke-card card-img-top m-3 rounded" style="width: 18rem;">


        <div class="poke-card-body card-single">
            <div class="poke-background">
                <img class="poke-img-card" src='<?= $pokemonSingle['cover'] ?>' alt='pokemon cover'>
            </div>
            <div class="poke-card-group-text">
                <h3 class="poke-card-title text-capitalize">Name:<?= $pokemonSingle['name'] ?></h3>
                <ul class="poke-card-text">
                    <li class="abilitylist text-capitalize font-weight-bold">
                        Ability:<?= $pokemonSingle['abilities'][0]['ability']['name'] ?>
                        <?= $pokemonSingle['abilities'][1]['ability']['name'] ?>
                    </li>
                    <li>
                        Order:<?= $pokemonSingle['order'] ?>

                    </li>
                    <li>
                        Altezza:<?= $pokemonSingle['height'] ?>

                    </li>
                    <li>
                        Esperienca Base: <?= $pokemonSingle['base_experience'] ?>
                    </li>
                </ul>
                <a href="/">GO</a>
            </div>


        </div>
        <div class="back-card">
            <img class="back-card-img" src="../public/assets/retro.jpg" alt="">
        </div>
    </div>


    <?php  ?>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>