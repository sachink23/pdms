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
                break;
            } catch (PDOException $e) {
                pageInfo("warning","Database Error! Failed To Change Password For ".$_POST["sdid"]. ".");
                header("Location: ./");
                exit;
            }
        } else {
            invalidRq();
        }

    case "update_booth_details":
        if (
            isset($_POST["booth_num"]) &&
            isset($_POST["booth_name"]) &&
            isset($_POST["male_voters"]) &&
            isset($_POST["fmale_voters"]) &&
            isset($_POST["t_voters"]) &&
            isset($_POST["b"]) &&
            isset($_POST["officer"]) &&
            isset($_POST["contact"])

        ) {
            $stmt = $con->prepare("UPDATE booths SET booth_number = ?, booth_name = ?, male_voters = ?, female_voters = ?, t_voters = ?, num_voters = ?, presiding_officer = ?, mobile_number = ? WHERE booth_id = ?");
            try {
                $stmt->execute([
                    $_POST["booth_num"],
                    $_POST["booth_name"],
                    $_POST["male_voters"],
                    $_POST["fmale_voters"],
                    $_POST["t_voters"],
                    $_POST["male_voters"] + $_POST["fmale_voters"] + $_POST["t_voters"],
                    $_POST["officer"],
                    $_POST["contact"],
                    $_POST["b"]

                ]);
                pageInfo("success", "Successfully Edited Booths!");
                header("Location: edit-booth.php?bid=".$_POST["b"]);
                break;
            }
            catch (PDOException $e) {
                pageInfo("warning", "Failed! DB_ERROR!");
                header("Location: edit-booth.php?bid=".$_POST["bid"]);

            }

        } else {
            invalidRq();
        }
    default:
        invalidRq();

}
