<?php
    include "core.php";
    if($_GET['url'] != ""){
        $flink = $_GET['url'];
        $fdata = facebookstream($flink);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/video.js/5.11.9/video-js.min.css">
        <link rel="stylesheet" media="screen" href="./template_view.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/videojs-resolution-switcher/0.4.2/videojs-resolution-switcher.min.css" />
    </head>
    <body>
    <video id="uniqueID" class="video-js vjs-fluid vjs-16-9" controls preload="auto" width="640" height="264" data-setup='{}'>
        <?php
        echo $fdata;
        ?>
    </video>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="./script_view.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/5.11.9/ie8/videojs-ie8.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/video.js/5.11.9/video.min.js"></script>
    </body>
</html>
