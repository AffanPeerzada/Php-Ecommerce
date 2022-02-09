<?php

session_start();
if(!isset($_SESSION['admin']))
{
  header('location:login.php');
}
    include('header.php');

    include('../connection.php');

    if(isset($_POST['btnCat']))
    {
        $name=$_POST['txtname'];

        $query="INSERT INTO `category`(`cat_name`) VALUES ('$name')";
        $result=mysqli_query($conn,$query);

            if($result)
            {
                header('location:categories.php');
            }
            else
            {
                echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
            }

    }

        $Vquery="Select * from category";
        $Vresult=mysqli_query($conn,$Vquery);

        if(!$Vresult)
        {
            echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
        }

?>


<form method="post"  style="margin-left:20px;margin-top:30px">
            <label>Enter Category Name : </label>
            <input type="text" name="txtname" class="form-control" style="border:2px solid black"/>
           
            <br>
            <input type="submit" value="ADD CATEGORY" name="btnCat" class="btn btn-primary" style="margin-left:40%"/>
        
        </form>


        <table class="table table-bordered table-hover" style="margin-top:50px">
        <tr>
            <th>Category Id</th>
            <th>Category Name</th>
        </tr>

    <?php
        while($row=mysqli_fetch_array($Vresult))
         {
    ?>
            <tr>
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
            </tr>

    <?php
         } 
    ?>

    </table>


<?php
    include('footer.php');

?>


