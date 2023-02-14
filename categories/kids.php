<?php
$con = require("connection.php");

$result = $con->query("SELECT * FROM `clothes` WHERE `cat` = 'kids' ORDER BY RAND(5);");

$sort = "";
$color = "";
$discount = "";

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $color = $_GET['color'];
}

if (isset($_GET['discount'])) {
    $discount = $_GET['discount'];
}

if (!empty($sort)) {
    $stmt = $con->prepare("SELECT * FROM `clothes` WHERE `cat` = 'kids' AND `sort` = ?");
    $stmt->bind_param("s", $sort);
    $stmt->execute();
    $res = $stmt->get_result();
    $result = $res->fetch_all(MYSQLI_ASSOC);
}

if (!empty($color)) {
    $stmt = $con->prepare("SELECT * FROM `clothes` WHERE `cat` = 'kids' AND `color` = ?");
    $stmt->bind_param("s", $color);
    $stmt->execute();
    $res = $stmt->get_result();
    $result = $res->fetch_all(MYSQLI_ASSOC);
}

if (!empty($discount)) {
    $stmt = $con->prepare("SELECT * FROM `clothes` WHERE `cat` = 'kids' AND `discount` IS NOT NULL;");
    $stmt->execute();
    $res = $stmt->get_result();
    $result = $res->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine Clothes - Kids</title>
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
                <li class="nav-item"><a href="women.php" class="nav-link">Women</a></li>
                <li class="nav-item"><a href="men.php" class="nav-link">Men</a></li>
                <li class="nav-item"><a href="kids.php" class="nav-link" id="color-cate">Kids</a></li>
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

    <div class="all-products">

        <section class="filter-products">
            <div class="filter-container">
                <form class="form-filter" action="kids.php" method="GET">
                    <div class="filter-sections">
                        <h3>Sort</h3>
                        <select name="sort" class="filter-sort">
                            <option value="">-</option>
                            <option value="hoodie">Hoodie</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="pants">Pants</option>
                            <option value="shoes">Shoes</option>

                        </select>
                    </div>

                    <div class="filter-sections">
                        <h3>Color</h3>
                        <select name="color" class="filter-sort">
                            <option value="">-</option>
                            <option value="black">Black</option>
                            <option value="beige">Beige</option>
                            <option value="gray">Gray</option>
                            <option value="white">White</option>
                            <option value="blue">Blue</option>
                            <option value="dark">Dark blue</option>
                            <option value="red">Red</option>
                            <option value="pink">Pink</option>
                            <option value="purple">Purple</option>
                        </select>
                    </div>
                    <div class="filter-sections">
                        <h3>Discount</h3>
                        <input type="checkbox" class="filter-sections_checkbox" name="discount" value="checked">
                    </div>
                    <div class="button-filter">
                        <button class="search-btn_filter" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </section>


        <section class="clothing-list">

            <?php foreach ($result as $row) : ?>
                <div class="product-card">
                    <div class="product-image">
                        <a class="clothing-list__product" href="product.php?id=<?php echo $row['id']; ?>">
                            <img src="../img/<?php echo $row['cat']; ?>/<?php echo $row['picture']; ?>" alt="" class="product-thumb">
                        </a>
                        <button class="card-btn">Add to cart</button>
                    </div>
                    <div class="product-info">
                        <a class="clothing-list__product" href="product.php?id=<?php echo $row['id']; ?>">
                            <h2 class="product-brand"><?php echo $row['title']; ?></h2>
                            <p class="product-short-description"><?php echo $row['description']; ?></p>
                            <span class="price">€<?php echo $row['price']; ?></span>
                            <span class="actual-price"><?php echo $row['discount']; ?></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
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