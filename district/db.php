<?php

require_once "../include.php";

$title = APP_SHORT_NAME . " : District Dashboard";

require_once "chunks/top.php";
if (isset($_POST["query"])) {
    $_SESSION["Q"] = $_POST["query"];
    $db = new db;
    $con = $db->con();
    try {
        $q = $con->query(trim($_POST["query"]));
        if ($q) {
            $d = "Successfully Executed Query!";
            try {
                $_SESSION["Q_DATA"] = $q->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                $_SESSION["Q_DATA"] = [];
            }
            pageInfo("success", $d);
        } else {
            pageInfo("warning", "Failed!");
        }

    } catch (PDOException $e) {
        pageInfo("danger", $e->getMessage());
    }

}
$query = $_SESSION["Q"] ?? "";
$data = $_SESSION["Q_DATA"] ?? [];
?>
<form method="post" class="container-fluid mb-3" action="">

    <div class="form-group">
        <label for="query">Query</label>
        <textarea class="form-control" name="query" id="query" rows="3"><?= $query ?></textarea>
    </div>
    <button type="submit" class="btn float-right btn-outline-primary">Execute Query</button>
</form>
<?php if (count($data) > 0): ?>
    <div class="container-fluid table-responsive">
        <br />
        <table class="table table-bordered py-2">
            <thead class="thead-inverse bg-dark text-light">
            <tr>
                <?php foreach ($data[0] as $field_name => $val): ?>
                    <th><?= $field_name ?></th>
                <?php endforeach; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $data_): ?>
                <tr>
                    <?php foreach ($data_ as $d => $v): ?>
                        <td><?= $v ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php unset($_SESSION["Q_DATA"]); endif; ?>
<?php

require_once "chunks/bottom.php"; ?>


