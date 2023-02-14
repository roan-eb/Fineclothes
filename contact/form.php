<?php

$con = require("connection.php");

$name = '';
$email = '';
$message = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');

    if (isEmpty($name)) {
        $errors['name'] = 'Please enter your name';
    }
    if (!isValidEmail($email)) {
        $errors['email'] = 'This email address is invalid';
    }
    if (!hasMinLength($message, 5)) {
        $errors['message'] = 'Enter at least 5 characters';
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO `contact` (`name`, `email`, `message`, `date`) 
            VALUES (?, ?, ?, ?);";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ssss', $name, $email, $message, $date);
        $stmt->execute();
        header("Location: submitted.html");
        exit;
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine Clothes</title>
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

    <section class="form--contact">
        <div class="container--form">
            <form action="form.php" method="POST" novalidate>

                <div class="form--group">
                    <label for="name">Name</label>
                    <input type="text" value="<?php echo $name;?>" name="name" id="name" autocomplete="off" placeholder="Enter name" required>
                    <?php if (!empty($errors['name'])) : ?>
                        <p class="error-msg-contact"><?php echo $errors['name'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form--group">
                    <label for="email">Email</label>
                    <input type="email" value="<?php echo $email;?>" name="email" id="email" autocomplete="off" placeholder="Enter email address" required>
                    <?php if (!empty($errors['email'])) : ?>
                        <p class="error-msg-contact"><?php echo $errors['email'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="form--group">
                    <label for="message">Message</label>
                    <textarea style="font-family:sans-serif" name="message" id="message" cols="30" rows="10" placeholder="Write your message here.." autocomplete="off" required><?php echo $message;?></textarea>
                    <?php if (!empty($errors['message'])) : ?>
                        <p class="error-msg-contact"><?php echo $errors['message'] ?></p>
                    <?php endif; ?>

                </div>

                <button type="submit" class="button-submit-contact">Submit</button>
            </form>
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
                <a href="form.php">Contact Us</a>
            </li>
        </ul>
        <p class="copyright">
            © 2022 Fine Clothes.
        </p>
    </footer>

</body>

</html>