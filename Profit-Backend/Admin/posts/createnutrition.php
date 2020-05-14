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

<title>Admin Section - Add Posts</title>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php require_once 'processnutrition.php'; ?>
	<!--Start Home Section-->
	<div id="home">

		<!--Navigation-->
		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
			<a class="navbar-brand" href="../../index.php"><img src="img/logo.png"></a>
            <a class="nav-link" href="../../useraccount/login.php">Logout</a>
		</nav>
		<!--End Navigation-->

        <!--Admin page wrapper-->

        <div class="admin-wrapper content my-5 border-0">

            <div class="left-sidebar my-4">
                <ul>
                    <li><a href="indexnutrition.php">Manage Posts</a></li>
                    <li><a href="../category/indexnutrition.php">Manage category</a></li>
                    <li><a href = "index.php">Manage Programs</a></li>
                </ul>

            </div>
            <!--Admin Content-->
            <div class="admin-content my-3">

                <div class="button-group">
                    <a href="indexnutrition.php" class="btn btn-big">Edit Posts</a>
                </div>

                <div class="content my-3 ">

                    <h2 class="page-title">Add Nutrition Posts</h2>
                    <form action="processnutrition.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                        <div>
                            <label>Title</label><br>
                            <input type="text" name="Title" class="text-input" value="<?php echo $Title; ?>" placeholder="Shkruani titullin" >
                        </div>
                        <div>
                            <label>Body</label>
                            <textarea name="Description" id="body" value="<?php echo $Description; ?>" placeholder="Pershkrimi" ></textarea>
                        </div>
                        <div>
                                <label for="img">Select image:</label><br>
                                <input type="file" id="img" name="img" value="<?php echo $img; ?>">
                        </div> 
                        <div>
                            <label>Category</label><br>
                            <select name="NutritionCategory" id="text-input" >
                            <?php 
                            while ($rows = $resultSet->fetch_assoc()){
                                $category = $rows['name'];
                                echo "<option value='$category'>$category</option>";
                            }
                            ?>
                                <!--<option value="Poetry">Poetry</option>
                                <option value="Life Lessons">Life Lessons</option>-->
                            </select>
                        </div>
                        <div><br>
                            <?php if($update == true): ?>
                            <button type="submit" class="btn btn-big" name="update">Update</button>
                            <?php else: ?>
                            <button type="submit" name="save" class="btn btn-big">Add Post</button>
                            <?php endif; ?>
                            <a href="indexnutrition.php" class="btn btn-big">Cancel</a>
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

