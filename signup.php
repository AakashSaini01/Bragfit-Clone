<?php
include 'common/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $address = $_POST['address'];
  $phone_no = $_POST['phone_no'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password !== $confirm_password) {
    echo "<script>
             $(document).ready(function() {
                $('#alertModalBody').text('PASSWORD Doesn't Match');
                $('#alertModal').modal('show');
            });
          </script>";
  }

  $sql = "INSERT INTO users (`password`, `username`, `fullname`, `email`, `phone_no`, `address`) 
            VALUES ('$password', '$username', '$fullname', '$email', '$phone_no', '$address')";

  $result = $con->query($sql);

  if ($result > 0) {
    $_SESSION['username'] = $username;
    header("location: login.php");
  } else {
    echo "<script>
            $(document).ready(function() {
                $('#alertModalBody').text('Signup not done');
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

  <section class="vh-100">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                <form method="post" action="signup.php" id="CreateAccount">

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="fullname" id="form3Example1cg" class="form-control form-control-lg br-25 "
                      placeholder="Enter Your Full Name" />
                    <label class="form-label" for="form3Example1cg"></label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="username" id="form3Example1cg" class="form-control form-control-lg br-25 "
                      placeholder="Enter Username" />
                    <label class="form-label" for="form3Example1cg"></label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="address" id="form3Example3cg" class="form-control form-control-lg br-25 "
                      placeholder="Enter Your Full Address" />
                    <label class="form-label" for="form3Example3cg"></label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="phone_no" id="form3Example3cg" class="form-control form-control-lg br-25 "
                      placeholder="Enter Your Mobile Number" />
                    <label class="form-label" for="form3Example3cg"></label>
                  </div>


                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg br-25 "
                      placeholder="Enter Your Email" />
                    <label class="form-label" for="form3Example3cg"></label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="password" id="form3Example4cg"
                      class="form-control form-control-lg br-25 " placeholder="Create A Strong Password" />
                    <label class="form-label" for="form3Example4cg"></label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form3Example4cdg" class="form-control form-control-lg br-25 "
                      placeholder="Repeat Your Password" />
                    <label class="form-label" for="form3Example4cdg"></label>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                      class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Sign Up</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                      class="fw-bold text-body"><u>Login here</u></a></p>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>