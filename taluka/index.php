<?php

require_once "../include.php";

$title = APP_SHORT_NAME . " : Booth Entry";

require_once "chunks/top.php";

$db = new Db();
$con = $db->con();
$stmt = $con->query("SELECT * FROM booths WHERE subdist_id = ".$_SESSION["t_user"]["subdist_id"]);
$booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Data Entry
        </div>
        <div class="card-body">
            <form method="post" action="make-entry.php" class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="booth_name">Select Booth</label><br />
                        <select class="form-control select2" onchange="changedT()" required name="booth_name" id="booth_name">
                            <option value="">Select Booth</option>
                            <?php foreach ($booths as $booth): ?>
                                <option value="<?= $booth['booth_id'] ?>"><?= $booth["booth_number"] ?> - <?= $booth["booth_name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="slot">Select Time Slot</label><br />
                        <select required onchange="changedT()" class="form-control select2" name="slot" id="slot">
                            <option value="">Select Time Slot</option>
                            <option value="slot_1">Upto 10 AM</option>
                            <option value="slot_2">Upto 12 PM</option>
                            <option value="slot_3">Upto 2 PM</option>
                            <option value="slot_4">Upto 4 PM</option>
                            <option value="slot_5">FINAL</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="male_votes">Male Votes Casted</label>
                        <input type="number" onchange="changedT()"
                               class="form-control" name="male_votes" id="male_votes"
                               placeholder="Total Male Votes Casted">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="fmale_votes">Female Votes Casted</label>
                        <input type="number" onchange="changedT()"
                               class="form-control" name="fmale_votes" id="fmale_votes"
                               placeholder="Total Female Votes Casted">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="t_votes">Transgender Votes Casted</label>
                        <input type="number" onchange="changedT()"
                               class="form-control" name="t_votes" id="t_votes"
                               placeholder="Total Transgender Votes Casted">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="ttl_votes">Total Votes Casted</label>
                        <input type="number" disabled
                               class="form-control" name="ttl_votes" id="ttl_votes"
                               placeholder="Total Transgender Votes Casted">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="float-right btn btn-outline-dark">Submit</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            Please Enter Details Correctly. Once Entered, The Details Can't Be Modified!
        </div>
    </div>
</div>
<script>
    function changedT() {
        let male_votes = 0;
        let fmale_votes = 0;
        let t_votes = 0;
        if (document.getElementById("male_votes").value) {
            male_votes = parseInt(document.getElementById("male_votes").value);
        }
        if (document.getElementById("fmale_votes").value) {
            fmale_votes = parseInt(document.getElementById("fmale_votes").value);
        }
        if (document.getElementById("t_votes").value) {
            t_votes = parseInt(document.getElementById("t_votes").value);
        }
        document.getElementById("ttl_votes").value = male_votes + fmale_votes + t_votes;
    }
</script>
<?php

require_once "chunks/bottom.php";

?>
