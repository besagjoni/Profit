<?php require_once ('includes/header.php'); ?>
<!-- Login Form -->

   <div class="container">
       <div class="row">
           <div class="col-lg-6 m-auto">
               <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                    <?php 
                    redirect_validation();
                        display_message(); 
                        
                    ?>
                        <h2 class="text-center mt-2"> LogIn Form</h2>
						<hr>
                    </div>
                    <div class="card-header">
                        <form action="" method="POST">
                    	    <input type="email" name="UEmail" placeholder=" example@example.com" class="form-control py-2 mb-2">
                    	    <input type="password" name="UPass" placeholder=" Password" class="form-control py-2 mb-2">
						    <input type="checkbox" name="remember" id=""> <span> Remember me ? </span>
						    <button class="btn btn-dark float-right">Login </button>
                        
                    </div>
					<div class="card-footer ">
						<a href="recover.php" class="">Forget Password</a>
						<p class="float-right"> Not yet a member? <a href="register.php">Register</a> </p>
                        </form>
                    </div>
               </div>
           </div>
       </div>
   </div>
<?php require_once ('includes/footer.php'); ?>