<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


<?php 

if(isset($_POST['submit'])){

    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $body =  $_POST['body'];


}
    
?>

    <!-- Navigation -->
    
    <?php  include "includes/navgation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>

                    <form role="form" action="register.php" method="post" id="login-form" autocomplete="off">
                    
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                        </div>

                        <div class="form-group">
                            <label for="email" class="sr-only">Subject</label>
                            <input type="email" name="subject" id="subject" class="form-control" placeholder="Enter Your Subject">
                        </div>

                         <div class="form-group">
                          <textarea class="form-control" name="body" id="" cols="50" rows="10" ></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
