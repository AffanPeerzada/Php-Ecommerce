<?php
    session_start();

    include('connection.php');

    $currentDate=date('Y-m-d');

    $customer=$_SESSION['customerId'];
    $totalamount=$_SESSION['total'];

    $ordquery="INSERT INTO `orders`(`ord_date`, `cus_id`, `total_amount`) VALUES ('$currentDate','$customer','$totalamount')";
    $ordresult=mysqli_query($conn,$ordquery);
    if($ordresult)
    {
        $orderId=mysqli_insert_id($conn);

        $query="SELECT * FROM  `product` WHERE pro_id IN (".implode(',',$_SESSION['cart']).")";
        $result=mysqli_query($conn,$query);

        $index=0;
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<script>alert(".$row['pro_id'].")</script>";

            $product_id=$row['pro_id'];
            $product_name=$row['pro_name'];
            $product_quantity=$_SESSION['quantity'][$index];
            $product_price=$row['pro_price'];

            $invoiceQuery="INSERT INTO `invoice`(`ord_id`, `pro_id`, `pro_name`, `pro_quantity`, `pro_price`)
                           VALUES ('$orderId','$product_id',' $product_name','$product_quantity',' $product_price')";
            
            $invoiceresult=mysqli_query($conn,$invoiceQuery);
            if(!$invoiceresult)
            {
                echo "Error In Invoice".mysqli_error($conn);
            }
            $index++;
           
        }
        include('email.php');
        
        unset($_SESSION['cart']);
        unset($_SESSION['quantity']);
        unset($_SESSION['total']);

        $_SESSION['msg']="Placed Order Successfully!";

        header('location:index.php');
    }
    else
    {
        echo "Error : ".mysqli_error($conn);
    }
?>