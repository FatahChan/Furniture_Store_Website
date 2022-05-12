<?php
session_start();
if (isset($_POST['delete'])) {
    unset($_SESSION['cart'][$_POST['id']]);
} else if (isset($_POST['update'])) {
    $_SESSION['cart'][$_POST['id']] = $_POST['item-quantity'];
}

header("Location: ../pages/checkout.php");