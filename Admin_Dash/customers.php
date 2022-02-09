<?php
       session_start();
       if(!isset($_SESSION['admin']))
       {
         header('location:login.php');
       }
           include('header.php');
       
           include('../connection.php');
       

        $query="Select * from customer";
        $result=mysqli_query($conn,$query);

        if(!$result)
        {
            echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
        }
    ?>



 <table class="table table-bordered table-hover" style="margin-top:50px">
        <tr>
            <th>Customer Id</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Customer Password</th>
        </tr>

     <?php
        while($row=mysqli_fetch_array($result))
         {
     ?>
            <tr>
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
                <td><?php echo $row[2];?></td>
                <td><?php echo $row[3];?></td>
               
            </tr>

     <?php
         } 
     ?>

    </table>

<?php
    include('footer.php');

?>
