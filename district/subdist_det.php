<?php

require_once "../include.php";

$title = APP_SHORT_NAME . " : Subdist Details";

require_once __DIR__. "/chunks/top.php";
$exit = false;
if (isset($_GET["t"])) {
    $db = new Db();
    $con = $db->con();
    $q = $con->prepare("SELECT subdist_id as tid FROM subdistricts WHERE name = ?");
    try {
        $q->execute([$_GET["t"]]);
        $t = $q->fetchAll(PDO::FETCH_ASSOC);
        if (count($t) == 1) {
            $tid = $t[0]['tid'];

            $q = $con->query("SELECT count(*) as booths, sum(num_voters) as voters FROM booths WHERE subdist_id = ".$tid);
            $booth_details = $q->fetchAll(PDO::FETCH_ASSOC)[0];
            $q = $con->query("SELECT * FROM booths WHERE subdist_id = ".$tid);
            $booths = $q->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $exit = true;
        }
    } catch (PDOException $e) {
        pageInfo("warning", "DB_ERROR!");
        $exit = true;
    }
}
else {
    pageInfo("warning", "Invalid Request");
    $exit = true;
}
if (!$exit):
?>
<div class="row">
    <div class="col-12 my-2">
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#changePassModel">Change Password</button>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Taluka - <?= $_GET['t'] ?> | Booths - <?= $booth_details["booths"] ?> | Voters - <?= $booth_details["voters"] ?>
            </div>
            <div class="card-body text-center  table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Booth Number</th>
                        <th>Booth Name</th>
                        <th>Voters</th>
                        <!--th>Edit</th-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0; foreach ($booths as $booth): ?>
                    <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $booth["booth_number"] ?></td>
                        <td><?= $booth["booth_name"] ?></td>
                        <td><?= $booth["num_voters"] ?></td>
                        <!--td><a href="edit-booth.php?bid=<?= $booth["booth_id"] ?>"><i class="fa fa-pencil text-danger" aria-hidden="true"></i></a></td-->
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="changePassModel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form onsubmit="function confirmPass() {
                if (document.getElementById('password').value.length < 8) {
                    alert('Password Should Be At Least 8 Digit!')
                    return false;
                }
                if (document.getElementById('password').value != document.getElementById('password_C').value) {
                    alert('New and Confirmed Passwords Should Match!')
                    return false;
                }
                return true;
            }
            return confirmPass()" method="post" action="forms.php?action=change_sdist_pass" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Taluka Password For  <?= $_GET["t"] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password"
                                   class="form-control" name="password" id="password" required aria-describedby="new_pass_help"
                                   placeholder="New Password">
                            <small id="new_pass_help" class="form-text text-muted">Create New Password</small>
                        </div>
                        <div class="form-group">
                            <label for="password_C">Confirm Password</label>
                            <input type="password"
                                   class="form-control" name="password_C" id="password_C" required aria-describedby="c_pass_help"
                                   placeholder="Confirm Password">
                            <small id="c_pass_help" class="form-text text-muted">Confirm New Password</small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="sdid" value="<?= $_GET['t'] ?>">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
<?php
endif;
require_once __DIR__. "/chunks/bottom.php";

?>

