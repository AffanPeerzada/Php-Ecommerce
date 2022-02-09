<?php
    include('header.php');
    if(isset($_POST['btnRegister']))
    {
        include('connection.php');
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['password'];

        $query="INSERT INTO `customer`(`cus_name`, `cus_email`, `cus_password`) VALUES ('$name','$email','$pass')";
        $result=mysqli_query($conn,$query);

        if($result)
        {
            echo "<script>alert('Account Created Successfully!');</script>";
        }
        else
        {
            echo "<script>alert('SORRY! Account Not Created');</script>";
        }
    }
    
?>


<!-- inner page section -->
 <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>LogIn</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form method="post">
                        <fieldset>
                           <input type="text" placeholder="Enter your name" name="name" required />
                           <input type="email" placeholder="Enter your email address" name="email" required />
                           <input type="password" placeholder="Enter your password" name="password" required />
                           <input type="submit" value="Register" name="btnRegister" />
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end why section -->
      <!-- arrival section -->
      <section class="arrival_section">
         <div class="container">
            <div class="box">
               <div class="arrival_bg_box">
                  <img src="images/arrival-bg.png" alt="">
               </div>
               <div class="row">
                  <div class="col-md-6 ml-auto">
                     <div class="heading_container remove_line_bt">
                        <h2>
                           #NewArrivals
                        </h2>
                     </div>
                     <p style="margin-top: 20px;margin-bottom: 30px;">
                        Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                     </p>
                     <a href="">
                     Shop Now
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end arrival section -->