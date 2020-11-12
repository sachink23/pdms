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
                <li class="lead">दिनांक १/१२/२०२०,  मतदानाच्या दिवशी दर दोन तासाला परभणी जिल्ह्यातील ७८ मतदान केंद्रांची केंद्र निहाय झालेल्या मतदानाची  (पुरुष, स्त्री, ईतर)  आकडेवारी भरण्यासाठीची संगणक प्रणाली.</li>
            </ul>
        </div>

    </div>
    <!-- Button trigger modal -->
    <center>
        <button type="button" class="btn btn-outline-dark my-2   btn-lg" data-toggle="modal" data-target="#informations">
            मार्गदर्शक सूचना
        </button>
    </center>
    <!-- Modal -->
    <div class="modal fade" id="informations" tabindex="-1" role="dialog" aria-labelledby="margadarshak-suchna"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">मार्गदर्शक सूचना</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead">१. मतदानाच्या दिवशी (१/१२/२०२०) दर दोन तासाला मतदान केंद्र निहाय झालेल्या मतदानाची आकडेवारी भरण्यासाठीची संगणक प्रणाली.</p>
                    <p class="lead">२. मतदान सकाळी ८ वाजता सुरू झाल्यानंतर पहिला टप्पा सकाळी ८ ते १०, दुसरा टप्पा सकाळी १० पर्यंत, तिसरा दुपारी २ पर्यंत, चौथा दुपारी ४ पर्यंत तर चौथा टप्पा मतदानाची अंतिम आकडेवारी म्हणजे ५ वाजेपर्यंत असा आहे.</p>
                    <p class="lead">३. ५-औरंगाबाद पदवीधर मतदार संघाच्या परभणी जिल्ह्यातील ७८ मतदान केंद्राची तालुकानिहाय वर्गवारी करण्यात आली आहे.</p>
                    <p class="lead">४. मतदान आकडेवारी भरण्यासाठी प्रथम तालुका निवडून लॉगीन करावे आणि नंतर मतदान केंद्र निवडावे.</p>
                    <p class="lead">४. त्यानंतर ज्या कालावधीची आकडेवारी भरावयाची आहे तो टप्पा निवडावा.</p>
                    <p class="lead">५. आकडेवारी भरतांना त्या टप्प्याच्या वेळे पर्यंत झालेल्या एकूण मतदाची आकडेवारी  (cumulative) भरावयाची आहे.</p>
                    <p class="lead">७. आकडेवारी भरतांना त्यावेळी झालेल्या मतदानाची पुरुष, स्त्री, ईतर (Male, Female, Transgender) असे तीन संख्या भरावयाची आहे.</p>
                    <p class="lead">८. एका टप्प्याची आकडेवारी फक्त एकदाच भरता येणार आहे. एकदा भरलेला आकडा पुन्हा बदलता येणार नाही.</p>
                    <p class="lead">९. आकडेवारी टप्प्याच्या क्रमाने भरावी. पुढच्या टप्प्याची माहिती अगोदर भरता येणार नाही.</p>
                </div></div>
            </div>
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
