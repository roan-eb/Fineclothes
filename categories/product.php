<?php
$con = require("connection.php");

if (!isset($_GET['id'])) {
    echo "ID not set";
    exit;
}

$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if ($check_int == false) {
    echo "This is not a number (integer)";
    exit;
}

$statement = $con->prepare('SELECT * FROM `clothes` WHERE id=?');
$statement->bind_param('d', $id);
$statement->execute();
$result = $statement->get_result();
$product = $result->fetch_array(MYSQLI_ASSOC);
$cat = $product['cat'];

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
        <nav class="navbar">
            <a href="../index.php" class="logo">Fine Clothes</a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="women.php" class="nav-link" <?php if ($cat == 'women') : ?> id="color-cate" <?php endif ?>>Women</a></li>
                <li class="nav-item"><a href="men.php" class="nav-link" <?php if ($cat == 'men') : ?> id="color-cate" <?php endif ?>>Men</a></li>
                <li class="nav-item"><a href="kids.php" class="nav-link" <?php if ($cat == 'kids') : ?> id="color-cate" <?php endif ?>>Kids</a></li>
                <li class="nav-item"><a href="../login/account.php" class="nav-link"><i class="fa fa-user"></i></a></li>
                <li class="nav-item"><a href="" class="nav-link"><i class="fa-solid fa-bag-shopping"></i></a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>

    </header>



    <div class="product-details">
        <div class="container-product">
            <div class="img-container">
                <img src="../img/<?php echo $product['cat'] ?>/<?php echo $product['picture'] ?>" alt="">
            </div>
            <div class="description-product">
                <h2>
                    <?php echo $product['title']; ?>
                </h2>
                <p>
                    <?php echo $product['description'] ?>
                </p>
                <span>
                    €<?php echo $product['price'] ?>
                </span>
                <span class="actual-price">
                    <?php echo $product['discount'] ?>
                </span>
                <div>
                    <button class="buy-product">Buy Now</button>
                    <button class="cart-product">Add To Cart</button>
                </div>
                <a href="#" onclick="goBack()" class="">
                    Back to products
                </a>            
            </div>
        </div>
    </div>

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