<?php

require_once __DIR__."/../include.php";

$title = APP_SHORT_NAME . " : District Dashboard";


$show_nav = false;
require_once __DIR__. "/chunks/top.php";
$db = new Db();
$con = $db->con();

$show = true;
$slot = "";
if ($_GET["slot"] == "slot_1") {
    $stmt = "SELECT b.booth_number, b.booth_name, s.male_voters as male_voting_slot, s.fmale_voters as female_voting_slot, s.t_voters as trans_voting_slot, b.num_voters as total_voters, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters FROM booths b left outer join slot_1 s on b.booth_id = s.booth_id";
    $slot = "UPTO 10 AM";
} else if ($_GET["slot"] == "slot_2") {
    $stmt = "SELECT b.booth_number, b.booth_name, s.male_voters as male_voting_slot, s.fmale_voters as female_voting_slot, s.t_voters as trans_voting_slot, b.num_voters as total_voters, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters FROM booths b left outer join slot_2 s on b.booth_id = s.booth_id";
    $slot = "UPTO 12 PM";
} else if ($_GET["slot"] == "slot_3") {
    $stmt = "SELECT b.booth_number, b.booth_name, s.male_voters as male_voting_slot, s.fmale_voters as female_voting_slot, s.t_voters as trans_voting_slot, b.num_voters as total_voters, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters FROM booths b left outer join slot_3 s on b.booth_id = s.booth_id";
    $slot = "UPTO 2 PM";
} else if ($_GET["slot"] == "slot_4") {
    $stmt = "SELECT b.booth_number, b.booth_name, s.male_voters as male_voting_slot, s.fmale_voters as female_voting_slot, s.t_voters as trans_voting_slot, b.num_voters as total_voters, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters FROM booths b left outer join slot_4 s on b.booth_id = s.booth_id";
    $slot = "UPTO 4 PM";
} else if ($_GET["slot"] == "slot_5") {
    $stmt = "SELECT b.booth_number, b.booth_name, s.male_voters as male_voting_slot, s.fmale_voters as female_voting_slot, s.t_voters as trans_voting_slot, b.num_voters as total_voters, b.male_voters as total_male_voters, b.female_voters as total_female_voters, b.t_voters as total_trans_voters FROM booths b left outer join slot_5 s on b.booth_id = s.booth_id";
    $slot = "FINAL";
}
else {
    pageInfo("warning", "Invalid Selection!");
    $show = false;
}
if ($show):
    $query = $con->query($stmt);
    $res = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container-fluid table-responsive">
    <h3 class="text-center mb-3">Report : <?= $slot ?></h3>
    <table class="table table-bordered text-center">
        <thead class="thead-default">
        <tr>
            <th rowspan="2">Sr Number</th>
            <th rowspan="2">Booth Number</th>
            <th rowspan="2">Booth Name</th>
            <th colspan="4">Total Votes</th>
            <th colspan="4">Casted Votes</th>
            <th colspan="4">% Voting</th>
        </tr>
        <tr>
            <th>Male</th>
            <th>Female</th>
            <th>Transgender</th>
            <th>Total</th>
            <th>Male</th>
            <th>Female</th>
            <th>Transgender</th>
            <th>Total</th>
            <th>Male</th>
            <th>Female</th>
            <th>Transgender</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $total_votes = 0;
            $male_votes_casted = 0;
            $female_votes_casted = 0;
            $trans_votes_casted = 0;
            $available_male_votes = 0;
            $available_female_votes = 0;
            $available_trans_votes = 0;
            $i = 0; foreach ($res as $booth):
                $male_voting = $booth["male_voting_slot"] ?? 0;
                $female_voting = $booth["female_voting_slot"] ?? 0;
                $trans_voting = $booth["trans_voting_slot"] ?? 0;
                $total_votes += $booth["total_voters"];
                $votes_casted = $male_voting + $female_voting + $trans_voting;
                $male_votes_casted += $male_voting;
                $female_votes_casted += $female_voting;
                $trans_votes_casted += $trans_voting;
                $available_male_votes += $booth["total_male_voters"];
                $available_female_votes += $booth["total_female_voters"];
                $available_trans_votes += $booth["total_trans_voters"];
                ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $booth["booth_number"] ?></td>
                <td><?= $booth["booth_name"] ?></td>
                <td><?= $booth["total_male_voters"] ?></td>
                <td><?= $booth["total_female_voters"] ?></td>
                <td><?= $booth["total_trans_voters"] ?></td>
                <td><?= $booth["total_voters"] ?></td>
                <td><?= $male_voting ?></td>
                <td><?= $female_voting ?></td>
                <td><?= $trans_voting ?></td>
                <td><?= $votes_casted ?></td>
                <td><?= $booth["total_male_voters"] != 0 ? round(100 * ($male_voting / $booth["total_male_voters"]) , 4) : "NA" ?></td>
                <td><?= $booth["total_female_voters"] != 0 ? round(100 * ($female_voting / $booth["total_female_voters"]) , 4) : "NA" ?></td>
                <td><?= $booth["total_trans_voters"] != 0 ? round(100 * ($trans_voting / $booth["total_trans_voters"]) , 4) : "NA" ?></td>
                <td><?= round(100 * ($votes_casted/$booth["total_voters"]), 4)  ?></td>


            </tr>
            <?php endforeach;
                $total_votes_casted = $male_votes_casted + $female_votes_casted + $trans_votes_casted;
            ?>
            <tr>
                <th colspan="3">Total</th>
                <th><?= $available_male_votes ?></th>
                <th><?= $available_female_votes ?></th>
                <th><?= $available_trans_votes ?></th>
                <th><?= $total_votes ?></th>
                <th><?= $male_votes_casted ?></th>
                <th><?= $female_votes_casted ?></th>
                <th><?= $trans_votes_casted ?></th>
                <th><?= $total_votes_casted ?></th>
                <td><?= $available_male_votes != 0 ? round(100 * ($male_votes_casted / $available_male_votes) , 4) : "NA" ?></td>
                <td><?= $available_female_votes != 0 ? round(100 * ($female_votes_casted / $available_female_votes) , 4) : "NA" ?></td>
                <td><?= $available_trans_votes != 0 ? round(100 * ($trans_votes_casted / $available_trans_votes ) , 4) : "NA" ?></td>



                <th><?= round(100 * ($total_votes_casted/$total_votes), 4) ?></th>
            </tr>
        </tbody>
    </table>
</div>
<?php
    endif;
    require_once "chunks/bottom.php";
?>
