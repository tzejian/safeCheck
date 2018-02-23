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
              <div class="col-md-6">
                <a href="#" class="active" id="login-form-link">Login</a>
              </div>
              <div class="col-md-6">
                <a href="#" id="register-form-link">Register</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <form id="login-form" action="model/doLogin.php" method="post"  style="display: block;">
                  <div class="form-group">
                    <input type="text" name="employeeID" id="employeeID" tabindex="1" class="form-control" placeholder="Employee ID" value="">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="submit" name="login-submit" id="login-submit" tabindex="2" class="form-control btn btn-login" value="Log In">
                      </div>
                    </div>
                  </div>
                </form>
                <form id="register-form" action="" style="display: none;">
                  <div class="form-group">
                    <input type="text" title="Example: E1234567" pattern="[A-Za-z]{1}[0-9]{7}" name="employeeId" id="employeeId" tabindex="2" class="form-control" placeholder="Enter Employee ID" required>
                  </div>
                  <div class="form-group">
                    <input type="text" title="Example: E1234567" pattern="[A-Za-z]{1}[0-9]{7}" oninput="check(this)" name="confirm-employeeId" id="confirm-employeeId" tabindex="2" class="form-control" placeholder="Confirm Employee ID" required>
                    <script language='javascript' type='text/javascript'>
                      function check(input) {
                          if (input.value != document.getElementById('employeeId').value) {
                              input.setCustomValidity('Id Must be Matching.');
                          } else {
                              // input is valid -- reset the error message
                              input.setCustomValidity('');
                          }
                      }
                  </script>
                  </div>
                  <!-- <div class="form-group">
                    <select id="depList" name="depList" class="form-control">
                      <?php for ($i = 0; $i < count($departmentArray); $i ++) { ?>
                      <option value =<?php echo $departmentArray[$i]['department_id'] ?>><?php echo $departmentArray[$i]['department'] ?></option>
                      <?php } ?>
                    </select>
                  </div> -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                      </div>
                    </div>
                  </div>
                  <!-- Modal -->
                  <div class="modal fade" id="successModal" role="dialog">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">SUCCESSFULLY</h4>
                              </div>
                              <div class="modal-body">
                                  <p>Register success</p>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" id="modalClose"class="btn btn-default" data-dismiss="modal">OK, I got it</button>
                              </div>
                          </div>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
