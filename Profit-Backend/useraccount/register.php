<?php require_once ('includes/header.php'); ?>
<!-- Register Form -->

   <div class="container">
       <div class="row">
           <div class="col-lg-6 m-auto">
               <div class="card bg-light mt-5 py-2 photo">
                    <div class="card-title">
                        <h2 class="text-center mt-2"> Register</h2>
						<hr>
                    </div>
                    <div class="card-body">
                        <?php user_validation();?>
                        <form action="" method="post">
                            <input type="text" name="FirstName" placeholder=" First Name" class="form-control py-2 mb-2" required>
                            <input type="text" name="LastName" placeholder=" Last Name" class="form-control py-2 mb-2" required>
                            <input type="email" name="Email" placeholder=" Email" class="form-control py-2 mb-2" required>
                            <input type="password" name="pass" placeholder=" Password" class="form-control py-2 mb-2" required>
                            <input type="password" name="cpass" placeholder=" Confirm Password" class="form-control py-2 mb-2" required>

					        <button class="btn btn-success" style="background-color:#e23e3e;"> Register </button>
					        <p class="float-right">Already a member? <a href="login.php"  style="color:#e23e3e;">Log in</a> </p>
                        </form>
                    </div>
               </div>
           </div>
       </div>
   </div>
<?php require_once ('includes/footer.php'); ?>
