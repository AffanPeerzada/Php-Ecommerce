<?php
    session_start();

        if(!in_array($_GET['id'],$_SESSION['cart']))
        {
            array_push($_SESSION['cart'],$_GET['id']);
            array_push($_SESSION['quantity'],1);
            $_SESSION['msg']="Added Successfully";
            header('location:product.php');
        }
        else
        {
            $_SESSION['msg']="Item Is Already Added";
            header('location:product.php');
        }
   
?>