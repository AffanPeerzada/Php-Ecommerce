<?php
    session_start();
    include('header.php');
    include('connection.php');

    $query="SELECT * FROM `product` WHERE pro_id IN (".implode(',',$_SESSION['cart']).")";
    $result=mysqli_query($conn,$query);

?>

<form method="post" action="saveCart.php">
   

    <table class="table table-bordered">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Total Price</th>
            <th>Actions</th>
        </tr>

        <?php
            $index=0;
            $total=0;

            if($result)
            {
                while($row=mysqli_fetch_assoc($result))
                {
        ?>

        <tr>
            <td><?php echo $row['pro_id'];?></td>
            <td><?php echo $row['pro_name'];?></td>
            <input type="hidden" name="indexes[]" value="<?php echo $index;?>"/>
            <td><input type="number" value="<?php echo $_SESSION['quantity'][$index];?>" min=1 name="quan<?php echo $index;?>"/></td>
            <td><?php echo $row['pro_price'];?></td>
            <td><?php echo $_SESSION['quantity'][$index]*$row['pro_price'];?></td>
            <td><a href="deleteCart.php?id=<?php echo $row['pro_id'];?>">Delete</a></td>
        </tr>

        <?php
            $total+=$_SESSION['quantity'][$index]*$row['pro_price'];
            $_SESSION['total']=$total;
            $index++;

            }
            }else{
                echo "<h1 style='text-align:center'>Currently No Item Is the Cart</h1>";
            }
        ?>
    </table>
 <br>
    <input type="submit" value="Update Cart" name="btnSave"/>
    <br>
    <div style="margin-left:38%">
        <?php
            echo "<h2>Your Total Bill Is PKR = ".$total."</h2>";
        ?>
        <div style="margin-left:3%">
        <a href="clearCart.php" class="btn btn-danger btn-lg">Clear Cart</a>
        <a href="checkout.php" class="btn btn-success btn-lg">Place Order</a>
        </div>
     </div>
</form>

<?php
    include('footer.php');
?>