<?php
require_once("config.php");
session_start();
if (!empty($_POST["url"]) && getDomain($_POST["url"]) === "facebook.com" && parse_url($_POST["url"])["path"] != "/story.php") {
    $data = url_get_contents($_POST["url"]);
    $hdlink = hdLink($data);
    $sdlink = sdLink($data);

    if (!empty($sdlink)) {
        $tit = getTitle($data);
        $_SESSION['web'] = 'facebook';
        $_SESSION['title'] = ($tit != '' && $tit != '0') ? $tit."_Video_downloader" : 'Video_downloader';
        $_SESSION['url'] = base64_encode($sdlink);
        $_SESSION['url-size'] = !empty($sdlink) ? getRemoteFilesize($sdlink) : '';
        $_SESSION['url-hd'] = base64_encode($hdlink);
        $_SESSION['url-hd-size'] = !empty($hdlink) ? getRemoteFilesize($hdlink) : '';
        $_SESSION['mime'] = 'video/mp4';
        $_SESSION['ext'] = 'mp4';

        redirect($config["url"] . "/download-facebook-videos.php#step2");
        die();
    } else {
        redirect($config["url"] . "/error.php");
        die();
    }
} else if (!empty($_POST["url"]) && parse_url($_POST["url"])["host"] === "m.facebook.com") {
  $data = url_get_contents($_POST["url"]);
  $getMbLinkUrl = getFbMbLink($data);
  $getMbLinkData = url_get_contents($getMbLinkUrl);
  $hdlink = hdLink($getMbLinkData);
  $sdlink = sdLink($getMbLinkData);
  if (!empty($sdlink)) {
        $tit = getTitle($data);
        $_SESSION['title'] = ($tit != '' && $tit != '0') ? $tit."_video_downloader" : 'video_downloader';
        $_SESSION['url'] = base64_encode($sdlink);
        $_SESSION['url-size'] = !empty($sdlink) ? getRemoteFilesize($sdlink) : '';
        $_SESSION['url-hd'] = base64_encode($hdlink);
        $_SESSION['url-hd-size'] = !empty($hdlink) ? getRemoteFilesize($hdlink) : '';
        $_SESSION['mime'] = 'video/mp4';
        $_SESSION['ext'] = 'mp4';
        redirect($config["url"] . "/download-facebook-videos.php#step2");
      die();
  } else {
      redirect($config["url"] . "/error.php");
      die();
  }
} else {
    redirect($config["url"] . "/error.php");
    die();
}
