<?php

require_once "../include.php";

$title = APP_SHORT_NAME . " : Edit Booth";
if (!isset($_GET["bid"])) {
    pageInfo("warning", "Invalid Request");
    header("Location: ./");
    exit;
}
require_once "chunks/top.php";
$exit = false;
try {
    $db = new Db();
    $con = $db->con();

    $stmt = $con->prepare("SELECT * FROM booths WHERE booth_id = ?");
    $stmt->execute([$_GET["bid"]]);
    $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($booths) != 1) {
        pageInfo("warning", "Invalid Request");
        $exit = true;
    } else {
        $booth = $booths[0];

        $taluka = $con->query("SELECT name FROM subdistricts WHERE subdist_id = ".$booth["subdist_id"]);
        $t = $taluka->fetchAll(PDO::FETCH_ASSOC)[0]["name"];
    }

} catch (PDOException $e) {
    pageInfo("warning", "DB Error!");
    $exit = true;
}

if (!$exit):
?>
    <div class="card">
        <div class="card-header">
            Booth Details
        </div>
        <form method="post" action="forms.php?action=update_booth_details" class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="booth_num">Booth Number</label>
                        <input type="text" required class="form-control" name="booth_num" id="booth_num" value="<?= $booth['booth_number'] ?>">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="booth_num">Booth Name</label>
                        <textarea required class="form-control" name="booth_name" id="booth_name"><?= $booth['booth_name'] ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Taluka</label>
                        <input type="text" disabled value="<?= $t ?>"
                               class="form-control" >
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="form-group">
                        <label for="male_voters">Male Voters</label>
                        <input type="number" onchange="calculateTotal()" required class="form-control" name="male_voters" id="male_voters" value="<?= $booth['male_voters'] ?>">
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="form-group">
                        <label for="fmale_voters">Female Voters</label>
                        <input type="number" onchange="calculateTotal()" required class="form-control" name="fmale_voters" id="fmale_voters" value="<?= $booth['female_voters'] ?>">
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="form-group">
                        <label for="t_voters">Transgender Voters</label>
                        <input type="number" onchange="calculateTotal()" required class="form-control" name="t_voters" id="t_voters" value="<?= $booth['t_voters'] ?>">
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="form-group">
                        <label for="total_voters">Total Voters</label>
                        <input type="number" disabled class="form-control" name="total_voters" id="total_voters" >
                    </div>
                </div>
            </div>
            <input type="hidden" name="b" value="<?= $_GET['bid'] ?>">
            <button type="submit" class="btn float-right btn-outline-dark">Modify Booth</button>

        </form>

    </div>

<script>
    function calculateTotal() {
        document.getElementById("total_voters").value = parseInt(document.getElementById("male_voters").value) + parseInt(document.getElementById("fmale_voters").value) + parseInt(document.getElementById("t_voters").value)
    }
    calculateTotal();
</script>
<?php
    endif;
    require_once "chunks/bottom.php";
?>
