
<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'fathallah_furniture_store');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// check that all items are valid
$items = explode(',', $_POST['items']);
foreach($items as $item){
    $sql = "SELECT * from items where id='$item'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) == 0){
        header("Location: ../pages/checkout.php?invalid-item=".$item);
    }
}
// insert items to the table
foreach($items as $item){
    $sql = "SELECT * from items where id='$item'";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc();
    
    $price = $result['price'];
    $name = $result['name'];
    $cateory = $result['category'];
    $sql = 
    "INSERT INTO 
        `purchases`(`item-id`, `item-category`, `item-name`, `item-price`, `purchaser-email`, `purchaser-number`) 
    VALUES 
        ('".$item."', '" .$cateory. "', '" .$name. "', '" .$price. "', '" .$_POST['email']. "', '" .$_POST['phone-number']. "')";
    $conn->query($sql);
}
?>

<body>
    <!-- displays the final page after submission -->
    <?php
        echo "the following item has been purchased ".$_POST['items'];
        echo "<br />";
        session_destroy();
        echo '<a href="../pages/home.php">Click here to return to home page</a>'
    ?>
</body>