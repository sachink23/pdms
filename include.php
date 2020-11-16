<?php

require_once __DIR__."/db.class.php";
require_once __DIR__."/db.php";

define("APP_NAME", "POLL DAY MONITORING SYSTEM");
define("APP_SHORT_NAME", "PDMS");
define("APP_SALT", "SoeApldldsajf");
define("APP_ROOT", __DIR__);
define("APP_DESC", "05 - औरंगाबाद विभाग पदविधर मतदारसंघ निवडणूक - 2020");

date_default_timezone_set("Asia/Calcutta");

session_start();

function pageInfo($type, $content)
{
    $_SESSION["PAGE_INFO_EXISTS"] = TRUE;
    $_SESSION["PAGE_INFO_TYPE"] = strtolower($type);
    $_SESSION["PAGE_INFO"] = $content;
}
function invalidRq() {
    pageInfo("danger", "Invalid Request!");
    header("Location: ./");
    exit;
}
function clearPageInfo()
{
    unset($_SESSION["PAGE_INFO_EXISTS"]);
    unset($_SESSION["PAGE_INFO_TYPE"]);
    unset($_SESSION["PAGE_INFO"]);
}

function hashPass($password) {
    return hash_hmac("md5", $password, APP_SALT);
}

function isLoginTalukaAdmin($username, $password) {
    try {
        $db = new Db();
        $con = $db->con();
        $stmt = $con->prepare("SELECT * FROM subdistricts WHERE name = ? and password = ?");
        $stmt->execute([trim($username), $password]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($res) == 1) {
            $_SESSION["t_user"] = $res[0];
            $_SESSION["t_logged_in"] = true;
            return true;
        } else {
            logout();
            return false;
        }
    } catch(PDOException $e) {
        pageInfo("warning","DB ERROR!");
        return false;
    }

}

function isLoginDistAdmin($username, $password) {
    try {
        $db = new Db();
        $con = $db->con();
        $stmt = $con->prepare("SELECT * FROM admin WHERE username = ? and password = ?");
        $stmt->execute([trim($username), $password]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($res) == 1) {
            $_SESSION["d_user"] = $res[0];
            $_SESSION["d_logged_in"] = true;
            return true;
        } else {
            logout();
            return false;
        }
    } catch(PDOException $e) {

        pageInfo("warning","DB ERROR!");
        return false;
    }

}
function logout() {
    unset($_SESSION["t_user"]);
    unset($_SESSION["d_user"]);
    unset($_SESSION["t_logged_in"]);
    unset($_SESSION["d_logged_in"]);
    session_destroy();
    session_start();
}



