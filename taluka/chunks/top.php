
<?php
if (!isset($title)) {
    header("Location: ../../tlogin.php");
    exit;
}
if (!isLoginTalukaAdmin($_SESSION["t_user"]["name"], $_SESSION["t_user"]["password"])) {
    pageInfo("warning", "Session Expired!");
    header("Location: ../tlogin.php");
    exit;
}



?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/theme-assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/theme-assets/css/style.css">
    <link rel="stylesheet" href="../assets/theme-assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li class="menu-title">Taluka - <?= $_SESSION["t_user"]["name"] ?></li><!-- /.menu-title -->
                <li class="menu-title">Menu</li><!-- /.menu-title -->
                <li>
                    <a href="./"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li>
                    <a href="./booth_details.php"><i class="menu-icon fa fa-pencil"></i>Booth Details</a>
                </li>
                <li>
                    <a href="../logout.php"><i class="menu-icon fa fa-sign-out"></i>Log Out</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="./"><?= APP_SHORT_NAME ?> - Parbhnai</a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="animated fadeIn">
        <?php if (isset($_SESSION["PAGE_INFO_EXISTS"])): ?>
            <div class="alert alert-<?= $_SESSION["PAGE_INFO_TYPE"] ?>" role="alert">
                <strong><?= $_SESSION["PAGE_INFO"] ?></strong>
            </div>
        <?php clearPageInfo(); endif; ?>
