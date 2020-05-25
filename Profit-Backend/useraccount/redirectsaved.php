<?php require_once ('includes/header.php'); ?>
<!-- Login Form -->

   <div class="container">
       <div class="row">
           <div class="col-lg-6 m-auto">
               <div class="card bg-light mt-5 py-2 photo">
                    <div class="card-title">
                    <?php 
                        display_message(); 
                        redirect_validation_saved();
                    ?>
                        <h2 class="text-center mt-2"> Log In</h2>
						<hr>
                    </div>
                    <div class="card-header">
                        <form action="" method="POST">
                    	    <input type="email" name="UEmail" placeholder=" Email" class="form-control py-2 mb-2">
                    	    <input type="password" name="UPass" placeholder=" Password" class="form-control py-2 mb-2">
						    <input type="checkbox" name="remember" id=""> <span> Remember me </span>
						    <button class="btn btn-dark float-right" style="background-color:#e23e3e;">Login </button>
                        
                    </div>
					<div class="card-footer ">
						<a href="recover.php" class="" style="color:#e23e3e;">Forgot Password?</a>
						<p class="float-right"> Not a member yet? <a href="register.php" style="color:#e23e3e;">Register</a> </p>
                        </form>
                    </div>
               </div>
           </div>
       </div>
   </div>
<?php require_once ('includes/footer.php'); ?>