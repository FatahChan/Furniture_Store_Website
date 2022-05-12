<?php
session_start();
if (isset($_SESSION['cart'][$_POST['id']])) {
    $_SESSION['cart'][$_POST['id']] += $_POST['quantity'];
} else {
    $_SESSION['cart'][$_POST['id']] = $_POST['quantity'];
}

if (isset($_POST['add-basket'])) {
    header("Location: " . $_POST['sender-url']);
} elseif (isset($_POST['buy-now'])) {
    header("Location: " . "../pages/checkout.php");
}

?>
