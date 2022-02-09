<?php
    session_start();
    
    if(isset($_POST['btnSave']))
    {
        foreach($_POST['indexes'] as $key)
        {
            $_SESSION['quantity'][$key]=$_POST['quan'.$key];
        }
        header('location:viewCart.php');
    }
?>