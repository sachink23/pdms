<?php

require_once "../include.php";
if (!isLoginTalukaAdmin($_SESSION["t_user"]["name"], $_SESSION["t_user"]["password"])) {
    pageInfo("warning", "Session Expired!");
    header("Location: ../dlogin.php");
    exit;
}
$op = new StdClass();
$op->success = false;
$op->message = "Invalid Selection";
if (isset($_GET["booth_id"]) && isset($_GET["slot"])) {
    $db = new Db();
    $con = $db->con();
    $stmt = $con->prepare("SELECT * FROM booths WHERE booth_id = ? and subdist_id = ?");

    $stmt->execute([$_GET["booth_id"], $_SESSION["t_user"]["subdist_id"]]);

    $booths = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($booths) == 1) {
        $booth = $booths[0];
        $stmt = $con->prepare("SELECT * FROM slot_1 WHERE booth_id = ?");
        $stmt->execute([$_GET["booth_id"]]);
        $slot_1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($_GET["slot"] == "slot_1") {
            if (count($slot_1) == 0) {
                $op->success = true;
                $op->message = "Entry Pending";
                $op->boothDetails = [
                    "male_voters" => $booth["male_voters"],
                    "female_voters" => $booth["female_voters"],
                    "trans_voters" => $booth["t_voters"]
                ];
                die(json_encode($op));
            } else {
                $op->message = "Entry Already Done For Slot 1";
                $op->entry = $slot_1;
                die(json_encode($op));
            }
        }
        $stmt = $con->prepare("SELECT * FROM slot_2 WHERE booth_id = ?");
        $stmt->execute([$_GET["booth_id"]]);
        $slot_2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($_GET["slot"] == "slot_2") {
            if (count($slot_1) == 0) {
                $op->success = false;
                $op->message = "First Slot Entry Pending! Complete First Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_2) == 0) {
                $op->success = true;
                $op->message = "Entry Pending";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"],
                    "male_voters" => $booth["male_voters"],
                    "female_voters" => $booth["female_voters"],
                    "trans_voters" => $booth["t_voters"]
                ];
                die(json_encode($op));
            } else {
                $op->message = "Entry Already Done For Slot 2";
                $op->entry = $slot_2;
                die(json_encode($op));
            }
        }
        $stmt = $con->prepare("SELECT * FROM slot_3 WHERE booth_id = ?");
        $stmt->execute([$_GET["booth_id"]]);
        $slot_3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($_GET["slot"] == "slot_3") {
            if (count($slot_1) == 0) {
                $op->success = false;
                $op->message = "First Slot Entry Pending! Complete First Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_2) == 0) {
                $op->success = false;
                $op->message = "Second Slot Entry Pending! Complete Second Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_3) == 0) {
                $op->success = true;
                $op->message = "Entry Pending";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"],
                    "male_voters" => $booth["male_voters"],
                    "female_voters" => $booth["female_voters"],
                    "trans_voters" => $booth["t_voters"]
                ];
                die(json_encode($op));
            } else {
                $op->message = "Entry Already Done For Slot 3";
                $op->entry = $slot_3;
                die(json_encode($op));
            }
        }
        $stmt = $con->prepare("SELECT * FROM slot_4 WHERE booth_id = ?");
        $stmt->execute([$_GET["booth_id"]]);
        $slot_4 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($_GET["slot"] == "slot_4") {
            if (count($slot_1) == 0) {
                $op->success = false;
                $op->message = "First Slot Entry Pending! Complete First Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_2) == 0) {
                $op->success = false;
                $op->message = "Second Slot Entry Pending! Complete Second Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_3) == 0) {
                $op->success = false;
                $op->message = "Third Slot Entry Pending! Complete Third Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_4) == 0) {
                $op->success = true;
                $op->message = "Entry Pending";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"],
                    "male_voters" => $booth["male_voters"],
                    "female_voters" => $booth["female_voters"],
                    "trans_voters" => $booth["t_voters"]
                ];
                die(json_encode($op));
            } else {
                $op->message = "Entry Already Done For Slot 4";
                $op->entry = $slot_4;
                die(json_encode($op));
            }
        }
        $stmt = $con->prepare("SELECT * FROM slot_5 WHERE booth_id = ?");
        $stmt->execute([$_GET["booth_id"]]);
        $slot_5 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($_GET["slot"] == "slot_5") {
            if (count($slot_1) == 0) {
                $op->success = false;
                $op->message = "First Slot Entry Pending! Complete First Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_2) == 0) {
                $op->success = false;
                $op->message = "Second Slot Entry Pending! Complete Second Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_3) == 0) {
                $op->success = false;
                $op->message = "Third Slot Entry Pending! Complete Third Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_4) == 0) {
                $op->success = false;
                $op->message = "Fourth Slot Entry Pending! Complete Fourth Entry!";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"]
                ];
                die(json_encode($op));
            }
            if (count($slot_5) == 0) {
                $op->success = true;
                $op->message = "Entry Pending";
                $op->boothDetails = [
                    "booth_name" => $booth["booth_name"],
                    "male_voters" => $booth["male_voters"],
                    "female_voters" => $booth["female_voters"],
                    "trans_voters" => $booth["t_voters"]
                ];
                die(json_encode($op));
            } else {
                $op->message = "Entry Already Done For Slot 5";
                $op->entry = $slot_5;
                die(json_encode($op));
            }
        }

    }
}
echo json_encode($op);
