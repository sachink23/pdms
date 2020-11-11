<?php

require_once __DIR__."/../include.php";

$title = APP_SHORT_NAME . " : District Dashboard";



require_once __DIR__. "/chunks/top.php";
$db = new Db();
$con = $db->con();
$talukas = [];
try {
    $q1 = $con->query("SELECT count(*) as total_booths, s.name as taluka_name, sum(num_voters) as voters FROM booths as b join subdistricts as s on b.subdist_id = s.subdist_id GROUP BY b.subdist_id ORDER BY total_booths DESC");
    $talukas = $q1->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    pageInfo("warning", "DB_ERROR !");
}

?>

<div class="row">
    <div class="col-12 my-2 text-center">
        <strong><h1 style="font-size: 20px"><?= APP_DESC ?></h1></strong><br />
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Taluka Wise Data</h3>
            </div>
            <div class="card-body text-center">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>SR No</th>
                        <th>Taluka</th>
                        <th>Total Booths</th>
                        <th>Total Voters</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $booths=0; $voters = 0; $i = 0; foreach ($talukas as $taluka): ?>
                        <tr>
                            <td><?= ++$i; ?></td>
                            <td><a class="text-primary" style="text-decoration: underline" href="./subdist_det.php?t=<?= $taluka["taluka_name"] ?>"><?= $taluka["taluka_name"] ?></a></td>
                            <td><?= $taluka["total_booths"] ?></td>
                            <td><?= $taluka["voters"] ?></td>
                        </tr>
                    <?php $booths += $taluka["total_booths"]; $voters += $taluka["voters"]; endforeach; ?>
                        <tr>
                            <th colspan="2">Total</th>
                            <th><?= $booths ?></th>
                            <th><?= $voters ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?php

require_once __DIR__. "/chunks/bottom.php";

?>

