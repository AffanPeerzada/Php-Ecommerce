<?php

session_start();
if(!isset($_SESSION['admin']))
{
  header('location:login.php');
}
    include('header.php');

    include('../connection.php');

    $Cquery="SELECT * FROM `category`";
    $Cresult=mysqli_query($conn,$Cquery);

    if(isset($_POST['btnPro']))
    {
        $name=$_POST['name'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $cat=$_POST['category'];
       
        $image=addslashes(file_get_contents($_FILES['Img']['tmp_name']));

        $Pquery="INSERT INTO `product`(`pro_name`, `pro_price`, `pro_img`, `pro_quantity`, `pro_cat`)
                 VALUES ('$name','$price','$image','$quantity','$cat')";
        $Presult=mysqli_query($conn,$Pquery);

        if($Presult)
        {
            header('location:products.php');
        }
        else
        {
            echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
        }
    }

    $Vquery="Select * from `product` join `category` on product.pro_cat=category.cat_id";
    $Vresult=mysqli_query($conn,$Vquery);

    if(!$Vresult)
    {
        echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
    }

?>


<form method="POST" enctype="multipart/form-data" style="margin-top:30px">
    <label>Enter Product Name : </label>
            <input type="text" name="name" class="form-control" style="border:2px solid black" />
            <br>
            <label>Enter Product Price: </label>
            <input type="number" name="price" class="form-control" style="border:2px solid black"/>
            <br>

            <label>Upload Product Image : </label>
            <input type="file" name="Img"/>
            <br>
            <br>
            <label>Select Product Category : </label>
            <select name="category">
                <?php
                    while($row=mysqli_fetch_array($Cresult))
                    {
                ?>
                       <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                <?php
                    }
                ?>
            </select>
            <br>
            <br>
            <label>Enter Product Quantity : </label>
            <input type="number" name="quantity" class="form-control" style="border:2px solid black"/>
            <br>
            
           
            <br>
            <input type="submit" value="ADD PRODUCT" name="btnPro" class="btn btn-primary" style="margin-left:40%"/>
        
        </form>


        <table class="table table-bordered table-hover" style="margin-top:50px">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Image</th>
               
                
            </tr>
        <?php
            while($row=mysqli_fetch_array($Vresult))
            {
        ?>
                <tr>
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    <td><?php echo $row[7];?></td>
                    <td><?php echo $row[4];?></td>
                    <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row[3]);?>" width="70px" height="100px"/></td>
                    
                </tr>
    <?php 
            } 
    ?>


<?php
    include('footer.php');

?>


