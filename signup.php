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
			<input type="text" name="name"  required=""  class="form-control"  pattern="[a-zA-Z ]{1,}>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="text" name="contact" required="" class="form-control" pattern="[0-9]{10,10}">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control" pattern="[a-zA-Z0-9 ]{7,}"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">City</label>
			<input type="city" name="city" required="" class="form-control">

			<div class="form-group">
				<label for="" class="control-label">Email</label>
				<input type="email" name="email" required=""   pattern="[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})" class="form-control" id="email">
				<button class="btn btn-primary mt-3 mail-otp-send">Send OTP</button>
				<span class="mail-sent-msg mt-3" style="color: green;"> 
				Mail send successfully !
				</span>
			</div>

			<div class="form-group">
				<label for="" class="control-label">Email otp</label>
				<input type="number" name="emailotp" required="" class="form-control">
			</div>

			<? //php if(isset($meta['type']) && $meta['type'] == 4): 
			?>
			</ /input type="hidden" name="type" value="4">
			<? //php else: 
			?>
			<?php //if(!isset($_GET['type'])): 
			?>
			<div class="form-group">
				<label for="type">User Type</label>
				<select name="type" id="type" class="custom-select" required="" class="from-control">
					<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected' : '' ?>>customer</option>
					<option value="3" <?php echo isset($meta['type']) && $meta['type'] == 3 ? 'selected' : '' ?>>seller</option>

				</select>
			</div>
			<? //php endif; 
			?>
			<? //php endif; 
			?>

			<div class="form-group">
				<label for="" class="control-label">Username</label>
				<input type="text" name="username" required="" class="form-control">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Password</label>
				<input type="password" name="password" required="" class="form-control">
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
				if (resp == 1) {
					location.reload();
				} else {
					$('#signup-frm').prepend('<div class="alert alert-danger">Email already exist.</div>')
					end_load()
				}
			}
		})
	})

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