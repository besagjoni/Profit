<?php require_once('useraccount/functions/db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProFit</title>
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/fixed.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body data-spy="scroll" data-target="#navbarResponsive">
<?php
    //database connection
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'profitphpmyadmin';

    $mysqli = new mysqli($host, $user, $pass, $db);
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $num_per_page=05;
    $start_from=($page-1)*05;

    $result = $mysqli->query ("SELECT * FROM nutrition LIMIT $start_from, $num_per_page") or die($mysqli->error);
    $result2 = $mysqli->query ("SELECT * FROM nutritioncategory ORDER BY Name ASC") or die($mysqli->error);
    $ID= $_GET['ID'];
    $Title='';
    $Description='';
    $NutritionCategory='';


?>

    <!--Start Home Section-->
    <div id="home">

       <!--Navigation-->
       <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.php"><img src="img/logo.PNG"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programs.php">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="nutrition.php">Nutrition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contact-area">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="useraccount/login.php">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="useraccount/register.php">Register</a>
                    </li>
                </ul>
                <div class="search">
                    <form action="#">
                        <input type="text" placeholder=" Search... " name="search">
                        <button>
                            <i class="fa fa-search" style="font-size: 18px;">
                            </i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!--End Navigation-->

        <!-- HEADER IMAGE -->

        <div class="header-img">
            <img src="img/hdr.jpg" class="responsive">
        </div>


        <!--HEADER IMAGE-->

    </div>
    <!--End Home Section-->


    <div class="row" id="all-nutrition">
        <div class="column left">
            <div class="row programs-title">
                <h3>Nutrition</h3>
            </div>
            <div class="row programs-container">
                <?php while ($nutrition = $result->fetch_assoc()): ?> 
                <div class="row programs-content">
                    <div class="card mb-3 program-card" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <?php echo '<img src="data:img/jpg;base64,'.base64_encode($nutrition['img']).'" height="200" width="200"  class="card-img" alt="..." >' ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $nutrition['Title'] ?></h5>
                                </div>
                                <div class="card-body">
                                    <a class="card-text font-italic">Category:</a>
                                    
                                    <?= $nutrition['NutritionCategory'] ?>
                                </div>
                                <div class="card-body program-action">
                                    <a href="useraccount/redirect.php?ID=<?php echo $nutrition['ID']; ?>" class="card-link full-item" >See full article</a>
                                    <button type="button" class="btn btn-outline-warning save-btn" name="save"><a href="saved-items.php" >Save</a></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <?php
                $pr_query="SELECT * FROM nutrition";
                $pr_result= Query($pr_query);
                $total_record=row_count($pr_result);

                $total_page = ceil( $total_record/$num_per_page);
                
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php if($page>1){
                        echo "<li class='page-item disabled'>
                        <a href='nutrition.php?page=".($page-1)."'class='btn btn-danger'> Previous </a> </li>";
                    }
                    for($i=1; $i<$total_page; $i++){
                    echo" <nav aria-label='Page navigation example'>
                  
                    <li class='page-item'>    
                    <a class='page-link' href='nutrition.php?page=".$i."'>$i </a>
                    </li>
                    </nav>";
                }
                    if($i>$page){
                        echo "<li class='page-item disabled'>
                        <a href='nutrition.php?page=".($page+1)."'class='btn btn-danger'> Next </a> </li>";
                    } ?>
                </ul>
            </nav>
        </div>
        <div class="column right">
            <div class="row categories-title">
                <h4>Categories</h4>
            </div>
            <div class="border-bottom"><?php while ($category = $result2->fetch_assoc()): ?></div>
            <div class="row categories-container">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href=""><?= $category['Name'] ?></a></li>
                </ul>
            <?php endwhile; ?>
            </div>
        </div>
    </div>


    <!--Start Footer Section-->
    <div id="footer" class="offset">

        <footer>
            <div class="row justify-content-center">

                <div class="col-md-5 text-center">
                    <img src="img/logo.png">
                    <p>Gjithmone prane jush per t'ju sjelle programet e fitnesit dhe dietat me te mira qe jane cerifikuar deri me tani.</p>

                    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter-square"></i></a>
                    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>

                </div>

                <hr class="socket">
                &copy; ProFIT.


            </div>
            <!--End of Row-->
        </footer>

    </div>
    <!--End footer Section-->



    <!--- Script Source Files -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <!--- End of Script Source Files -->


</body>

</html>
