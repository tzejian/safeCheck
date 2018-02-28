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
        cfmId:  $("[name=confirm-employeeId]").val()
        //selection:  $("[name=depList]").val()
    }
    console.log(dataString);
    $.ajax({
        type: "POST",
        url: "model/doRegister.php",
        data: dataString,
        dataType: "JSON",
        success: function(data) {
          console.log(data);

          if(data.message == "matched"){
            alert("Id has already been registered.");
          }else if (data.message == "pls match employee id") {
            alert("Id does not match");
          }else{
            //alert('register success');
            $("#successModal").modal();
            $('#modalClose').click(function(){
                location.reload(true);
            })
          }
        },error: function(xhr, textStatus, errorThrown){
            console.log("Error " + textStatus + ": " + errorThrown+ ": "+xhr.responseText);

        }
    });
    return false;
  });
  $('.dropdown-menu a').click(function(){
   $('#selected').text($(this).text());
 });

});
