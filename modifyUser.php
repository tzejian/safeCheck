<?php
  session_start();
  include "model/dbFunctions.php";
  if($_SESSION['role'] == 0){
    header("Location: checkRolePanel.php");
  }

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $getUserinfo = "SELECT * FROM `userinfo` WHERE id='$id'";
    $userInfoResult = mysqli_query($link, $getUserinfo) or die(mysqli_error($link));
    while ($row = mysqli_fetch_assoc($userInfoResult)) {
        $user[] = $row;
    }
  }
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
  <script>
    function goBack() {
      window.history.back();
    }
</script>
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
                <a class="navbar-brand" href="index.html">GlobalFoundries</a>
            </div>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="profile.php"><i class="fa fa-user fa-fw"></i> Profile</a>
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
                    <h1 class="page-header">Edit Employee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                  <div class="row">
                      <div class="col-md-12">
                    <form class="form-horizontal" method="post" id="idForm" action="model/doModifyUser.php">
                        <input type="hidden" name="id" value="<?php echo $user[0]['id']; ?>">
                        <input type="hidden" name="isCheck" value="<?php echo $user[0]['isCheck']; ?>">
                        <div class="form-group">
                            <label for="employeeId" class="col-md-2 control-label">Employee Id:</label>
                            <div class="col-md-4">
                                <input type="text" id="employeeId" name="employeeId" class="form-control" value="<?php echo $user[0]['employee_id'] ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="role" class="col-md-2 control-label">Role:</label>
                          <div class="col-md-4">
                          <select id="role" name="role" class="form-control">
                            <?php
                                if($user[0]['role'] == 1) {
                              ?>
                            <option value ='1'selected>Admin</option>
                            <option value ='0'>Member</option>
                          <?php } else { ?>
                            <option value ='1'>Admin</option>
                            <option value ='0' selected>Member</option>
                            <?php } ?>
                          </select>
                        </div>
                        </div>
                        <!-- for future use -->
                        <!-- <div class="form-group">
                          <label for="depList" class="col-md-2 control-label">Department:</label>
                          <div class="col-md-4">
                          <select id="depList" name="depList" class="form-control">
                            <?php for ($i = 0; $i < count($departmentArray); $i ++) {
                                if($departmentArray[$i]['department'] != $user[0]['department']){
                              ?>
                            <option value ='<?php echo $departmentArray[$i]['department'] ?>'><?php echo $departmentArray[$i]['department'] ?></option>
                          <?php }
                          else {
                            ?>
                            <option value ='<?php echo $departmentArray[$i]['department'] ?>' selected><?php echo $departmentArray[$i]['department'] ?></option>
                            <?php
                          }
                        } ?>
                          </select>
                        </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10 col-sm-12">
                                <input class="btn btn-primary form-control button1" type="submit" value="Save"/>
                                  <a class="btn btn-danger form-control button1" onclick="goBack()"/>Cancel</a>
                            </div>


                        </div>
                    </form>
                  </div>
              </div>
        </div>
    </div>
</body>
</html>
