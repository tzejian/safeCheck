<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Roger Project</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/appController.js" type="text/javascript"></script>
</head>

<body style="padding-top: 90px;">
  <div class="container-fluid" style="height:100%">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-md-12">
                <p style="font-size:30px">Thank you for checking in</p>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <p>Check in success.<p/>
                <button class="form-control ui-btn btn-primary" onclick="window.location = 'index.php';">Back</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<!-- <script>
  $(document).ready(function () {
    // Handler for .ready() called.
    window.setTimeout(function () {
        location.href = "index.php";
    }, 3000);
  });
</script> -->
