<?php
require_once __DIR__."/include.php";
if (isset($_SESSION["d_logged_in"])) {
    if (isLoginTalukaAdmin($_SESSION["d_user"]["username"], $_SESSION["d_user"]["password"])) {
        header("Location: taluka/");
        exit;
    }
}

if (isset($_POST["logging_in"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    if (isLoginTalukaAdmin(trim($_POST["username"]), hashPass(trim($_POST["password"])))) {
        header("Location: taluka/");
        exit;
    } else {
        pageInfo("danger", "Invalid Credentials!");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title><?= APP_SHORT_NAME ?> : Taluka Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background: #f6ad9a;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #904e95, #f3876c);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #904e95, #f3876c); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row my-5">
        <form class="col-sm-12 col-md-6 col-lg-4 ml-auto mr-auto border bg-dark text-light p-4 rounded"
              method="post" action="">
            <input type="hidden" name="logging_in" value="yep">
            <div class="form-group text-center">
                <h5 class="mt-2 mb-2 page-title"><?= APP_NAME ?></h5><br /><h6>Taluka Login</h6><hr />
            </div>
            <?php if(isset($_SESSION["PAGE_INFO_EXISTS"])): ?>
                <div class="alert alert-<?= $_SESSION["PAGE_INFO_TYPE"] ?>" role="alert">
                    <strong><?= $_SESSION["PAGE_INFO"] ?></strong>
                </div>
                <?php
                clearPageInfo();
            endif;
            ?>
            <div class="form-group">
                <?php
                    $db = new Db();
                    $con = $db->con();

                    $tl = $con->query("SELECT * FROM subdistricts");

                    $talukas = $tl->fetchAll(PDO::FETCH_ASSOC);

                ?>
                <label for="username"><i class="fa fa-envelope" aria-hidden="true"></i> Select Taluka</label>
                <select class="form-control" name="username" required id="username">
                    <option value="">Select Taluka</option>
                    <?php foreach ($talukas as $taluka): ?>
                    <option><?= $taluka["name"] ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
            <div class="form-group">
                <label for="password"><i class="fa fa-key" aria-hidden="true"></i> Password</label>
                <input type="password" name="password" id="password" required class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-lg bg-light float-right">Login</button>
            </div>
        </form>
    </div>
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
