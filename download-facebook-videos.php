<?php
// Load and initialize downloader class
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html lang="en-US" ng-app="app">
    <head>
        <title>Download facebook videos online | fb downloader | video-downloader-app</title>
        <meta charset="UTF-8">
        <meta name="description" content="Download facebook videos in online with best quality, You can find videos with HD, mp4 and web format | video-downloader-app">
        <meta name="keywords" content="download facebook videos,facebook downloader,videos in HD,fb videos">
        <meta name="author" content="Jaga">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://www.video-downloader-app.com/download-facebook-videos" rel="canonical">
        <link rel="stylesheet" href="app/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="app/css/onlinedown.css" rel="stylesheet">
        <link rel="shortcut icon" href="app/img/favicon.png"/>

        <script src="app/js/jquery.min.js"></script>
        <script src="app/js/bootstrap.min.js"></script>

        <script src="app/js/angular.1.6.9.min.js"></script>
        <script src="app/js/onlinedown.js"></script>
        <script data-ad-client="ca-pub-2911878521663469" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    </head>
    <body ng-controller="fbCtrl">
        <?php
        require_once(__DIR__ . "/system/config.php");
        include(__DIR__ . "/template/header.php");
        //include("adcode.html");
        ?>

        <div class="banner fb-banner">
            <div class="banner-backround">
                <div class="container">
                    <div class="banner-text">
                        <div class="banner-heading">
                            <h1>Download facebook videos online downloader web app</h1>
                        </div>
                        <section id="main_step1">
                            <div class="container">
                              <div class="step1_process">
                                <form method="post" action="system/action.php" enctype="multipart/form-data">
                                    <i class="fa fa-facebook icon"></i>
                                    <input ng-model="fbUrl" name="url" pattern="https?://.+" type="url" class="form-control" placeholder="Enter URL" required autocomplete="on" autofocus>
                                    <button type="submit">Go!</button>
                                </form>
                              </div>
                              <span><b>Paste your facebook video link here and we will give you the best quality available for your videos to download</b></span>
                            </div>
                        </section>
                        <div class="banner-sub-heading">
                            <h3>Get your amazing facebook videos with best</h3>
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
                        <h2>How to download facebook videos</h2>
                        <p>Here you Go.., you can use facebook video link to download your amazing videos in online, By using few steps to get your videos on your local storage.</p>
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
                    <span>Facebook video link</span>
                    <div class="step1_process">
                      <div class="step1_process">
                        <form method="post" action="system/action.php" enctype="multipart/form-data">
                            <i class="fa fa-facebook icon"></i>
                            <input ng-model="fbUrl" name="url" pattern="https?://.+" type="url" class="form-control" placeholder="Enter URL" required autocomplete="on" autofocus>
                            <button onclick="document.getElementById('step2').scrollIntoView();" type="submit">Go!</button>
                        </form>
                      </div>
                    </div>
                    <span class="text-center">Enter facebook video link here and we will give you the best quality available for your videos to download</span>
                </div>
            </section>

            <div class="info">
                <p><strong>NOTE : </strong><span>Private videos of any website should not downloaded here...</span></p>
            </div>

            <section id="step2">
              <?php if (isset($_SESSION['url']) && $_SESSION['url'] != '' && $_SESSION['web'] == 'facebook') { ?>
                <span class="preview-title">Preview</span>
                <div onload="document.getElementById('step2').scrollIntoView();" class="download-btn">
                  <button type="button" class="btn btn-warning text-dark btn-banner" ng-click="downloadFbVideo('hd');">
                    Download HD<span> (<?=$_SESSION['url-hd-size'];?>)</span>
                </button>
                  <button type="button" class="btn btn-warning text-dark btn-banner" ng-click="downloadFbVideo('sd')">
                  Download Mp4<span> (<?=$_SESSION['url-size'];?>)</span>
                </button>
                </div>
                <div class="video-tab">
                    <div class="embed-responsive embed-responsive-4by3">
                      <?php
                        if(isset($_SESSION["url-hd"]) && $_SESSION["url-hd"] != '') {
                          echo '<video controls autoplay><source src="' . base64_decode($_SESSION["url-hd"]) . '" type="video/mp4">Your browser does not support the HTML5 video.</video>';
                        } else {
                          echo '<video controls autoplay><source src="' . base64_decode($_SESSION["url"]) . '" type="video/mp4">Your browser does not support the HTML5 video.</video>';
                        } ?>
                      </div>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>

        <div class="row abt-content text-center">
            <div class="sign-in col-sm-4">
                <span><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                <h4 class="text-center">No need to sign</h4>
                <p>Download your facebook videos easily with HD, 720P and webm format. Here no need to sign or register about you. 
                    Get your videos on desktop pc, mobile etc.</p>
            </div>
            <div class="free col-sm-4">
                <span><i class="fa fa-gift" aria-hidden="true"></i></span>
                <h4 class="text-center">Free video downloader</h4>
                <p>Download your facebook videos with <b>FREE</b>. We find your videos with best quality. Don't miss to get high quality 
                    videos with FREE.</p>
            </div>
            <div class="speed col-sm-4">
                <span><i class="fa fa-rocket" aria-hidden="true"></i></span>
                <h4 class="text-center">Speed video downloader</h4>
                <p>No need to install app and waste your storage. Here we give as much as fast to download your facebook videos. 
                    Add our web on your home page screen.</p>
            </div>
        </div>
        <?php include(__DIR__ . "/template/footer.php"); ?>
    </body>
</html>
