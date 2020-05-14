<!DOCTYPE html>  
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ProFit</title>
	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../../css/admin.css">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>

<title>Admin Section - Add Category</title>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php require_once 'process.php'; ?>

<!--Start Home Section-->
<div id="home">
    
    <div class="content  my-5 border-0">
        
        <!--Navigation-->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			<a class="navbar-brand" href="../../index.php"><img src="img/logo.png"></a>
            <a class="nav-link" href="../../useraccount/login.php">Logout</a>
        </nav>  
		<!--End Navigation-->
        
        <!--Admin page wrapper-->
        <div class="admin-wrapper">

            <div class="left-sidebar my-4">
                <ul>
                    <li><a href="../posts/index.php">Manage Posts</a></li>
                    <li><a href="index.php">Manage Category</a></li>
                    <li><a href = "indexnutrition.php">Manage Nutrition</a></li>
                </ul>
            </div>

            <!--Admin Content-->
            <div class="admin-content my-3">
                <div class="button-group ">
                    <a href="index.php" class="btn btn-big">Edit Posts</a>
                </div>

                <h2 class="page-title">Add Programs Category</h2>
                <form action="process.php" method="POST">
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                    <div>
                        <label>Name</label><br>
                        <input type="text" name="Name" placeholder= "Shkruani kategorine" value="<?php echo $Name; ?>"class="text-input">
                    </div>
                    <div>
                        <?php 
                        if($update == true):
                        ?>
                        <button type="submit" class="btn btn-big" name="update">Update</button>
                        <?php else: ?>
                        <button type="submit" class="btn btn-big" name="save">Add Category</button>
                        <?php endif; ?>
                        <a href="index.php" class="btn btn-big">Cancel</a>
                    </div>  
                </form>
            </div>

        </div>

    </div>

</div>     

<!--- Script Source Files -->
<script src="../../jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<script src="../../js/scripts.js"></script>
<!--- End of Script Source Files -->


</body>
</html>