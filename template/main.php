<section class="section">
    <div class="container text-center">
        <h1 class="display-1"><?php echo $config["title"]; ?></h1>
        <p class="lead"><?php echo $lang["homepage-slogan"]; ?></p>
    </div>
    <?php include("adcode.html"); ?>
    <?php // include("adcode.html"); ?>
    <div class="container text-center">
        <h2><b>Download all kind of video by few step</b></h2>
        <span><b>How :</b></span>
        <div>
            <div>By using few steps to get your videos on your file storage</div>
            <span>Step 1: Copy your video link
                <p>In video click option and choose <b>"Copy link"</b> or if you are using desktop <b>"Copy the URL"</b></p>
            </span>
            <span>Step 2: Past your link 
                <p>Click <b>"GO!"</b> and get available <b>FORMAT</b> for download</p>
            </span>
            <span>Step 3: Click download..!!!
                <p>Choose your video formate and click <b>"Download"</b></p>
            </span>
        </div>
    </div>
    
    <div class="container text-center">
        <h1>Here you go, you can download all type of videos by pasting video URL</h1>
        <p class="lead"><?php echo $lang["homepage-slogan"]; ?></p>
    </div>
    
    <div class="container text-center">
        <div class="card sec-pri-gradient text-white rounded">
            <div class="card-body">
                <form method="post" action="system/action.php" enctype="multipart/form-data">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-video-camera"></i></span>
                        <input name="url" pattern="https?://.+" type="url" class="form-control" placeholder="<?php echo $lang["placeholder"]; ?>" required autocomplete="on" autofocus>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark"><i class="fa fa-download"></i> <?php echo $lang["download"]; ?></button>
                </form>
            </div>
        </div>
    </div>
</section>