<?php 
session_start();

    $_SESSION;
    include("connection.php");
    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href=""/>
    <script src="../js/main.js" defer></script>
    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="../index.php" class="logo">Fine Clothes</a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="account.php" class="nav-link"><i class="fa fa-user"></i></a></li>
                <li class="nav-item"><a href="" class="nav-link"><i class="fa-solid fa-bag-shopping"></i></a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>

            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>

    </header>

    <section class="banner">
        <div class="account-info">
           <h1 >Welcome back, <?php echo $user_data['name']?>!</h1>
        </div>
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