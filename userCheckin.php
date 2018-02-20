<?php
session_start();
$isCheckValid = $_SESSION['isCheck'];
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
                <a class="navbar-brand" href="">Global Foundries</a>
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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                  <div class="panel panel-primary" role="button" id="fkthis" onclick="myFunction()">
                      <div class="panel-heading">
                          <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
                                    <div class="huge">Check In</div>
                                </div>
                          </div>
                      </div>
                  </div>
                    <script>
                      function myFunction(){
                        var dataString = {
                          employId: "<?php echo $_SESSION['employee_id']; ?>",
                          isCheck: "<?php echo $isCheckValid; ?>"
                        };
                          $.ajax({
                            type: "POST",
                            url: "model/doUpdate.php",
                            data: dataString,
                            dataType: "JSON",
                            success: function(data){
                              console.log(data);
                              $("#successModal").modal()
                              $("#checkStatus").text(data.status);
                              $('#modalClose').click(function(){
                                location.reload(true);
                              })
                            },error: function(obj, textStatus, errorThrown){
                                console.log("Error " + textStatus + ": " + errorThrown);
                            }
                          })
                          return false;
                      }
                    </script>

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
                    <h4 class="modal-title">SUCCESSFULLY</h4>
                </div>
                <div class="modal-body">
                    <p id="checkStatus"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modalClose"class="btn btn-default" data-dismiss="modal">OK, I got it</button>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
