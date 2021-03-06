<?php
   session_start();
   session_destroy();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Thank you | video-downloader-app</title>
        <meta charset="UTF-8">
        <meta name="description" content="Download videos in online with best quality">
        <meta name="keywords" content="download,youtube downloader,video downloader">
        <meta name="author" content="Jaga">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <body>
        <?php
        require_once(__DIR__ . "/system/config.php");
        include(__DIR__ . "/template/header.php");
        //include("adcode.html");
        ?>

        <div class="banner thanyou-banner">
            <div class="banner-backround">
                <div class="container">
                    <div class="banner-text">
                        <div class="banner-heading">
                            <h1>Thanks for downloading video here... <br>Hope we see agian <br>&#9996;</h1>
                        </div>
                        <button type="button" class="btn btn-warning text-dark btn-banner" onclick="location.href='https://video-downloader-app.com';">Try Another ?</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include(__DIR__ . "/template/footer.php"); ?>
    </body>
</html>
