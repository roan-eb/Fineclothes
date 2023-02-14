<?php
session_start();

$con = require("connection.php");
$error = false;

$display = array(
    'name' => ''
);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach($_POST as $key => $value){
        if(isset($display[$key])){
            $display[$key] = htmlspecialchars($value);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($email) && !empty($password)) {
        // save info to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,name,email,password) values ('$user_id','$name','$email','$password')";

        $result = mysqli_query($con, $query);
        if ($result == true) {
            header("Location: index.php");
            die;
        }

        $error = "This email address has already been used!";
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
    <title>Register</title>
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
                <div class="login-title">Register</div>

                <div class="login-icon">
                    <h5 class="login-h5">Name</h5><i class="fa fa-user" aria-hidden="true"></i>
                    <input class="text-form" type="text" name="name" placeholder="Enter full name" value="<?php echo $display['name']; ?>"><br><br>
                </div>
                <div class="login-icon">
                    <h5 class="login-h5">Email</h5><i class="fa fa-envelope" aria-hidden="true"></i>
                    <input class="text-form" type="email" name="email" placeholder="Enter email address"><br><br>
                </div>

                <div class="login-icon">
                    <h5 class="login-h5">Password</h5><i class="fa fa-key" aria-hidden="true"></i>
                    <input class="text-form" type="password" name="password" placeholder="Enter password"><br><br>
                </div>

                <input class="button-submit" type="submit" value="Register"><br><br>

                <a class="register-form" href="index.php">Click to Login</a><br><br>
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