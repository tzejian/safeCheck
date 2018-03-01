<?php
session_start();
if($_SESSION['role'] == 0){
  header("Location: checkRolePanel.php");
}
include "model/dbFunctions.php";
$getUserinfo = "SELECT * FROM `userinfo` ORDER BY department";
$userInfoResult = mysqli_query($link, $getUserinfo) or die(mysqli_error($link));
while ($row = mysqli_fetch_assoc($userInfoResult)) {
    $userInfoArray[] = $row;
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
  <link href="vendor/pagination/pagination.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/appController.js" type="text/javascript"></script>
  <script src="js/sb-admin-2.js" type="text/javascript"></script>
  <script src="vendor/metisMenu/metisMenu.min.js"></script>
  <script src="vendor/pagination/pagination.js"></script>
  <style type="text/css">
        ul, li {
            list-style: none;
        }
        #wrapper1 {
            width: 900px;
            margin: 20px auto;
        }

        .data-container {
            margin-top: 20px;
        }

        .data-container ul {
            padding: 0;
            margin: 0;
        }

        .data-container li {
            margin-bottom: 5px;
            padding: 5px 10px;
            background: #eee;
            color: #666;
        }
    </style>
  <script>
            $(document).ready(function () {
                var userInfoArray = <?php echo json_encode($userInfoArray); ?>;
                $(".data-container").on("click", "#delete", function () {
                    var id = $(this).val();
                    var cfm = confirm("Are you sure want to Delete this?");
                    var index = -1;
                    if (cfm == true) {
                        for (var i = 0; i < userInfoArray.length; i++) {
                          if (userInfoArray[i].id.includes(id)) {
                              index = i;
                              };
                          };
                          if (index != -1) {
                            userInfoArray.splice(index, 1);
                          };
                          $.ajax({
                           url: "model/doDeleteUser.php",
                           data: "id=" + id,
                           type: "GET",
                           cache: false,
                           dataType: "JSON",
                           success: function (data) {
                             window.alert("Delete successfully!");
                               displayTable(userInfoArray);
                           },
                           error: function (obj, textStatus, errorThrown) {
                               console.log("Error " + textStatus + ": " + errorThrown);
                           }
                       });
                   }
                });
                $("#search").keyup(function(){
                    var filtered = [];
                    for (var i = 0; i < userInfoArray.length; i++) {
                        if(userInfoArray[i].employee_id.includes($(this).val())){
                            filtered.push(userInfoArray[i]);
                        }
                    };
                    displayTable(filtered);
                });
                //display pagination
                displayTable(userInfoArray);

            //pagination function
            function displayTable(userArray) {
              (function(name) {
                var container = $('#pagination-' + name);
                var sources = function () {
                  var result = userArray;
                  return result;
                }();
                var options = {
                  dataSource: sources,
                  callback: function (response, pagination) {
                    var dataHtml = '<table class="table" style="margin-bottom: 0px;" id="userTable"><thead><tr><th style="width:60%;">Employee Id</th>';
                    dataHtml += '<th style="text-align: center; width: 40%;">Modify</th></tr></thead><tbody>';
                    $.each(response, function (index, item) {
                      dataHtml += '<tr><td>'+item.employee_id + '</td>';
                      // dataHtml += '<td>' + item.department + '</td>';
                      dataHtml += '<td style="text-align: center;">';
                      dataHtml += "<a href='modifyUser.php?id="+item.id+"' class='btn btn-primary button1' id='edit'><i class='fa fa-edit fa-fw'></i>Edit</a>";
                      dataHtml +=  "<button class='btn btn-danger button1' id='delete' value='"+item.id+"'><i class='fa fa-trash fa-fw'></i>Delete</button></td></tr>";
                    });
                    dataHtml += '</tbody></table>';

                    container.prev().html(dataHtml);
                  }
                };
                // container.addHook('beforeInit', function () {
                //   window.console && console.log('beforeInit...');
                // });
                container.pagination(options);

                // container.addHook('beforePageOnClick', function () {
                //   window.console && console.log('beforePageOnClick...');
                // });
              })('demo1');
            };
            });
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
                            <a href="adminOnly.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-user fa-fw"></i> Profile</a>
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
                    <h1 class="page-header">Admin Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row search">
                <div class="col-md-12 col-xs-12">
                   <input type="text" placeholder="Search by employee id" class="form-control" id="search"/>
               </div>
            </div>
            <div class="row">
              <br>
              <div class="col-md-12 col-xs-12">
                <div class="data-container paginationjs-theme-blue"></div>
                <div id="pagination-demo1" class="paginationjs-theme-blue"></div>
              </div>
            </div>
        </div>
    </div>
</body>
</html>
