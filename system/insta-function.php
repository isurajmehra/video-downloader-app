<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("functions.php");

if (!empty($_POST["videourl"]) && !empty($_POST["mime"])) {
    $_SESSION['web'] = 'insta';
    $_SESSION['url'] = base64_encode($_POST["videourl"]);
    $_SESSION['url-size'] = getRemoteFilesize($_POST["videourl"]);
    $_SESSION['title'] = $_POST["title"];
    $_SESSION['mime'] = $_POST["mime"];
    $_SESSION['ext'] = $_POST["ext"];
    redirect("../download-instagram-videos.php#step2");
    die();
}  else {
    redirect("../error.php");
    die();
}