<?php

require_once __DIR__."/../include.php";

$title = APP_SHORT_NAME . " : District Dashboard";



require_once __DIR__. "/chunks/top.php";
$db = new Db();
$con = $db->con();
$talukas = [];
try {
    $q1 = $con->query("SELECT count(*) as total_booths, s.name as taluka_name, b.subdist_id, sum(num_voters) as voters FROM booths as b join subdistricts as s on b.subdist_id = s.subdist_id GROUP BY b.subdist_id ORDER BY total_booths DESC");
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
                        <th>Upto 10 AM</th>
                        <th>Upto 12 PM</th>
                        <th>Upto 2 PM</th>
                        <th>Upto 4 PM</th>
                        <th>FINAL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $slot_1_r_t=0; $slot_2_r_t=0; $slot_3_r_t=0; $slot_4_r_t=0; $slot_5_r_t=0; $booths=0; $voters = 0; $i = 0; foreach ($talukas as $taluka): ?>
                        <tr>
                            <td><?= ++$i; ?></td>
                            <td><a class="text-primary" style="text-decoration: underline" href="./subdist_det.php?t=<?= $taluka["taluka_name"] ?>"><?= $taluka["taluka_name"] ?></a></td>
                            <td><?= $taluka["total_booths"] ?></td>
                            <td><?= $taluka["voters"] ?></td>
                            <?php
                            $stmt = $con->prepare("SELECT count(*) as slot_1_count FROM slot_1 WHERE booth_id IN (SELECT booth_id FROM booths WHERE subdist_id = ?)");
                            $stmt->execute([$taluka["subdist_id"]]);
                            $slot_1_r = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["slot_1_count"];
                            $slot_1_nr = $taluka["total_booths"] - $slot_1_r;
                            $slot_1_r_t += $slot_1_r;

                            $stmt = $con->prepare("SELECT count(*) as slot_2_count FROM slot_2 WHERE booth_id IN (SELECT booth_id FROM booths WHERE subdist_id = ?)");
                            $stmt->execute([$taluka["subdist_id"]]);
                            $slot_2_r = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["slot_2_count"];
                            $slot_2_nr = $taluka["total_booths"] - $slot_2_r;
                            $slot_2_r_t += $slot_2_r;


                            $stmt = $con->prepare("SELECT count(*) as slot_3_count FROM slot_3 WHERE booth_id IN (SELECT booth_id FROM booths WHERE subdist_id = ?)");
                            $stmt->execute([$taluka["subdist_id"]]);
                            $slot_3_r = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["slot_3_count"];
                            $slot_3_nr = $taluka["total_booths"] - $slot_3_r;
                            $slot_3_r_t += $slot_3_r;

                            $stmt = $con->prepare("SELECT count(*) as slot_4_count FROM slot_4 WHERE booth_id IN (SELECT booth_id FROM booths WHERE subdist_id = ?)");
                            $stmt->execute([$taluka["subdist_id"]]);
                            $slot_4_r = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["slot_4_count"];
                            $slot_4_nr = $taluka["total_booths"] - $slot_4_r;
                            $slot_4_r_t += $slot_4_r;

                            $stmt = $con->prepare("SELECT count(*) as slot_5_count FROM slot_5 WHERE booth_id IN (SELECT booth_id FROM booths WHERE subdist_id = ?)");
                            $stmt->execute([$taluka["subdist_id"]]);
                            $slot_5_r = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["slot_5_count"];
                            $slot_5_nr = $taluka["total_booths"] - $slot_5_r;
                            $slot_5_r_t += $slot_5_r;
                            ?>
                            <td><span class="reported" onclick="window.location.href = './get-slot-details.php?slot=slot_1&subdist=<?= $taluka['subdist_id'] ?>&status=reported'"><?= $slot_1_r ?>&nbsp;&nbsp;</span>/<span class="not-reported" onclick="window.location.href = './get-slot-details.php?slot=slot_1&subdist=<?= $taluka['subdist_id'] ?>&status=not_reported'">&nbsp;&nbsp;<?= $slot_1_nr ?></span></td>
                            <td><span class="reported" onclick="window.location.href = './get-slot-details.php?slot=slot_2&subdist=<?= $taluka['subdist_id'] ?>&status=reported'"><?= $slot_2_r ?>&nbsp;&nbsp;</span>/<span class="not-reported" onclick="window.location.href = './get-slot-details.php?slot=slot_2&subdist=<?= $taluka['subdist_id'] ?>&status=not_reported'">&nbsp;&nbsp;<?= $slot_2_nr ?></span></td>
                            <td><span class="reported" onclick="window.location.href = './get-slot-details.php?slot=slot_3&subdist=<?= $taluka['subdist_id'] ?>&status=reported'"><?= $slot_3_r ?>&nbsp;&nbsp;</span>/<span class="not-reported" onclick="window.location.href = './get-slot-details.php?slot=slot_3&subdist=<?= $taluka['subdist_id'] ?>&status=not_reported'">&nbsp;&nbsp;<?= $slot_3_nr ?></span></td>
                            <td><span class="reported" onclick="window.location.href = './get-slot-details.php?slot=slot_4&subdist=<?= $taluka['subdist_id'] ?>&status=reported'"><?= $slot_4_r ?>&nbsp;&nbsp;</span>/<span class="not-reported" onclick="window.location.href = './get-slot-details.php?slot=slot_4&subdist=<?= $taluka['subdist_id'] ?>&status=not_reported'">&nbsp;&nbsp;<?= $slot_4_nr ?></span></td>
                            <td><span class="reported" onclick="window.location.href = './get-slot-details.php?slot=slot_5&subdist=<?= $taluka['subdist_id'] ?>&status=reported'"><?= $slot_5_r ?>&nbsp;&nbsp;</span>/<span class="not-reported" onclick="window.location.href = './get-slot-details.php?slot=slot_5&subdist=<?= $taluka['subdist_id'] ?>&status=not_reported'">&nbsp;&nbsp;<?= $slot_5_nr ?></span></td>
                        </tr>
                    <?php $booths += $taluka["total_booths"]; $voters += $taluka["voters"]; endforeach; ?>
                        <tr>
                            <th colspan="2">Total</th>
                            <th><?= $booths ?></th>
                            <th><?= $voters ?></th>
                            <th><span class="reported"><?= $slot_1_r_t ?></span> / <span class="not-reported"><?= $booths - $slot_1_r_t  ?></span></th>
                            <th><span class="reported"><?= $slot_2_r_t ?></span> / <span class="not-reported"><?= $booths - $slot_2_r_t  ?></span></th>
                            <th><span class="reported"><?= $slot_3_r_t ?></span> / <span class="not-reported"><?= $booths - $slot_3_r_t  ?></span></th>
                            <th><span class="reported"><?= $slot_4_r_t ?></span> / <span class="not-reported"><?= $booths - $slot_4_r_t  ?></span></th>
                            <th><span class="reported"><?= $slot_5_r_t ?></span> / <span class="not-reported"><?= $booths - $slot_5_r_t  ?></span></th>


                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<style>
    .reported {
        color: green;
        cursor: pointer;
    }
    .not-reported {
        color: red;
        cursor: pointer;

    }
    .reported .not-reported {
        word-spacing: 4px;
    }
</style>

<?php

require_once __DIR__. "/chunks/bottom.php";

?>

