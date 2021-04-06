<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("functions.php");
if (isset($_POST["url"]) && !empty($_POST["url"])) {
    $insta = getInstaVideoUrl($_POST["url"]);
    $_SESSION['web'] = 'insta';
    $_SESSION['url'] = base64_encode($insta["url"]);
    $_SESSION['url-size'] = getRemoteFilesize($insta["url"]);
    $_SESSION['title'] = $insta["title"];
    $_SESSION['mime'] = $insta["mime"];
    $_SESSION['ext'] = $insta["ext"];
    redirect("../download-instagram-videos#step2");
    die();
}  else {
    redirect("../error");
    die();
}