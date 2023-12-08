<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">

	<title>Document</title>
</head>
<?php session_start() ?>


<div class="container-fluid">
	<form action="" id="signup-frm">
		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name"  required="" placeholder="Enter name " class="form-control" pattern="'/^[a-zA-Z\'\- ]+$/">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="text" name="contact" required="" class="form-control" placeholder="Enter contat 10 digit" pattern="[0-9]{10,10}">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control" placeholder="Enter address" pattern="[a-zA-Z0-9 ]{7,}"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">City</label>
			<input type="city" name="city" placeholder="Enter city only surat" required="" class="form-control">

			<div class="form-group">
				<label for="" class="control-label">Email</label>
				<input type="email" name="email"  placeholder="Enter email fromate:: yourname@gmail.com::" required=""   pattern="[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})" class="form-control" id="email">
				<button class="btn btn-primary mt-3 mail-otp-send">Send OTP</button>
				<span class="mail-sent-msg mt-3" style="color: green;"> 
				Mail send successfully !
				</span>
			</div>

			<div class="form-group">
				<label for="" class="control-label">Email otp</label>
				<input type="number" name="emailotp"  placeholder="Enter otp please check mail and vaild otp " required="" class="form-control">
			</div>
           <div class="form-group">
				<label for="type">User Type</label>
				<select name="type" id="type" class="custom-select" placeholder="Enter type" required="" class="from-control">
					<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected' : '' ?>>customer</option>
					<option value="3" <?php echo isset($meta['type']) && $meta['type'] == 3 ? 'selected' : '' ?>>seller</option>

				</select>
			</div>
			
			<div class="form-group">
				<label for="" class="control-label">Username</label>
				<input type="text" name="username" placeholder="Enter user name" required=""  pattern="'/^[a-zA-Z\'\- ]+$/" class="form-control">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Password</label>
				<input type="password" name="password"  placeholder="Enter password" required="" class="form-control" >
				<!-- pattern="$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';" -->
			</div>

			<button class="button btn btn-primary btn-sm">Create</button>
			<button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>

	</form>
</div>

<style>
	#uni_modal .modal-footer {
		display: none;
	}
</style>

<script>
		
		$('#signup-frm').submit(function(e) {
			
		e.preventDefault()
		start_load()
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'admin/ajax.php?action=signup',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success: function(resp) {
				console.log("Response is ",resp);
				if (resp == 1) {
					location.reload();
				} 
				else if( resp ==2)
					{
						$('#signup-frm').prepend('<div class="alert alert-danger">USER NAME ARE AVAIABLE PLEASE MAKE ARE NEW USER NAME :: </div>')
					end_load();

					}
					else if( resp ==3)
					{
						$('#signup-frm').prepend('<div class="alert alert-danger"> NAME ARE AVAIABLE PLEASE MAKE ARE NEW NAME :: </div>')
					end_load();

					}

					else if( resp ==4)
					{
						$('#signup-frm').prepend('<div class="alert alert-danger">CONTENT NUMBER  ARE AVAIABLE PLEASE MAKE ARE NEW CONTANT NUMBER :: </div>')

					end_load();

					}

					else if( resp ==5)
					{
						$('#signup-frm').prepend('<div class="alert alert-danger">EMAIL ARE AVAIABLE PLEASE MAKE ARE NEW EMAIL ID :: </div>')
						$('.mail-otp-send').show();
						$('.mail-sent-msg').hide();
						$('.mail-otp-send').attr('disabled' , false)
						$("input[name = 'emailotp']").val('');

					end_load();
				}

				else if( resp ==6)
					{
						$('#signup-frm').prepend('<div class="alert alert-danger">CITY ONLY SURAT PLEASE MAKE ARE CITY SURAT :: </div>')

					end_load();

					}



					else if(resp ==11){

					$('#signup-frm').prepend('<div class="alert alert-danger">Invalid OTP</div>')
					end_load();
				}
				else if(resp ==12){
					$('#signup-frm').prepend('<div class="alert alert-danger">Invalid Request</div>')
					end_load();

				}
				
				else {
					$('#signup-frm').prepend('<div class="alert alert-danger">' + resp + '</div>')
					end_load()
				}
			}
		})
	})
	
	function end_load(){
		let loader=document.getElementById("preloader2");
		if(loader)
		{

			loader.style.display='none';
		}
	}

	$('.mail-sent-msg').hide()
	$(document).on('click', '.mail-otp-send', function() {
		$('.mail-otp-send').prop( "disabled", true )
		console.log('Started');
		var email = $('#email').val();
		console.log(email);
		$.ajax({
			method: 'POST',
			url: 'sendotp.php',
			data: {
				email: email
			},
			success: function(res) {
				$('.mail-sent-msg').show()
				$('.mail-otp-send').hide()
			}

		});
	});
</script>

<!-- <script>
        function validateCity() {
            // Get the value of the city input
            var city = $('#city').val();

            // Check if the city is "Surat" (case-insensitive)
            if (city.trim().toLowerCase() === "surat") {
                $('#cityError').text(""); // Clear error message
                alert("only  city is Surat.");
            } else {
                $('#cityError').text("Please enter Surat."); // Display error message
            }
        }
    </script> -->

