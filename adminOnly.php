<?php
include "model/dbFunctions.php";
$getdeparmentList = "SELECT * FROM `department`";
$departmentListResult = mysqli_query($link, $getdeparmentList) or die(mysqli_error($link));
while ($row = mysqli_fetch_assoc($departmentListResult)) {
    $departmentArray[] = $row;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Roger Project</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="css/sb-admin-2.css" rel="stylesheet" type="text/css" />
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/appController.js" type="text/javascript"></script>
  <script src="js/sb-admin-2.js" type="text/javascript"></script>
  <!-- Metis Menu Plugin JavaScript -->
  <script src="vendor/metisMenu/metisMenu.min.js"></script>

</head>

<body>
  <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Global Foundries</a>
            </div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="model/doLogout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                      $totalUser = "SELECT COUNT(`isCheck`) AS 'total' FROM `userinfo` WHERE `isCheck` = 1";
                                      $tresult = mysqli_query($link, $totalUser) or die(mysqli_error($link));
                                      $row = mysqli_fetch_assoc($tresult);
                                    ?>
                                    <div class="huge"><?php echo $row['total'] ?></div>
                                    <div>Total Check In</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green" id="checkDept" role="button">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo count($departmentArray) ?></div>
                                    <div>Department</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red" role="button" id="resetCount" >
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-refresh fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </br>
                                    <div style="font-size: 14px;">Reset Check-In Count!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- Modal -->
    <div class="modal fade" id="successModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Are you sure you want to to reset?</h4>
                </div>
                <div class="modal-body">
                    <p>User count will be reset to zero !</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" id="modalClose"data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                  <button class="btn btn-danger" id="modalReset" data-dismiss="modal"><span class="glyphicon glyphicon-check"></span> Reset</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
$(document).ready(function(){
  $("#checkDept").click(function(){
    window.location.href = 'checkDepartment.php';
    return false;
  });
});
</script>
<script>
$("#resetCount").click(function(){
  $("#successModal").modal();
  $('#modalReset').click(function(e){
    //start logic to update the ischeck = 0 in database.
    var dataString = {isCheck: "0"};
    $.ajax({
        type: "POST",
        url: "model/doReset.php",
        data: dataString,
        dataType: "JSON",
        success: function(data) {
          console.log(data);
          //alert('success');
          location.reload(true);
        },error: function(obj, textStatus, errorThrown){
            console.log("Error " + textStatus + ": " + errorThrown);

        }
    });

    return false
  });
});
</script>
