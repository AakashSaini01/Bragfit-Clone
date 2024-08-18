<?php

include 'common/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = 'SELECT * from users where username = "' . $username . '"  and password = "' . $password . '" ';

	$result = $con->query($sql);

	$row = $result->fetch_assoc();

	if ($result->num_rows > 0) {
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $row['user_id'];
		header("location: index.php");
	} else {
		echo "<script>
            $(document).ready(function() {
                $('#alertModalBody').text('LOGIN not done');
                $('#alertModal').modal('show');
            });
          </script>";
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<?php include 'common/head.php'; ?>
</head>

<body>

	<?php include 'common/header.php'; ?>


	<div class="container">
		<div class="row">
			<div class="box-login">
				<h1 class="heading center">Login</h1>
				<form action="login.php" method="post">
					<!-- Email input -->
					<div data-mdb-input-init class="form-outline mb-4">
						<input type="text" name="username" id="form2Example1" class="form-control" />
						<label class="form-label" for="form2Example1">Username</label>
					</div>

					<!-- Password input -->
					<div data-mdb-input-init class="form-outline mb-4">
						<input type="password" name="password" id="form2Example2" class="form-control" />
						<label class="form-label" for="form2Example2">Password</label>
					</div>

					<!-- 2 column grid layout for inline styling -->
					<div class="row mb-4">
						<div class="col d-flex justify-content-center">
							<a href="#!">Forgot password?</a>
						</div>
					</div>

					<!-- Submit button -->
					<button type="submit" id="submit-btn" data-mdb-button-init data-mdb-ripple-init
						class="btn btn-warning btn-block mb-4">Sign in</button>

					<!-- Register buttons -->
					<div class="text-center">
						<p>Not a member? <a href="signup.php">Register</a></p>
						<p>or sign up with:</p>
						<button type="button" id="button-fa" data-mdb-button-init data-mdb-ripple-init
							class="btn btn-link btn-floating mx-1">
							<i class="fab fa-facebook-f"></i>
						</button>

						<button type="button" id="button-fa" data-mdb-button-init data-mdb-ripple-init
							class="btn btn-link btn-floating mx-1">
							<i class="fab fa-google"></i>
						</button>

						<button type="button" id="button-fa" data-mdb-button-init data-mdb-ripple-init
							class="btn btn-link btn-floating mx-1">
							<i class="fab fa-twitter"></i>
						</button>

						<button type="button" id="button-fa" data-mdb-button-init data-mdb-ripple-init
							class="btn btn-link btn-floating mx-1">
							<i class="fab fa-github"></i>
						</button>
					</div>
				</form>
			</div>

		</div>
	</div>

	<?php include 'common/footer.php'; ?>

</body>

</html>