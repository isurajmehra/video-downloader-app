<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// echo '<pre>'; print_r($_SESSION); echo '</pre>'; exit('tets');
?>
<!DOCTYPE html>
<html lang="en-US" ng-app="app">
    <head>
        <title>Download youtube videos | video downloader Free | video-downloader-app</title>
        <meta charset="UTF-8">
        <meta name="description" content="Download youtube videos in online with best quality, You can find videos with 720P, HD, mp4 and webM format">
        <meta name="keywords" content="download youtube videos online,downloader,from,link,url">
        <meta name="author" content="Jaga">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Jaga">

        <link href="https://www.video-downloader-app.com/download-youtube-videos" rel="canonical">
        <link rel="stylesheet" href="app/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="app/css/onlinedown.css" rel="stylesheet">
        <link rel="shortcut icon" href="app/img/favicon.png"/>
        <link rel="manifest" href="app/js/manifest.webmanifest">

        <script src="app/js/jquery.min.js"></script>
        <script src="app/js/bootstrap.min.js"></script>

        <script src="app/js/angular.1.6.9.min.js"></script>
        <script src="app/js/onlinedown.js"></script>
        <script data-ad-client="ca-pub-2911878521663469" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    </head>
    <body ng-controller="youtubeCtrl">
        <?php
        require_once(__DIR__ . "/system/config.php");
        include(__DIR__ . "/template/header.php");
        //include("adcode.html");
        ?>

        <div class="banner youtube-banner">
            <div class="banner-backround">
                <div class="container">
                    <div class="banner-text">
                        <div class="banner-heading">
                            <h1>Download youtube videos online with best quality</h1>
                        </div>
                        <section id="main_step1">
                            <div class="container">
                                <div class="step1_process">
                                    <form method="post" action= "system/youtube-function.php" enctype="multipart/form-data">
                                        <i class="fa fa-youtube icon"></i>
                                        <input name="url" pattern="https?://.+" type="url" class="form-control" placeholder="Enter URL" required autocomplete="on" autofocus>
                                        <button type="submit">Go!</button>
                                    </form>
                                </div>
                                <span>Paste your youtube video link here and we will give you the best quality available for your videos to download</span>
                            </div>
                        </section>
                        <div class="banner-sub-heading">
                            <h3>Get your amazing youtube videos with best</h3>
                        </div>
                        <button onclick="document.getElementById('how').scrollIntoView();" type="button" class="btn btn-warning text-dark btn-banner">Try How ?</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <section id="about">
                <div class="container">
                    <div class="text-intro" id="how">
                        <h2>How to download youtube videos</h2>
                        <p>Here you Go.., you can use youtube video link to download your amazing videos in online, By using few steps to get your videos on your local storage.</p>
                        <div class="down_step">
                            <span>1. Copy your video link (In share just copy the link)</span>
                            <span>2. Put a video link here (Enter the copied link here)</span>
                            <span>3. Download your amazing videos with your best quality</span>
                        </div>
                    </div>

                </div>
            </section>
            <section id="step1">
                <div class="paste-icon text-center">
                    <i class="fa fa-paste"></i>
                </div>
                <div class="text-center" id="main_step1">
                    <span>Paste your youTube link</span>
                    <div class="step1_process">
                    <form method="post" action= "system/youtube-function.php" enctype="multipart/form-data">
                        <i class="fa fa-youtube icon"></i>
                        <input name="url" pattern="https?://.+" type="url" class="form-control" placeholder="Enter URL" required autocomplete="on" autofocus>
                        <button type="submit">Go!</button>
                    </form>
                    </div>
                    <span class="text-center">Paste your youtube video link here and we will give you the best quality available for your videos to download</span>
                </div>
            </section>

            <div class="info">
                <p><strong>NOTE : </strong><span>Private videos of any website should not downloaded here...</span></p>
            </div>

            <section id="step2">

                <?php if(isset($_SESSION) && !empty($_SESSION) && $_SESSION['web'] == 'youtube') { ?>
                    <div class="paste-icon text-center">
                        <i class="fa fa-folder-open" aria-hidden="true"></i>
                    </div>

                    <div class="thumbnail_img">
                        <img src="<?php echo $_SESSION['thumbnail']?>" alt="thumbnail" height="200" width="200">
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Quality</th>
                                        <th>Format</th>
                                        <th>Size</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php foreach ($_SESSION['youtube'] as $key => $data) {?>
                                    <tr>
                                        <td class="capitalize"><?= isset($data['quality']) ? $data['quality'] : '---';?></td>
                                        <td class="capitalize"><?= isset($data['ext']) ? $data['ext'] : '---';?></td>
                                        <td><?= isset($data['size_in_mb']) ? $data['size_in_mb'] : '---';?></td>
                                        <td ng-click="downloadVideo(<?= $key;?>)"><b>Download</b></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                <?php } ?>
            </section>

        </div>

        <div class="row abt-content text-center">
            <div class="sign-in col-sm-4">
                <span><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                <h4 class="text-center">No need to sign</h4>
                <p>Download your youtube videos easily with HD, 720P and webm format. Here no need to sign or register about you.
                    Get your videos on desktop pc, mobile etc.</p>
            </div>
            <div class="free col-sm-4">
                <span><i class="fa fa-gift" aria-hidden="true"></i></span>
                <h4 class="text-center">Free video downloader</h4>
                <p>Download your youtube videos with <b>FREE</b>. We find your videos with best quality. Don't miss to get high quality
                    videos with FREE.</p>
            </div>
            <div class="speed col-sm-4">
                <span><i class="fa fa-rocket" aria-hidden="true"></i></span>
                <h4 class="text-center">Speed video downloader</h4>
                <p>No need to install app and waste your storage. Here we give as much as fast to download your youtube videos.
                    Add our web on your home page screen.</p>
            </div>
        </div>

        <?php include(__DIR__ . "/template/footer.php"); ?>
    </body>
</html>
