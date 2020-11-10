<?php
require_once "../include.php";
if (!isLoginDistAdmin($_SESSION["d_user"]["username"], $_SESSION["d_user"]["password"])) {
    logout();
    pageInfo("warning", "Session Expired!");
    header("Location: ../dlogin.php");
    exit;
}

if (!isset($_GET["action"])) {
    //invalidRq();
}
$db = new Db();
$con = $db->con();
switch ($_GET["action"]) {
    case "change_sdist_pass":
        if (isset($_POST["password"]) && isset($_POST["sdid"])) {
            $q = $con->prepare("UPDATE subdistricts SET password = ? WHERE name = ?");
            try {
                $q->execute([hashPass($_POST["password"]), $_POST["sdid"]]);
                pageInfo("success","Successfully Changed Password!");
                header("Location: ./subdist_det.php?t=".$_POST["sdid"]);

                exit;
            } catch (PDOException $e) {
                pageInfo("warning","Database Error! Failed To Change Password For ".$_POST["sdid"]. ".");
                header("Location: ./");
                exit;
            }
        } else {
            invalidRq();
        }
    default:
        invalidRq();

}
