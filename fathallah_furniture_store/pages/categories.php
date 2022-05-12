<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fathallah Furniture Store - <?php echo basename($_SERVER['PHP_SELF'], '.php') ?></title>
    <style>
    body {
        margin: 0;
        height: 100vh;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
            Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    }
    a {
        text-decoration-line: none;
        text-decoration-style: none;
        color: #fafafa;
    }

    #top-nav {
        display: flex;
        flex-direction: row;
        height: 10vh;
        background-color: #0059ff;
        justify-content: space-between;
        align-items: center;
    }

    #top-nav > * {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        height: 100%;
    }

    #nav-left > * {
        display: flex;
        padding: 0 15px;
    }

    #nav-left > * > * {
        align-self: center;
    }

    .navs:hover {
        background-color: #ffa500;
    }

    #search-form {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
    }

    #search-form * {
        height: 40%;
    }

    #search-form select {
        background-color: #ffa500;
        border-color: #fafafa;
        font-weight: bold;
        color: #fafafa;
        text-shadow: #fafafa;
        border-radius: 4px;
    }

    #search-form #search-btn {
        background-color: #ffa500;
        border-color: #fafafa;
        font-weight: bold;
        color: #fafafa;
        text-shadow: #fafafa;
        border-radius: 4px;
    }

    #nav-right {
        display: flex;
        align-items: center;
    }

    #nav-right>* {
        height: 40%;
        margin: 0 20px 0 0;
        height: min-content;
        color: #fafafa;
    }

    #checkout-btn {
        font-size: medium;
        font-weight: bold;
        background-color: #ffa500;
        color: #0059ff;
        border-radius: 12px;
    }

    #checkout-btn:hover {
        background-color: #ff5100;
    }

    #landscape {
        position: absolute;
        left: 420px;
        top: 20px;
    }

    #landscape img {
        width: 28px;
    }
    </style>
    <script src="https://kit.fontawesome.com/07256d6aec.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/categories.css">
    <link rel="icon" type="image/x-icon" href="../assets/logo.ico">
</head>

<body>
    <div id="navbar">
        <div id="landscape">
            <img src="../assets/logo.ico" />
        </div>
        <div id="top-nav">
            <div id="nav-left" href="home.php">
                <div class="navs"><a href="home.php">Home</a></div>
                <div class="navs"><a href="categories.php">Categories</a></div>
                <div class="navs"><a href="contact.php">Contact Us</a></div>
            </div>
            <div id="nav-center">
                <form id="search-form" action="search.php" method="get">
                    <select name="category[]" id="category-select">
                        <option value="all">All Categories</option>
                        <option value="living-room">Living Room</option>
                        <option value="bed-room">Bed Room</option>
                        <option value="home/office">Home/Office</option>
                        <option value="sets">Sets</option>
                    </select>
                    <input type="search" name="name" size="75">
                    <button id="search-btn" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div id="nav-right">
                <i class="fa-solid fa-cart-shopping"></i>
                <div>
                    <?php if (isset($_SESSION['cart'])) {
                        $count = 0;
                        foreach ($_SESSION['cart'] as $item_count) {
                            $count += $item_count;
                        }
                        echo $count;
                    } else {
                        echo 0;
                    } ?></div>
                <button id="checkout-btn" onclick="location.href='checkout.php'">
                    Check Out
                </button>
            </div>
        </div>
    </div>
    <div id="main">
        <div id="categories-grid">
            <a href="search.php?category[]=living-room">
                <div class="category-panel" id="top-left-panel">
                    <img src="../assets/living-room-cat.webp" />
                    <h1 class="category-name">Living Room</h1>
                </div>
            </a>
            <a href="search.php?category[]=bed-room">
                <div class="category-panel" id="top-right-panel" >
                    <img src="../assets/bedroom-cat.avif" />
                    <h1 class="category-name">Bed Room</h1>
                </div>
            </a>
            <a href="search.php?category[]=home/office">
                <div class="category-panel" id="bottom-left-panel">
                    <img src="../assets/home-office-cat.avif" />
                    <h1 class="category-name">Home/Office</h1>
                </div>
            </a>
            <a href="search.php?category[]=sets">
                <div class="category-panel" id="bottom-right-panel">
                    <img src="../assets/set-cat.webp" />
                    <h1 class="category-name">Sets</h1>
                </div>
            </a>
        </div>
    </div>
</body>

</html>