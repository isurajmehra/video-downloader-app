<?php
if (!isset($_SESSION) && empty($_SESSION)) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_REQUEST['fname']) && function_exists($_REQUEST['fname'])) {
    $_REQUEST['fname']();
} else if (isset($_GET['fname']) && function_exists($_GET['fname'])) {
    $_GET['fname']();
}

function cleanStr($str)
{

    return html_entity_decode(strip_tags(preg_replace('/[^A-Za-z0-9]/', ' ', $str)), ENT_QUOTES, 'UTF-8');
}

function convertUrl($url)
{
    $url = str_replace("\\", "", $url);
    $url = str_replace("&amp", "&", $url);
    $url = str_replace("&;", "&", $url);
    $url = "https:" . $url;
    return $url;
}

function mobilLink($curl_content)
{
    $regex = '@&quot;https:(.*?)&quot;,&quot;@si';
    if (preg_match_all($regex, $curl_content, $match)) {
        return $match[1][0];
    } else {
        return;
    }

}

function hdLink($curl_content)
{
    $regex = '/hd_src:"([^"]+)"/';
    if (preg_match($regex, $curl_content, $match)) {
        return $match[1];
    } else {
        return;
    }
}

function sdLink($curl_content)
{
    $regex = '/sd_src:"([^"]+)"/';
    if (preg_match($regex, $curl_content, $match1)) {
        return $match1[1];
    } else {
        return;
    }
}

function getFbMbLink($curl_content)
{
    $convert_mbltodesk = '';
    if (preg_match('/link rel="canonical" href="(.*?)"/is', $curl_content, $matches)) {
      $convert_mbltodesk = $matches[1];
    }
    return $convert_mbltodesk;
}

function getTitle($curl_content)
{
    $title = '';
    if (preg_match('/h2 class="uiHeaderTitle"?[^>]+>(.+?)<\/h2>/', $curl_content, $matches)) {
        $title = $matches[1];
    } else if (preg_match('/<title id="pageTitle">(.*)<\/title>/is', $curl_content, $matches)) {
        $title = $matches[1];
    }
    return cleanStr($title);
}

function getDomain($url)
{
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return $regs['domain'];
    }
    return false;
}

function getInstaVideoUrl($url)
{
    $curl_content = url_get_contents($url);
    $regexVideo = '/property="og:video" content="(.*?)"/';
    $regexType = '/property="og:video:type" content="(.*?)"/';
    $regexTitle = '/property="og:title" content="(.*?)"/';

    $returnArray = [];
    if (preg_match($regexVideo, $curl_content, $match1)) {
        $returnArray['url'] = $match1[1];
    }

    if (preg_match($regexType, $curl_content, $match2)) {
        $returnArray['mime'] = $match2[1];
        $returnArray['ext'] = "mp4";
    }

    if (preg_match($regexTitle, $curl_content, $match3)) {
        $returnArray['title'] = $match3[1];
    } else {
        $returnArray['title'] = "video-downloader-app";
    }
    return $returnArray;
}

function redirect($url)
{
    header('Location: ' . $url);
}

function url_get_contents($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge/12.10240');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

// For youtube funtionalities

function getRemoteFilesize($url = null, $byte = false, $formatSize = true, $useHead = true){
    $url = ($url == null) ? $_POST['url'] : $url;
    if (false !== $useHead) {
        stream_context_set_default(array('http' => array('method' => 'HEAD')));
    }

    $head = array_change_key_case(get_headers($url, 1));

    // content-length of download (in bytes), read from Content-Length: field
    $clen = isset($head['content-length']) ? $head['content-length'] : 0;
    $temp = '';
    if (is_array($clen)) {
      $temp = isset($clen[0]) && !empty($clen[0]) ? $clen[0] : '';
      $temp = !empty($temp) ? $clen : (isset($clen[1]) && !empty($clen[1]) ? $clen[1] : '');
    }
    $clen = !empty($temp) ? $temp : $clen;
    $biggest_value = 0;
    // if(sizeof($clen) > 1) {
    //     for($i=0; $i<($clen); $i++) {
    //         if($clen[$i] > $biggest_value) $biggest_value = $clen[$i];
    //     }
    //     $clen = $biggest_value;
    // }

    // cannot retrieve file size, return "-1"
    if (!$clen) {
        return -1;
    }

    if (!$formatSize) {
        return $clen; // return size in bytes
    }

    $size = $clen;
    switch ($clen) {
        case $clen < 1024:
            $size = $clen .' B'; break;
        case $clen < 1048576:
            $size = round($clen / 1024, 2) .' KiB'; break;
        case $clen < 1073741824:
            $size = round($clen / 1048576, 2) . ' MiB'; break;
        case $clen < 1099511627776:
            $size = round($clen / 1073741824, 2) . ' GiB'; break;
    }
    return ($byte) ? ['size_in_bytes' => $clen, 'size_in_mb' => $size] : $size;
}

function getVideoId($url) {
    preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $url, $matches);
    return $matches;
}

function downloadYoutubeVid() {
    if (!empty($_SESSION['url']) && !empty($_SESSION['title']) && !empty($_SESSION['mime']) && !empty($_SESSION['ext'])) {
        if (isset($_GET['format'])) {
            $selectedUrl = ($_GET['format'] == 'hd') ? $_SESSION['url-hd'] : $_SESSION['url'];
        }
        $url = base64_decode($selectedUrl);
        $title = filter_var(trim($_SESSION['title']));
        $mime = filter_var($_SESSION['mime']);
        $ext = filter_var($_SESSION['ext']);
    } else if (isset($_SESSION['youtube']) && !empty($_SESSION['youtube'])) {
        $format = (isset($_GET['key']) && !empty($_GET['key'])) ? $_GET['key'] : 0 ;
        $url = base64_decode($_SESSION['youtube'][$format]['url']);
        $title = filter_var($_SESSION['youtube'][$format]['title']);
        $mime = filter_var($_SESSION['youtube'][$format]['video_type']);
        $ext = filter_var($_SESSION['youtube'][$format]['ext']);
    }
    downloadVideo($url, $title, $mime, $ext);
}

function downloadVideo($url, $title, $mime, $ext) {
    if ($url) {
        // Generate the server headers
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) {
            header('Content-Type: "' . $mime . '"');
            header('Content-Disposition: attachment; filename="' . $title . "." . $ext . '"');
            header('Expires: 0');
            // if ($size != '') {
            //   header('Content-Length: ' . $size);
            // }
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header("Content-Transfer-Encoding: binary");
            header('Pragma: public');
        } else {
            header('Content-Type: "' . $mime . '"');
            header('Content-Disposition: attachment; filename="' . $title . "." . $ext . '"');
            header("Content-Transfer-Encoding: binary");
            header('Expires: 0');
            // if ($size != '') {
            //   header('Content-Length: ' . $size);
            // }
            header('Pragma: no-cache');
        }

        readfile($url);
        exit;
    }
}
