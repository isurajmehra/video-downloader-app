<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html lang="en-US" ng-app="app">
    <head>
        <title>Download videos from websites | Download videos from link | Online videos | Video downloader</title>
        <meta charset="UTF-8">
        <meta name="description" content="Download youtube, facebook, insta or other socialmedia videos in online with best quality, Using url you can find videos with HD, mp4 and web format">
        <meta name="keywords" content="download youtube,facebook,insta,videos in websites,using url link,from">
        <meta name="author" content="Jaga">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta itemprop="name" content="Download Video from website YouTube, Facebook, Insta with free online" />
        <meta itemprop="description" content="Download youtube, facebook, insta or other socialmedia videos in online with best quality, Using url you can find videos with HD, mp4 and web format" />
        <meta itemprop="image" content="app/img/favicon.png" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Download Video from website, YouTube, Facebook, Insta with free online" />
        <meta property="og:description" content="Download youtube, facebook, insta or other socialmedia videos in online with best quality, Using url you can find videos with HD, mp4 and web format" />
        <meta property="og:image" content="app/img/favicon.png" />

        <link rel="stylesheet" href="../video-downloader/app/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../video-downloader/app/css/onlinedown.css" rel="stylesheet">
        <link rel="shortcut icon" href="app/img/favicon.png"/>

        <script src="/video-downloader/app/js/jquery.min.js"></script>
        <script src="/video-downloader/app/js/bootstrap.min.js"></script>

        <script src="/video-downloader/app/js/angular.1.6.9.min.js"></script>
        <script src="/video-downloader/app/js/onlinedown.js"></script>

    </head>
    <body ng-controller="homeCtrl">
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
                            <h1>Download website videos in online with best quality</h1>
                        </div>
                        <section id="main_step1">
                            <div class="container">
                                <div class="step1_process">
                                    <i class="fa fa-globe icon" aria-hidden="true"></i>
                                    <input class="input-field" type="text" name="youtube_link" ng-model="webUrl" placeholder="Enter URL">
                                    <button ng-click="findWebsite(webUrl)">Go!</button>
                                </div>
                                <span>Paste your website url here and we will give you the best quality available for your videos to download</span>
                            </div>
                        </section>
                        <div class="banner-sub-heading">
                            <h2>Get your amazing videos with best</h2>
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
                        <h1>How to download videos from any website</h1>
                        <p>Here you Go.., Paste your website URL and you will get best quality, By using few steps to get your website videos on your local storage.</p>
                        <div class="down_step">
                            <span>1. Copy your website URL (In share just copy the link)</span>
                            <span>2. Paste video URL here (Enter the copied link here)</span>
                            <span>3. Download your amazing videos with best quality</span>
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
                        <i class="fa fa-globe icon" aria-hidden="true"></i>
                        <input class="input-field" type="text" name="youtube_link" ng-model="webUrl" placeholder="Enter URL">
                        <button ng-click="findWebsite(webUrl)">Go!</button>
                    </div>
                    <span class="text-center">Paste your youtube video link here and we will give you the best quality available for your videos to download</span>
                </div>
            </section>

            <div class="info">
                <p><strong>NOTE :</strong><span>Private videos of any website should not downloaded here...</span></p>
            </div>

        </div>

        

        <div class="row abt-content text-center">
            <div class="sign-in col-sm-4">
                <span><i class="fa fa-sign-in" aria-hidden="true"></i></span>
                <h4 class="text-center">No need to sign</h4>
                <p>Download your web site videos easily with HD, 720P and webm format. Here no need to sign or register about you. 
                    Get your videos on desktop pc, mobile etc.</p>
            </div>
            <div class="free col-sm-4">
                <span><i class="fa fa-gift" aria-hidden="true"></i></span>
                <h4 class="text-center">Free video downloader</h4>
                <p>Download your web site videos with <b>FREE</b>. We find your videos with best quality. Don't miss to get high quality 
                    videos with FREE.</p>
            </div>
            <div class="speed col-sm-4">
                <span><i class="fa fa-rocket" aria-hidden="true"></i></span>
                <h4 class="text-center">Speed video downloader</h4>
                <p>No need to install app and waste your storage. Here we give as much as fast to download your web site videos. 
                    Add our web on your home page screen.</p>
            </div>
        </div>
        <?php include(__DIR__ . "/template/footer.php"); ?>
    </body>
</html>
