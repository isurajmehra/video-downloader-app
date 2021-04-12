<?php
$parts = parse_url($_SERVER['REQUEST_URI']);
$fbclass = $ytclass = $intsclass = $vwclass = $home = '';
$domain = str_replace(".php","",basename($parts["path"]));
if ($domain == 'download-facebook-videos') {
    $fbclass = 'active';
} else if ($domain == 'download-youtube-videos') {
    $ytclass = 'active';
} else if ($domain == 'download-instagram-videos') {
    $intsclass = 'active';
} else if ($domain == 'download-videos-from-websites') {
    $vwclass = 'active';
} else {
    $home = 'active';
}
?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="video-downloader-icon">
        <a href="/">
          <img src="/app/img/video-downloader.png" alt="loading">
        </a>
      </div>
    </div>
      <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
              <li class="<?php echo "$home";?>"><a href="/">Home</a></li>
              <li class="<?php echo "$fbclass";?>"><a href="/download-facebook-videos">FB downloader</a></li>
              <li class="<?php echo "$ytclass";?>"><a href="/download-youtube-videos">Youtube downloader</a></li>
              <li class="<?php echo "$intsclass";?>"><a href="/download-instagram-videos">Insta downloader</a></li>
<!--              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="#">Page 1-1</a></li>
                      <li><a href="#">Page 1-2</a></li>
                      <li><a href="#">Page 1-3</a></li>
                  </ul>
              </li>-->

          </ul>
      </div>
  </div>
</nav>
