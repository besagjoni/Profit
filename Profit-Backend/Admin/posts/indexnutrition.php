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

<title>Admin Section - Manage Posts</title>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php require_once 'processnutrition.php';  ?>

<?php
    $mysqli = new mysqli('localhost', 'root', '', 'profitphpmyadmin') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM nutrition") or die($mysqli->error);
    ?>
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
            <li><a href="../category/indexnutrition.php">Manage Category</a></li>
            <li><a href = "index.php">Manage Programs</a></li>
        </ul>

    </div>

    <div class="admin-content my-3">

        <div class="button-group ">
            <a href="createnutrition.php" class="btn btn-big">Add Post</a>
        </div>

        <div class="content my-3">

            <h2 class="page-title">Manage Nutrition Posts</h2>

            <table>
                <thead>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th colspan="3">Action</th>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        while ($row = $result->fetch_assoc()):
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['Title']; ?></td>
                        <td><?php echo $row['Description']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['NutritionCategory']; ?></td>
                        <td><a href="createnutrition.php?edit=<?php echo $row['ID']; ?>" class="edit">Edit</a></td>
                        <td><a href="processnutrition.php?delete=<?php echo $row['ID']; ?>" class="delete">Delete</a></td>
                    </tr>
                        <?php $no++ ; ?>
                        <?php endwhile; ?>
                </tbody>
            </table>

        </div>

    </div>

</div>
	         

<!--- Script Source Files -->
<script src="../../jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<!--- End of Script Source Files -->


</body>
</html>
