<?php

require_once __DIR__."/../include.php";

$title = APP_SHORT_NAME . " : Reports";



require_once __DIR__. "/chunks/top.php";

$db = new Db();
$con = $db->con();

?>
    <h1>Reports</h1><hr />
    <div class="list-group">
        <a href="get-report.php?slot=slot_1" class="list-group-item list-group-item-action">Report UPTO 10 AM</a>
        <a href="get-report.php?slot=slot_2" class="list-group-item list-group-item-action">Report UPTO 12 PM</a>
        <a href="get-report.php?slot=slot_3" class="list-group-item list-group-item-action">Report UPTO 2 PM</a>
        <a href="get-report.php?slot=slot_4" class="list-group-item list-group-item-action">Report UPTO 4 PM</a>
        <a href="get-report.php?slot=slot_5" class="list-group-item list-group-item-action">Report Final</a>
    </div>

<?php

require_once __DIR__."/chunks/bottom.php";

?>
