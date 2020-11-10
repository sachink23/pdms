<?php

require_once "../include.php";

$title = APP_SHORT_NAME . " : Taluka Dashboard";



require_once __DIR__. "/chunks/top.php";

$exit = false;
$db = new Db();
$con = $db->con();
$q = $con->prepare("SELECT subdist_id as tid FROM subdistricts WHERE name = ?");
try {
    $q->execute([$_SESSION["t_user"]["name"]]);
    $t = $q->fetchAll(PDO::FETCH_ASSOC);
    if (count($t) == 1) {
        $tid = $t[0]['tid'];

        $q = $con->query("SELECT count(*) as booths, sum(num_voters) as voters FROM booths WHERE subdist_id = ".$tid);
        $booth_details = $q->fetchAll(PDO::FETCH_ASSOC)[0];
        $q = $con->query("SELECT * FROM booths WHERE subdist_id = ".$tid);
        $booths = $q->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    pageInfo("warning", "DB_ERROR!");
    $exit = true;
}
if (!$exit):
    ?>
    <div class="row">
        <div class="col-12 my-2 text-center">
            <strong><h1 style="font-size: 20px"><?= APP_DESC ?></h1></strong><br />
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Taluka - <?= $_SESSION["t_user"]["name"] ?> | Booths - <?= $booth_details["booths"] ?> | Voters - <?= $booth_details["voters"] ?>
                </div>
                <div class="card-body text-center table-responsive">
                    <table class="table table-bordered bootstrap-data-table-export">
                        <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Booth Number</th>
                            <th>Booth Name</th>
                            <th>Male Voters</th>
                            <th>Female Voters</th>
                            <th>Transgender Voters</th>
                            <th>Total Voters</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; foreach ($booths as $booth): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $booth["booth_number"] ?></td>
                                <td><?= $booth["booth_name"] ?></td>
                                <td><?= $booth["male_voters"] ?></td>
                                <td><?= $booth["female_voters"] ?></td>
                                <td><?= $booth["t_voters"] ?></td>
                                <td><?= $booth["num_voters"] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
endif;

require_once __DIR__. "/chunks/bottom.php";

?>

