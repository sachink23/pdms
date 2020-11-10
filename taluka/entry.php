<?php

require_once "../include.php";

$title = APP_SHORT_NAME . " : Booth Entry";

require_once "chunks/top.php";

$db = new Db();

$con = $db->con();

$stmt = $con->prepare("SELECT * FROM booths WHERE booth_id = ? and subdist_id = ?");

?>
