
<style>
	.collapse a{
		text-indent:10px;
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<a href="index1.php?page=home1" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index1.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list"></i></span> Categories</a>
				<a href="index1.php?page=products1" class="nav-item nav-products"><span class='icon-field'><i class="fa fa-th-list"></i></span> Products</a>
				<a href="index1.php?page=bids1" class="nav-item nav-bids"><span class='icon-field'><i class="fa fa-money-bill-alt"></i></span> Bids</a>
		
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
