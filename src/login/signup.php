<?php
$conn = new mysqli("db", "eventuser", "eventpass", "eventdb");

$error = "";
$signupSuccess = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if (empty($username) || empty($password) || empty($confirm)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Username is already taken.";
        } else {
            $insert = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";
            if (mysqli_query($conn, $insert)) {
                $signupSuccess = true;
            } else {
                $error = "Database error. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up - ButterCup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/5.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="">
                <span class="login100-form-logo">
                    <i class="zmdi zmdi-landscape"></i>
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    Create Account
                </span>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger text-center" role="alert"><?= $error ?></div>
                <?php endif; ?>

                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" name="username" placeholder="Username" required>
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password" required>
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Confirm password">
                    <input class="input100" type="password" name="confirm" placeholder="Confirm Password" required>
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-20">
                    <a class="txt1" href="login.php">
                        Already have an account? Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>

<?php if ($signupSuccess): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Account Created!',
    text: 'You will be redirected to login...',
    timer: 3000,
    showConfirmButton: false
}).then(() => {
    window.location.href = 'login.php';
});
</script>
<?php endif; ?>

</body>
</html>
