<?php
    session_start();

    $id=$_GET['id'];
    $index=array_search($id,$_SESSION['cart']);

    unset($_SESSION['cart'][$index]);
    unset($_SESSION['quantity'][$index]);

    $_SESSION['cart']=array_values($_SESSION['cart']);
    $_SESSION['quantity']=array_values($_SESSION['quantity']);

    header('location:viewCart.php');
?>