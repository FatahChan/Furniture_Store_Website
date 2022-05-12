<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

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

    #top-nav>* {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        height: 100%;
    }

    #nav-left>* {
        display: flex;
        padding: 0 15px;
    }

    #nav-left>*>* {
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
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/item-page.css">
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
        <div id="filter-panel">
            <?php 
                function isrest(){
                    return (isset($_GET['submit-btn']) && $_GET['submit-btn'] == 'Reset');
                }
                function isnameset(){
                    return (!isrest() && isset($_GET['name']) ? $_GET['name'] : "");
                }
                function isall(){
                    return isset($_GET['category']) && in_array('all', $_GET['category']);
                }
                function ischeckboxset($categoryname){
                    if (isrest() || (isall() || (isset($_GET['category']) && in_array($categoryname, $_GET['category'])))){
                        return 'checked';
                    }else{
                        return '';
                    }
                }
                function ispriceset($pricetype){
                    if (isset($_GET[$pricetype])){
                        return $_GET[$pricetype];
                    }else if ($pricetype == 'min-price'){
                        return '1';
                    }else{
                        return '99999';
                    }
                }
            ?>
            <form action="search.php" id="filter-reset" method="get" hidden>
                <input type="search" name="name" value="">
                <div id="filter-category-div">
                    <input name="category[]" type="checkbox" value="living-room" checked>
                    <input type="checkbox" name="category[]" value="bed-room" checked>
                    <input type="checkbox" name="category[]" value="home/office" checked>
                    <input type="checkbox" name="category[]" value="sets" checked>
                </div>
                <div id="filter-price-div">
                    <input name="min-price" type="number" id="filter-min-price" min="1" value="1">
                    <input name="max-price" type="number" id="filter-max-price" value="99999">
                </div>
            </form>
            <form action="search.php" id="filter-form" method="get">
                <label for="filter-price-div">Item name: </label>
                <input type="search" id="filter-search" name="name" placeholder="Enter Item name"
                    value=<?php echo isnameset(); ?>>
                <hr>
                <label for="categories">Categories: </label>
                <div id="filter-category-div">
                    <input name="category[]" type="checkbox" value="living-room"
                        <?php echo ischeckboxset('living-room') ?>>
                    <label for="living-room"> Living Room</label><br>
                    <input type="checkbox" name="category[]" value="bed-room" <?php echo ischeckboxset('bed-room') ?>>
                    <label for="bed-room"> Bed Room</label><br>
                    <input type="checkbox" name="category[]" value="home/office"
                        <?php echo ischeckboxset('home/office') ?>>
                    <label for="home/office"> Home/Office</label><br>
                    <input type="checkbox" name="category[]" value="sets" <?php echo ischeckboxset('sets') ?>>
                    <label for="sets"> Sets</label><br>
                </div>
                <hr>
                <label for="filter-price-div">Price:</label>
                <div id="filter-price-div">
                    <label for="filter-min-price">min</label>
                    <input name="min-price" type="number" id="filter-min-price" min="1"
                        value=<?php echo ispriceset("min-price") ?>>
                    <label for="filter-max-price">max</label>
                    <input name="max-price" type="number" id="filter-max-price"
                        value=<?php echo ispriceset("max-price") ?>>
                </div>
                <hr>
                <div id="fitler-btn-div">
                    <input name="submit-btn" type="submit" value="Reset" form="filter-reset">
                    <input name="submit-btn" type="submit" value="Apply">
                </div>
            </form>
        </div>
        <div id="item-row">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'fathallah_furniture_store');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql_array_categories = '("living-room","bed-room","home/office","sets")';
            if (
                isset($_GET['category']) &&
                !in_array('all', $_GET['category'])
            ) {
                $sql_array_categories = '("' . join('", "', $_GET['category']) . '")';
            }
            $min_price = "price >= " . (isset($_GET['min-price']) ? $_GET['min-price'] : 1);
            $max_price = "price <= " . (isset($_GET['max-price']) ? $_GET['max-price'] : 99999999);
            $name_like = "name like '%" . (isset($_GET['name']) ? $_GET['name'] : "") . "%'";

            $sql = "SELECT * FROM items WHERE category in " . $sql_array_categories . " AND " . $min_price . " AND " . $max_price . " AND " . $name_like;

            if (isset($_GET['submit-btn']) && $_GET['submit-btn'] == 'Reset') {
                $sql = "SELECT * FROM items";
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="item" onclick="document.getElementById('.'\''.'modal'.$row['id'].'\''.').style.display=\'flex\'">';
                    echo    '<a>';
                    echo        '<div class="item-image">';
                    echo            '<img src="' . $row['image'] . '" / >';
                    echo        '</div>';
                    echo        '<div class="item-name">';
                    echo            '<p>' . $row['name'] . '</p>';
                    echo        '</div>';
                    echo        '<div class="item-price">' . $row['price'] . 'EGP </div>';
                    echo    '</a>';
                    echo '</div>';

                    echo '<div id='.'"modal'. $row['id'] .'" class="modal">';
                    echo    '<div class="modal-content">';
                    echo            '<span class="close" onclick="document.getElementById('.'\''.'modal'.$row['id'].'\''.').style.display=\'none\'">&times;</span> <br>';
                    echo            '<div class="main-item-page">';
                    echo                '<div class="image">';
                    echo                    '<img src='. $row['image'].' / >';
                    echo                '</div>';
                    echo                '<div class="text-div">';
                    echo                    '<h1>'.$row['name'].'</h1>';
                    echo                    '<hr>';
                    echo                    '<pre><p>'.$row['description'].'</p></pre>';
                    echo                '</div>';
                    echo                '<div class="purchase">';
                    echo                    '<h2>'.$row['price'] .' EGP</h2>';
                    echo                    '<h6> Item id: '.$row['id'] .'</h6><hr />';
                    echo                    '<form action="../functions/buy.php" method="POST" id="buy-form-'.$row['id'].'">';
                    echo                        '<input type="number" hidden name="id" value="'.$row['id'].'">';
                    echo                        '<input type="text" hidden name="sender-url" value="'.$_SERVER['REQUEST_URI'].'">';
                    echo                        '<label for="quantity">Quantity</label>';
                    echo                        '<input type="number" name="quantity" id="quantity" min="1" value="1" style="width: 60%">';
                    echo                        '<hr>';
                    echo                        '<div class="buy-form-btns">';
                    echo                            '<button form="buy-form-'.$row['id'].'" name="add-basket" class="add-basket-btn">Add to Cart</button>';
                    echo                            '<button form="buy-form-'.$row['id'].'" name="buy-now" class="buy-now-btn">Buy now</button>';
                    echo                        '</div>';
                    echo                    '</form>';
                    echo                '</div>';
                    echo            '</div>';
                    echo           '</div>';
                    echo        '</div>';
                }
            } else {
                echo '<img src="../assets/404.webp" style="width:100%"/>';
            }

    ?>
        </div>
</body>

</html>