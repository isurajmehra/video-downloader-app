<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once("functions.php");

if (!empty($_POST["url"]) && getDomain($_POST["url"]) === "youtube.com") {
//    if (isset($_POST['submit'])) {
        // session_destroy();
        $video_link = trim($_POST['url']);
        if ($video_link != "") {
            $video_id = "";
            $thumbnail_img = "";
            $video_id_arr = getVideoId($video_link);
            if (sizeof($video_id_arr) == 3)
                $video_id = $video_id_arr[2];
            if ($video_id != "") {
                $data = file_get_contents("https://www.youtube.com/get_video_info?video_id={$video_id}");

                parse_str($data, $info);

                if (!empty($info) && $info['status'] == 'ok') {
                    $player_response = json_decode($info['player_response'], true);
                    if (isset($player_response['videoDetails'])) {
                        if (isset($player_response['videoDetails']['thumbnail']['thumbnails'])){
                            $thumbnail = end($player_response['videoDetails']['thumbnail']['thumbnails']);
                            $thumbnail_img = $thumbnail['url'];
                        }
                    }
                    if (isset($player_response['streamingData']['formats'])) {
                        foreach ($player_response['streamingData']['formats'] as $key => $stream) {
                            $_SESSION['web'] = 'youtube';
                            $_SESSION['thumbnail'] = !empty($thumbnail_img) ? $thumbnail_img : '';
                            $_SESSION['youtube'][$key]['title'] = !empty($player_response['videoDetails']['title']) ? $player_response['videoDetails']['title'].'_Video_Downloader' : 'Video_Downloader';
                            $_SESSION['youtube'][$key]['url'] = base64_encode($stream['url']);
                            $_SESSION['youtube'][$key]['quality'] = $stream['qualityLabel'];
                            $size = getRemoteFilesize($stream['url'], true);
                            $_SESSION['youtube'][$key]['size_in_bytes'] = $size['size_in_bytes'];
                            $_SESSION['youtube'][$key]['size_in_mb'] = $size['size_in_mb'];
                            $video_type = explode(";", $stream['mimeType']);
                            $_SESSION['youtube'][$key]['video_type'] = $video_type[0];
                            $video_type1 = explode("/", $video_type[0]);
                            $_SESSION['youtube'][$key]['ext'] = $video_type1[1];
                        }
                        // echo '<pre>'; print_r($_SESSION['youtube']); echo '</pre>'; exit;
                        array_multisort(array_column($_SESSION['youtube'], "size_in_bytes"), SORT_DESC, $_SESSION['youtube']);
                         // echo json_encode(['video_title' => $video_title,'video_data' => $video_data]);
                        redirect("../download-youtube-videos#step2");
                        die();
                    } else {
                        redirect("../error");
                        die();
                    }
                } else {
                    redirect("/error");
                    die();
                }
            }
        }
//    }
} else {
    redirect("/error");
    die();
}
