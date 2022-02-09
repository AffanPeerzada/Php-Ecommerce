<?php

    $header="From:batch1710c1@gmail.com \r\n";
    $header.="MIME-Version:1.0\r\n";
    $header.="Content-type:text/html\r\n";

    echo mail("batch1710c1@gmail.com","E-Commerce Website","Placed Order Successfully",$header);

    //header('location:viewCart.php');

    
?>