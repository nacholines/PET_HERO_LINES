<?php
	require_once('header.php');
    require_once('nav.php');
?>

<div class="limiter">
	<div class="container">
		<div class="">
			<form action="<?php 
				use Controllers\HomeController;
				echo FRONT_ROOT . "Home/login" ?>" method="POST">
				<div class="form-group" >
					<span style="color: red"><?php echo $message ?> <br></span>
					
					<label for="email">Username</label>
					<input type="username" name="username" class="form-control" id="username" placeholder="Enter username" required>

					<br>

               		<label for="pass">Password</label>
               		<input type="password" name="pass" class="form-control" id="password" placeholder="Enter Password" required>
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
			<?php
				$controller = new HomeController();
			?>
		</div>
	</div>

	<div class="container">
               <form action="<?php echo FRONT_ROOT."Person/showRegisterView"?>" method="post">
                    <button type="submmit" class="large-button mt-3">Dont you have account? Register right now</button>
               </form>
          </div>
</div>
	
