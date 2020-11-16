<?php

require_once "../include.php";
if (!isLoginTalukaAdmin($_SESSION["t_user"]["name"], $_SESSION["t_user"]["password"])) {
    pageInfo("warning", "Session Expired!");
    header("Location: ../tlogin.php");
    exit;
}

if (
    isset($_POST["booth_name"]) &&
    isset($_POST["slot"]) &&
    isset($_POST["male_votes"]) &&
    isset($_POST["fmale_votes"]) &&
    isset($_POST["t_votes"]) &&
    ($_POST["slot"] == "slot_1" || $_POST["slot"] == "slot_2" || $_POST["slot"] == "slot_3" || $_POST["slot"] == "slot_4" || $_POST["slot"] == "slot_5")
) {
    $db = new Db();
    $con = $db->con();
    try {
        $stmt = $con->prepare("INSERT INTO ". $_POST['slot']." (booth_id, male_voters, fmale_voters, t_voters) VALUES (?, ?, ?, ?)" );
        $op = $stmt->execute([
            $_POST["booth_name"],
            $_POST["male_votes"],
            $_POST["fmale_votes"],
            $_POST["t_votes"],
        ]);

        if ($op) {
            pageInfo("success", "Successful Entry!");

            header("Location: ./");
            exit;
        }
    } catch (PDOException $e) {
        pageInfo("warning", "DB ERROR!<br />Duplicate Entry Detected!!");
        header("Location: ./");
        exit;
    }
} else {
    pageInfo("warning", "Invalid Input!");

    header("Location: ./");
    exit;
}
