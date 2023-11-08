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

<body>
    <?php  ?>
    <div class="card card-img-top m-3 rounded" style="width: 18rem;">
        <img class="img-card" src='<?= $pokemon['cover'] ?>' alt='pokemon cover'>
        <div class="card-body cards">
            <h3 class="card-title text-capitalize"><?= $pokemon['name'] ?></h3>
            <ul class="card-text">

                <li class="abilitylist text-capitalize font-weight-bold">
                    <?= $ability['name'] ?>
                </li>
                <li class="abilitylist text-capitalize font-weight-bold">
                    <?= $ability['name'] ?>
                </li>

            </ul>
            <a href="/">GO</a>
        </div>
    </div>
    <?php  ?>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>