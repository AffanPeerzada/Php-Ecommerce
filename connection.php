<?php

    $conn=mysqli_connect('localhost','root','','ecommerce');

    if(!$conn)
    {
        die("Error : ".mysqli_error($conn));
    }

?>