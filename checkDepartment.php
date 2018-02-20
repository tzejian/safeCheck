<?php
include "model/dbFunctions.php";
$getdeparmentList = "SELECT * FROM `userinfo`";
$departmentListResult = mysqli_query($link, $getdeparmentList) or die(mysqli_error($link));
while ($row = mysqli_fetch_assoc($departmentListResult)) {
    $departmentArray[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

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
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
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
                <div class="col-lg-12 ">
                    <h1 class="page-header">Department Details</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="row">
                  <div class="col-md-10 col-sm-8">
                        <table class="table" style="margin-bottom: 0px;" >
                          <thead>
                            <tr>
                              <th>Department</th>
                              <th style="text-align: right;">User Count</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php for ($i = 0; $i < count($departmentArray); $i ++) { ?>
                              
                            <tr>
                              <td><?php echo $departmentArray[$i]['department'] ?></td>
                              <td style="text-align: right;"><?php echo $departmentArray[$i]['isCheck'] ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>

                  </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
