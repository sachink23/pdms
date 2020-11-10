<?php
    require_once __DIR__."/include.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title><?= APP_SHORT_NAME ?> : <?= APP_NAME ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid bg-dark text-center text-light py-2">
    <h1 style="font-size: 22px"><?= APP_SHORT_NAME ?> : <?= APP_NAME ?></h1>
</div>
<div class="container my-2">
    <a href="dlogin.php" role="button" class="btn btn-outline-dark float-left">District Login</a>
    <a href="tlogin.php" role="button" class="btn btn-outline-dark float-right">Taluka Login</a>
    <br /><br />
</div>
<div class="container text-center my-2">
    <h3><strong>जिल्हा - परभणी</strong></h3>
    <hr />
</div>
<div class="container my-2">
    <h2 class="text-center" style="font-size: 25px"><strong><?= APP_DESC ?></strong></h2>
    <hr />
    <div class="card">
        <div class="card-header">
            <h3 class="text-center" style="font-size: 20px;"><strong>मतदानाची माहिती</strong></h3>
        </div>
        <div class="card-body">
            <ul>
                <li>Point 1</li>
                <li>Point 2</li>
            </ul>
        </div>
    </div>
</div>
<div class="container my-2">
    <div class="row">

    </div>
</div>
<div class="container-fluid bg-light text-center text-dark pt-4 ">
    <hr />
    <img src="assets/download.webp" height="50px">
    <h6 class="my-2"><strong>Developed By NIC Parbhani</strong></h6>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
