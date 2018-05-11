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
        <title>VideoJS Player</title>
        <link rel="stylesheet" href="./template_view.css">
        <link rel="stylesheet" href="./function_view.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <video id='video' class="video-js vjs-fluid vjs-16-9 vjs-big-play-centered" controls preload="auto" width="640" height="264" data-setup='{}'></video>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="./script_view.js"></script>
    <script src="./switch_view.js"></script>
    <script>
        videojs('video', {
          controls: true,
          fluid: true,
          plugins: {
            videoJsResolutionSwitcher: {
              default: 'low',
              dynamicLabel: true
            }
          }
        }, function(){
          var player = this;
          window.player = player
          player.updateSrc([
        <?php
            echo $fdata
        ?>
          ])
          player.on('resolutionchange', function(){
            console.info('Source changed to %s', player.src())
          })
        })
    </script>
    </body>
</html>
