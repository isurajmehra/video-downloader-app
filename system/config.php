<?php

$config["url"] = "https://video-downloader-app.com";
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $config["url"] = "http://localhost/video-downloader-app";
}


/*
 * Don't change below lines
 */
//require_once(__DIR__ . "/../language/" . $config["language"] . ".php");
require_once("functions.php");
