<?php session_start() ?>
<div class="container-fluid">

	<form action="" id="login-frm">
		<div class="form-group">
			<label for="" class="control-label">Email Id:</label>
			<input type="text" name="email" placeholder="Enter email fromate:: yourname@gmail.com::" required="" pattern="[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})" class="form-control" id="email">

		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" placeholder="Enter your Password::" class="form-control">
			<small><a href="javascript:void(0)" id="new_account">Create New Account</a></small>

		</div>
		<button class="button btn btn-primary btn-sm">Login</button>
		<button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
	</form>
</div>
<style>
	#uni_modal .modal-footer {
		display: none;
	}
</style>

<script>
	$('#new_account').click(function() {
		uni_modal("Create an Account", 'signup.php?redirect=index.php?page=checkout')
		//uni_modal("Create an Account",'?redirect=index.php?page=checkout')

	})
	$('#login-frm').submit(function(e) {
		e.preventDefault()
		start_load()
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'admin/ajax.php?action=login2',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				end_load()

			},
			success: function(resp) {
				if (resp == 10) {
					alert('ADMIN LOGIN')
					location.href = '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'admin/index.php?page=home' ?>';
				} else if (resp == 20) {
					alert('BIDDER LOGIN')
					location.href = '<?php // echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
				} else if (resp == 30) {
					alert('SELLER LOGIN')
					location.href = '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'admin/index1.php?page=home1' ?>';
				} else {
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
					end_load()
				}
			}
		})
	})
</script>