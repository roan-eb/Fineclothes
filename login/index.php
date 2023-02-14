<?php

session_start();

$con = require("connection.php");
$error = false;
$display = array(
    'email' => ''    
);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach($_POST as $key => $value){
        if(isset($display[$key])){
            $display[$key] = htmlspecialchars($value);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        // read info from database
        $query = "select * from users where email = '$email' limit 1";

        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: account.php");
                    die;
                }
            }
        }
        $error =  "Wrong email or password!";
    } else {
        $error = "Please enter valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="" />
    <script src="../js/main.js" defer></script>
    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <a href="../index.php" class="logo">Fine Clothes</a>
        </nav>
    </header>
    <section class="banner">
        <div id="box-login">
            <form class="form-form" method="POST">
                <div class="login-title">Login</div>

                <div class="login-icon">
                    <h5 class="login-h5">Email</h5>
                    <input class="text-form" type="email" name="email" placeholder="Email" value="<?php echo $display['email']; ?>">
                    <i class="fa fa-envelope" aria-hidden="true"></i><br><br>
                </div>
                <div class="login-icon">
                    <h5 class="login-h5">Password</h5>
                    <input class="text-form" type="password" name="password" placeholder="Password">
                    <i class="fa fa-key" aria-hidden="true"></i><br><br>
                </div>
                
                <input class="button-submit" type="submit" value="Login"><br><br>

                <a class="register-form" href="register.php">Click to Register</a><br><br>
            </form>
        </div>
        <?php if ($error) : ?>
            <div class="error-msg">
                <?php echo $error; ?>
            </div>
        <?php endif ?>

    </section>


    <footer class="footer">
        <div class="social">
            <a href="https://www.instagram.com/fineclothes/"><i class="fab fa-instagram"></i></a>
            <a href="https://facebook.com/fineclothes"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com/fineclothes"><i class="fab fa-twitter"></i></a>
            <a href="https://linkedin.com/fineclothes"><i class="fab fa-linkedin"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="../index.php">Home</a>
                <a href="#">Services</a>
                <a href="#">Terms</a>
                <a href="#">Privacy Policy</a>
                <a href="../contact/form.php">Contact Us</a>
            </li>
        </ul>
        <p class="copyright">
            © 2022 Fine Clothes.
        </p>
    </footer>


</body>

</html>