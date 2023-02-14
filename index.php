<?php
$con = require("connection.php");

$result = $con->query("SELECT * FROM `clothes` WHERE `discount`");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine Clothes</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="" />
    <script src="js/main.js" defer></script>
    <script src="https://kit.fontawesome.com/44df10ddff.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo">Fine Clothes</a>
            <ul class="nav-menu">
                <li class="nav-item"><a href="categories/women.php" class="nav-link">Women</a></li>
                <li class="nav-item"><a href="categories/men.php" class="nav-link">Men</a></li>
                <li class="nav-item"><a href="categories/kids.php" class="nav-link">Kids</a></li>
                <li class="nav-item"><a href="login/account.php" class="nav-link"><i class="fa fa-user"></i></a></li>
                <li class="nav-item"><a href="" class="nav-link"><i class="fa-solid fa-bag-shopping"></i></a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>

    </header>

    <section class="section section--first">
        <div class="cover">
            <img src="img/cover.webp" alt="A cover with a white jacket, pants and yellow shoes">
            <article class="text">
                <h2>Get up to 20% off our best selling products</h2>
                <a id="link-discount" href="#discount-target">Shop now</a>

            </article>
        </div>
    </section>
    <section class="section section--second">
        <div class="men-cover">
            <a class="cover-click" href="categories/men.php">
                <img class="cover-img" src="img/cover-men.webp" height="300" width="300" alt="">
                <h6 class="h6-cover">Men</h6>
            </a>
        </div>
        <div class="women-cover">
            <a class="cover-click" href="categories/women.php">
                <img class="cover-img" src="img/cover-women.webp" height="300" width="300" alt="">
                <h6 class="h6-cover">Women</h6>
            </a>
        </div>
        <div class="kids-cover">
            <a class="cover-click" href="categories/kids.php">
                <img class="cover-img" src="img/cover-kids.webp" height="300" width="300" alt="">
                <h6 class="h6-cover">Kids</h6>
            </a>
        </div>
    </section>
    <section id="discount-target" class="section section--third">
        <button class="pre-btn"><i class="fa-solid fa-angle-right"></i>
        </button>
        <button class="nxt-btn"><i class="fa-solid fa-angle-right"></i>
        </button>

        <div class="product-container">
            <?php foreach ($result as $row) : ?>
                <div class="product-card">
                    <div class="product-image">
                        <a class="clothing-list__product" href="categories/product.php?id=<?php echo $row['id']; ?>">
                            <img src="img/<?php echo $row['cat']; ?>/<?php echo $row['picture']; ?>" alt="" class="product-thumb">
                        </a>
                        <button class="card-btn">Add to cart</button>
                    </div>

                    <div class="product-info">
                        <a class="clothing-list__product" href="categories/product.php?id=<?php echo $row['id']; ?>">
                            <h2 class="product-brand"><?php echo $row['title']; ?></h2>
                            <p class="product-short-description"><?php echo $row['description']; ?></p>
                            <span class="bestselling-price">€<?php echo $row['price']; ?></span>
                            <span class="actual-price"><?php echo $row['discount']; ?></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

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
                <a href="index.php">Home</a>
                <a href="#">Services</a>
                <a href="#">Terms</a>
                <a href="#">Privacy Policy</a>
                <a href="contact/form.php">Contact Us</a>
            </li>
        </ul>
        <p class="copyright">
            © 2022 Fine Clothes.
        </p>
    </footer>
</body>

</html>