<?php

require_once "../include.php";

$title = APP_SHORT_NAME . " : Edit Slot!";

require_once "chunks/top.php";

$exit = false;

$db = new Db();
$con = $db->con();
$stmt = $con->query("SELECT * FROM booths");
$booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            District Level Entry Editor/Creator!
        </div>
        <div class="card-body">
            <form method="post" onsubmit="return submitForm()" action="make-entry.php" class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="booth_name">Select Booth</label><br />
                        <select class="form-control select2" onchange="changedT(); changedB()" required name="booth_name" id="booth_name">
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
                        <select required onchange="changedT(); changedB();" class="form-control select2" name="slot" id="slot">
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
                        <label for="male_votes">Male Votes Casted (<span id="total_male_votes"></span>)</label>
                        <input type="number" onchange="changedT()" readonly required
                               class="form-control" name="male_votes" id="male_votes"
                               placeholder="Total Male Votes Casted">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="fmale_votes">Female Votes Casted (<span id="total_female_votes"></span>)</label>
                        <input type="number" onchange="changedT()" readonly required
                               class="form-control" name="fmale_votes" id="fmale_votes"
                               placeholder="Total Female Votes Casted">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="t_votes">Transgender Votes Casted (<span id="total_t_votes"></span>)</label>
                        <input type="number" onchange="changedT()" readonly required
                               class="form-control" name="t_votes" id="t_votes"
                               placeholder="Total Transgender Votes Casted">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="ttl_votes">Total Votes Casted</label>
                        <input type="number" disabled
                               class="form-control" name="ttl_votes" id="ttl_votes"
                               placeholder="Total Votes Casted">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="float-right btn btn-outline-dark">Submit</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted">
            Can be used by district administration to modify/create slot entries!
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
    window.submittable = false;
    function changedB() {
        window.submittable = false;
        changedT();
        lockFields();
        let booth = document.getElementById("booth_name").value;
        let slot = document.getElementById("slot").value;

        if (isNaN(booth)) {
            return false;
        }
        if (!(slot === "slot_1"  || slot === "slot_2" || slot === "slot_3" || slot === "slot_4" || slot === "slot_5")) {
            return false;
        }
        let xhr = new XMLHttpRequest();
        if (booth != null && slot != null) {
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.response);

                    if (response.success) {
                        window.submittable = true;
                        lockFields(false);
                        document.getElementById("total_male_votes").innerText = "Total -" + response.boothDetails.male_voters;
                        document.getElementById("total_female_votes").innerText = "Total -" + response.boothDetails.female_voters;
                        document.getElementById("total_t_votes").innerText = "Total -" + response.boothDetails.trans_voters;

                        document.getElementById("male_votes").max = response.boothDetails.male_voters;
                        document.getElementById("fmale_votes").max = response.boothDetails.female_voters;
                        document.getElementById("t_votes").max = response.boothDetails.trans_voters;

                    } else {
                        if (response.hasOwnProperty("entry")) {

                            lockFields(false);
                            window.submittable = true;

                            document.getElementById("male_votes").value = response.entry[0].male_voters;
                            document.getElementById("fmale_votes").value = response.entry[0].fmale_voters;
                            document.getElementById("t_votes").value = response.entry[0].t_voters;
                            changedT();
                        }

                        alert(response.message);
                    }
                }
                else if (this.readyState == 4 && this.status == 0) {
                    alert("Internet Connection Issue!");
                } else if (this.readyState == 4) {
                    alert("Error!\n Please Try Again! If error persists, Logout and Login Again!");
                }
            }
            xhr.open("get", "./get-entry.php?booth_id="+booth+"&slot="+slot);
            xhr.send();
        }


    }
    function lockFields(read = true) {
        document.getElementById("male_votes").readOnly = read;
        document.getElementById("fmale_votes").readOnly = read;
        document.getElementById("t_votes").readOnly = read;
        if (read) {
            document.getElementById("male_votes").value = "";
            document.getElementById("fmale_votes").value = "";
            document.getElementById("t_votes").value = "";
            clearVotes();
        }
    }
    function clearVotes() {
        document.getElementById("total_male_votes").innerText = "";
        document.getElementById("total_female_votes").innerText = "";
        document.getElementById("total_t_votes").innerText = "";
    }
    function submitForm() {
        if (window.submittable) {
            return true;
        }
        alert("Invalid Selection");
        return false;
    }
</script>
<?php

require_once "chunks/bottom.php";

?>
