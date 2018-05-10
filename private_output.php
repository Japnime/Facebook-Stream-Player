<?php

    if (!file_exists('output')) {
        mkdir('output', 0777, true);
    }
    
    function randomKey($length) {
        $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
    
        for($i=0; $i < $length; $i++) {
            $key .= $pool[mt_rand(0, count($pool) - 1)];
        }
        return $key;
    }
    
    if(isset($_POST['addDATA'])) {
        $filename = md5($_POST['title'].randomKey(5));
        $path = "output/$filename.sourcecode";
        $process = fopen($path, w);
        $data = $_POST['content'];
        fwrite($process, $data);
        fclose($process);
        $msg = '
            <div class="alert alert-dismissible alert-success">
                <strong>Japnime</strong>: You can view your link <a href="'.$path.'" class="alert-link">here</a>.
            </div>
        ';
    }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<title>Private Option</title>
    	<link rel="stylesheet" href="bootstrap.min.css">
	</head>
    <body style="padding-top: 10px;">
        <div class="container">
            <h1>Simple Private Facebook Page Storage</h1>
            <hr>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#privateoutput">Add Private Page</button>
            <div style="padding-top: 10px;"></div>
            <?php
            if(isset($msg)) {
                echo $msg;
            } else {
                echo '
                <div class="alert alert-dismissible alert-primary">
                    A simple site with simple functions that may help you to store private video links here.
                </div>
                ';
            }
            ?>
        </div>

        <div class="modal fade" id="privateoutput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Private Facebook Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">  
                <form method="post" onsubmit="return confirm('Are you sure?');">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" name="title" class="form-control" placeholder="New title">
                    </div>
                    <div class="form-group">
                      <label>View-source Content</label>
                      <textarea class="form-control" name="content" id="Textarea" rows="6"></textarea>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addDATA" class="btn btn-primary">Add to the Database</button>
              </div>
              </form>
            </div>
          </div>
        </div>
    
        <!-- Java -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
