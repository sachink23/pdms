<?php

require_once "../include.php";

if (isset($_SESSION["d_user"]["username"]) && isset($_SESSION["d_user"]["password"])) {


    if (!isLoginDistAdmin($_SESSION["d_user"]["username"], $_SESSION["d_user"]["password"])) {
        pageInfo("warning", "Session Expired!");
        header("Location: ../dlogin.php");
        exit;
    }

}
else {
    pageInfo("warning", "Login Required!");
    header("Location: ../dlogin.php");
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
        $con->beginTransaction();
        $stmt = $con->prepare("DELETE FROM ". $_POST['slot'] . " WHERE booth_id = ?");
        $stmt->execute([$_POST["booth_name"]]);
        $stmt = $con->prepare("INSERT INTO ". $_POST['slot']." (booth_id, male_voters, fmale_voters, t_voters) VALUES (?, ?, ?, ?)" );
        $op = $stmt->execute([
            $_POST["booth_name"],
            $_POST["male_votes"],
            $_POST["fmale_votes"],
            $_POST["t_votes"]
        ]);

        if ($op) {
            $con->commit();
            pageInfo("success", "Successful Edited/Created Entry!");

            header("Location: ./edit-slot.php");
            exit;
        } else {
            $con->rollBack();
        }

    } catch (PDOException $e) {
        $con->rollBack();

        pageInfo("warning", "DB ERROR!");
        header("Location: ./edit-slot.php");

        exit;
    }
} else {
    pageInfo("warning", "Invalid Input!");

    header("Location: ./edit-slot.php");

    exit;
}
