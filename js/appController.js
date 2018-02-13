$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
  $("#register-form").submit(function(e){
    // e.preventDefault();
    var dataString={
        empId:  $("[name=employeeId]").val(),
        cfmId:  $("[name=confirm-employeeId]").val(),
        selection:  $("[name=depList]").val()
    }
    console.log(dataString);
    $.ajax({
        type: "POST",
        url: "model/doRegister.php",
        data: dataString,
        dataType: "JSON",
        success: function(data) {
          //console.log(data);
          $("#successModal").modal();
          $('#modalClose').click(function(){
              location.reload(true);
          })

        },error: function(obj, textStatus, errorThrown){
            console.log("Error " + textStatus + ": " + errorThrown);

        }
    });
    return false;
  });
  // $("#login-form").submit(function(e){
  //   // e.preventDefault();
  //   var empId =  $("[name=employeeID]").val();
  //   console.log(empId);
  //   $.ajax({
  //       type: "POST",
  //       url: "model/doLogin.php",
  //       data: JSON.parse(empId),
  //       dataType: "JSON",
  //       success: function(data) {
  //         console.log(data);
  //         // $("#successModal").modal();
  //         // $('#modalClose').click(function(){
  //         //     location.reload(true);
  //         // })
  //
  //       },error: function(xhr, status, error) {
  //           var err = JSON.parse(xhr.responseText);
  //           console.log(err.Message);
  //         }
  //   });
  //   return false;
  // });


  $('.dropdown-menu a').click(function(){
   $('#selected').text($(this).text());
 });






});
