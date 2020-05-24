
<?php include 'useraccount/functions/db.php'; ?>
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
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programs.php">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nutrition.php">Nutrition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-area">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="useraccount/login.php">Log-In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="useraccount/register.php">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <br>
<div class="article-container">
    <?php
        if(isset($_POST['submit-search'])){
            $search = mysqli_real_escape_string($con, $_POST['search']);
            $sql="SELECT * FROM nutrition Where  Title LIKE '%$search%' OR Description LIKE '%$search%' ";
            $result= Query($sql);
            $queryResult= mysqli_num_rows($result);

            if($queryResult>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<a href='single-item.php?Title=".$row['Title']."'><div class='article-box'> 
                    <h3> ".$row['Title']."</h3> </a>
                    <p> ".$row['Description']."</p>
                    </div>";
                }
			}else{
                $search = mysqli_real_escape_string($con, $_POST['search']);
                $sql="SELECT * FROM program Where  Title LIKE '%$search%' OR Description LIKE '%$search%' ";
                $result= Query($sql);
                $queryResult= mysqli_num_rows($result);
    
                if($queryResult>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<a href='single-item.php?Title=".$row['Title']."'><div class='article-box'> 
                        <h3> ".$row['Title']."</h3> </a>
                        <p> ".$row['Description']."</p>
                        </div>";
                    }
                }
            }
        }else{
                echo "There are no results matching your search.";
            }  
    ?>
</div>

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

    </div>
    <!--End footer Section-->



    <!--- Script Source Files -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <!--- End of Script Source Files -->


</body>

</html>
