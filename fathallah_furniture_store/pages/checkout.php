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
    <link rel="stylesheet" href="../css/checkout.css">
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
    
    <div id="main-checkout">
        <div id="checkout-panel">
            <!-- this piece of code collects every item that is added to cart
            and converts them to signal string separated by a comma -->
            <?php 
                $cartstring='';
                if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 ){
                    foreach ($_SESSION['cart'] as $id => $qt){
                        for($i=0; $i < $qt; $i++){
                            $cartstring = $cartstring.",".$id;
                        }
                    }
                    if($cartstring[0] == ','){
                        $cartstring = ltrim($cartstring, ',');
                    }
                }
            ?>
            <form action="../functions/checkoutfunc.php" id="checkout-form" method="POST" onsubmit="submit_check_out()">
                
                <label for="item-id">* Item(s) id</label>
                <div>
                    <input type="checkbox" onchange="getElementById('items-input').readOnly = !this.checked"/>
                    <label > Add Item manually </label>
                    <label style="color:red"> 
                        <?php 
                            if(isset($_GET['invalid-item'])){
                                echo "invalid item: ".$_GET["invalid-item"];
                            }   
                        ?>
                    </label>
                </div>
                <input id="items-input" name="items" type="text" readonly="true" required="true" placeholder="for multiple items, sperate by comma" pattern="^[0-9]+(,[0-9]+)*" required value=<?php echo "\"".$cartstring."\"" ?>>
                <label for="email">*Email</label>
                <input name="email" type="email" placeholder="enter your email" required="true">
                <label for="phone-number">*Phone Number</label>
                <input type="tel" name="phone-number" pattern="^[0-9]{10,15}$" placeholder='enter your phoen number, eg. 01551705338' required>
                <label for="address-line-1">*Address Line 1</label>
                <input type="text" name="address-line-1" id="address-line-1"
                    placeholder="enter address line 1, eg. 23 Mustfa Nahas" required="true">
                <label for="address-line-2">Address Line 2</label>
                <input type="text" name="address-line-2" id="address-line-2"
                    placeholder="enter address line 2, eg. Apt 20, Fl 4">
                <label for="city">*City</label>
                <input type="text" name="city" id="city" placeholder="enter city, eg. Nasr City" required="true">
                <label for="state/province">*State/Province</label>
                <input type="text" name="province" id="province" placeholder="enter province, eg. Cairo" required="true">
                <hr>
                <div id="checkout-btn-div">
                    <input type="submit" name="checkout" value="Checkout" id="checkout-submit" >
                </div>
            </form>
            <script>
                function submit_check_out() {
                    let submitbutton = document.getElementById('checkout-submit');
                    submitbutton.disabled=true; 
                    submitbutton.value='Sending…';
                }
            </script>
        </div>
        <div i  d="item-row" <?php echo (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)? '': 'style="display:none"'; ?>>
            <?php
            $price = 'not found';
            $name = 'not found';
            $description = 'not found';
            $image = 'https://picsum.photos/1920/1080';
            $conn = new mysqli('localhost', 'root', '', 'fathallah_furniture_store');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if(isset($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
                foreach ($cart as $id => $quantity) {
                    $sql = "SELECT * from items where id='$id'";
                    $result = $conn->query($sql);
                    $result = $result->fetch_assoc();
                    $price = $result['price'];
                    $name = $result['name'];
                    $image = $result['image'];
                    
                    echo
                    '
                    <div class="item">
                        <div class="item-image">
                            <img src="' . $image . '" alt="">
                        </div>
                        <div class="item-name">
                                <p>' . $name . '</p>
                        </div>
                        <div> item id:'.$id.'</div>
                        <div class="item-price">
                            ' . $price . ' EGP
                        </div>
                        <hr>
                        <div class="item-update-form-div">
                            <form action="../functions/update-cart.php" class="item-update-form" method="post">
                                <input type="number" name="id" value="' . $id . '" hidden>
                                <label for="quantity">Quantity</label>
                                <input class="item-quantity" type="number" name="item-quantity" min="1" value="' . $quantity . '">
                                <div id="item-btn-div">
                                    <input type="submit" name="delete" value="Delete" id="delete-btn">
                                    <input type="submit" name="update" value="Update" id="update-btn">
                                </div>
                            </form>
                        </div>
                </div>';
                }
            }

            ?>
        </div>
    </div>
</body>

</html>