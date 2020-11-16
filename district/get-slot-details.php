<?php

require_once __DIR__."/../include.php";

$title = APP_SHORT_NAME . " : District Dashboard";



require_once __DIR__. "/chunks/top.php";

$db = new Db();
$con = $db->con();
$show = false;
$slot = "NA";
$subdist = "NA";
if (isset($_GET["status"]) && isset($_GET["slot"]) && isset($_GET["subdist"])) {
    $db = new Db();
    $con = $db->con();
    $stmt = $con->prepare("SELECT name FROM subdistricts WHERE subdist_id = ?");
    $stmt->execute([$_GET["subdist"]]);
    $subdists = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($subdists) == 1){
        $subdist = $subdists[0]["name"];
        if ($_GET["status"] == "reported") {
            if ($_GET["slot"] == "slot_1") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_1 s on b.booth_id = s.booth_id WHERE s.booth_id IS NOT NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "UPTO 10 AM";
            } else if ($_GET["slot"] == "slot_2") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_2 s on b.booth_id = s.booth_id WHERE s.booth_id IS NOT NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "UPTO 12 PM";
            } else if ($_GET["slot"] == "slot_3") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_3 s on b.booth_id = s.booth_id WHERE s.booth_id IS NOT NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "UPTO 2 PM";
            } else if ($_GET["slot"] == "slot_4") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_4 s on b.booth_id = s.booth_id WHERE s.booth_id IS NOT NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "UPTO 4 PM";
            } else if ($_GET["slot"] == "slot_5") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_5 s on b.booth_id = s.booth_id WHERE s.booth_id IS NOT NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "FINAL";
            }

        } else if ($_GET["status"] == "not_reported") {
            if ($_GET["slot"] == "slot_1") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_1 s on b.booth_id = s.booth_id WHERE s.booth_id IS NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "UPTO 10 AM";
            } else if ($_GET["slot"] == "slot_2") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_2 s on b.booth_id = s.booth_id WHERE s.booth_id IS NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "UPTO 12 PM";
            } else if ($_GET["slot"] == "slot_3") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_3 s on b.booth_id = s.booth_id WHERE s.booth_id IS NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "UPTO 2 PM";
            } else if ($_GET["slot"] == "slot_4") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_4 s on b.booth_id = s.booth_id WHERE s.booth_id IS NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "UPTO 4 PM";
            } else if ($_GET["slot"] == "slot_5") {
                $stmt = $con->prepare("SELECT b.booth_id, b.booth_name, b.booth_number, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters, s.male_voters, s.fmale_voters as female_voters, s.t_voters as t_voters, s.updated_on, b.presiding_officer, b.mobile_number FROM booths b left outer join slot_5 s on b.booth_id = s.booth_id WHERE s.booth_id IS NULL and b.subdist_id = ?");
                $stmt->execute([$_GET["subdist"]]);
                $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $show = true;
                $slot = "FINAL";
            }
        }
    }
    else {
        pageInfo("warning", "Invalid Selection");
    }
} else {
    pageInfo("warning", "Invalid Selection");
}
if ($show) :
    if ($_GET["status"] == "not_reported"):
        ?>
    <h1 style="font-size: 18px">Details of Not Reported For <span class="text-danger"><?= $slot ?> - <?= $subdist ?></span> As On (<?= date("h:i:s A") ?>)</h1>
    <div class="container table-responsive">
        <table class="table bg-white mt-4 table-bordered">
            <br />
            <h2 class="text-center my-2">Slot - <?= $slot ?></h2>
            <thead class="thead-inverse text-center bg-dark text-light">
            <tr>
                <th>Sr</th>
                <th>Booth No</th>
                <th>Booth Name</th>
                <th>Presiding Officer</th>
                <th>Mobile</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; foreach ($booths as $booth): ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $booth["booth_number"] ?></td>
                <td><?= $booth["booth_name"] ?></td>
                <td><?= $booth["presiding_officer"] ?></td>
                <td><?= $booth["mobile_number"] ?></td>

            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
    <?php
    if ($_GET["status"] == "reported"):
        ?>
        <h1 style="font-size: 18px">Details of Reported Booths For <span class="text-danger"><?= $slot ?> - <?= $subdist ?></span> As On (<?= date("h:i:s A") ?>)</h1>
        <div class="container table-responsive">
            <br />
            <h2 class="text-center my-2">Slot - <?= $slot ?></h2>
            <table class="table bg-white mt-4 table-bordered">
                <thead class="thead-inverse text-center bg-dark text-light">
                <tr>
                    <th rowspan="2">Sr</th>
                    <th rowspan="2">Booth No</th>
                    <th rowspan="2">Booth Name</th>
                    <th colspan="5">Casted Votes</th>
                    <th rowspan="2">Presiding Officer</th>
                    <th rowspan="2">Mobile</th>
                </tr>
                <tr>
                    <th>Male</th>
                    <th>Female</th>
                    <th>Transgender</th>
                    <th>Total</th>
                    <th>Percentage</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 0; foreach ($booths as $booth): ?>
                    <tr>
                        <td><a href="edit-entry.php"> <?= ++$i ?> </a></td>
                        <td><?= $booth["booth_number"] ?></td>
                        <td><?= $booth["booth_name"] ?></td>
                        <td class="text-center"><?= $booth["male_voters"] ?></td>
                        <td class="text-center"><?= $booth["female_voters"] ?></td>
                        <td class="text-center"><?= $booth["t_voters"] ?></td>
                        <!--td class="text-center"><?= $booth["male_voters"] + $booth["female_voters"] + $booth["t_voters"] ?> / <?= $booth["total_male_voters"] + $booth["total_female_voters"] + $booth["total_trans_voters"] ?></td-->
                        <td class="text-center"><?= $booth["male_voters"] + $booth["female_voters"] + $booth["t_voters"] ?> </td>
                        <td class="text-center"><?= round((($booth["male_voters"] + $booth["female_voters"] + $booth["t_voters"])  /  ($booth["total_male_voters"] + $booth["total_female_voters"] + $booth["total_trans_voters"])) * 100, 4)  ?> %</td>
                        <td><?= $booth["presiding_officer"] ?></td>
                        <td><?= $booth["mobile_number"] ?></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    <?php endif; ?>
<?php
endif;
require_once __DIR__."/chunks/bottom.php";

?>
