<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="IMAGES/logo.png" alt="logo" width="200">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
							<form method="POST" class="needs-validation" action="checklogin.php">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="Mail" type="email" class="form-control" name="Mail" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Password</label>
									<input id="Contraseña" type="password" class="form-control" name="Contraseña" required>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>
									<button type="submit" class="btn btn-primary ms-auto">
										Login
									</button>
								</div>
							</form>
						</div>
			<?php
			session_start();
			if (isset($_SESSION['error'])) {
				echo $_SESSION['error'];
				session_destroy();
			} else  {
				session_destroy();
			}
			?>

						<div class="card-footer py-3 border-0">
							<div class="text-center">
								Don't have an account? <a href="index.php" class="text-dark">Create One</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2017-2022 &mdash; Calbello S.A
					</div>
				</div>
			</div>
		</div>
	</section>

<?php

?>
    
</body>
</html>
