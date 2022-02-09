<?php
    session_start();

    unset($_SESSION['cart']);
    unset($_SESSION['quantity']);
    unset($_SESSION['total']);
    unset($_SESSION['msg']);

    header('location:product.php');

?>