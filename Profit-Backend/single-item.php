<?php

//database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'profitphpmyadmin';

$mysqli = new mysqli($host, $user, $pass, $db);

$ID= $_GET['ID'];
$result = $mysqli->query ("SELECT * FROM program WHERE ID=$ID") or die($mysqli->error);
$result2 = $mysqli->query ("SELECT * FROM programcategory WHERE ID=$ID") or die($mysqli->error);
$res = $mysqli->query ("SELECT * FROM nutrition WHERE ID=$ID") or die($mysqli->error);
$res2 = $mysqli->query ("SELECT * FROM nutritioncategory WHERE ID=$ID") or die($mysqli->error);
?>

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
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

    <!--Start Home Section-->
    <div id="home">

        <!--Navigation-->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.html"><img src="img/logo.PNG"></a>
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
                        <a class="nav-link" href="nutrition.php">Nutrition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link saved" id="saved" href="saved-items.php">Saved Items</a>
                        <div class="dropdown-settings">
                            <a href="settings.html">Settings</a>
                            <a href="index.php">Log out</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contact-area">Contact</a>
                    </li>
                </ul>
                <div class="search">
                    <form action="search.php" method="POST">
                        <input type="text" placeholder=" Search... " name="search">
                        <button name="submit-search">
                            <i class="fa fa-search" style="font-size: 18px;">
                            </i>
                        </button>
                    </form>>
                </div>
                <div class="settings"><i class="fa fa-cog"></i>
                    <div class="dropdown-settings">
                        <a href="settings.html">Settings</a>
                        <a href="index.php">Log out</a>
                    </div>
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

    <section id="item-content">
        <div class="go-back">
            <button class="go-back-btn" ><a href="programs.php"><i class="fa fa-arrow-left"></i> Go back</a></button>
        </div>
        <div class="content row" id="single-item" style="width: 1200px">
            <div class="single-item">
                <div class="card mb-3 width: 50px program-card" style="max-width: 940px;">
                <?php if ($item = $result->fetch_assoc()):?>
                    <div class=" row no-gutters" style="width:1000px">
                        <div class="padding:20 px my-5 col-md-4" style="left:10px">
                            <?php echo '<img src="data:img/jpg;base64,'.base64_encode($item['img']).'" height="200" width="200"  class="card-img" alt="..." >' ?>
                            <div class="card-body item-category">
                                <a class="card-text font-italic">Category:</a> 
                                <p class="card-text" id="category"><?= $item['ProgramCategory'] ?></p>
                            </div>
                            <div class="card-body item-action">
                            <button type="button" class="btn btn-outline-warning save-btn savePost" value="<?php echo $item['ID']; ?>"><a href= "saved-items.php?ID=<?php echo $item['ID']; ?>">Save</a></button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="item-title"><?= $item['Title'] ?></h5>
                            </div>
                            <div class="card-body" >
                                <p class="card-text">
                                <?= $item['Description'] ?>
                                </p>
                            </div>

                        </div>

                    </div>
                    <?php endif; ?>
                    <?php if ($item = $res->fetch_assoc()):?>
                    <div class=" row no-gutters" style="width:1000px">
                        <div class="padding:20 px my-5 col-md-4" style="left:10px">
                            <?php echo '<img src="data:img/jpg;base64,'.base64_encode($item['img']).'" height="200" width="200"  class="card-img" alt="..." >' ?>
                            <div class="card-body item-category">
                                <a class="card-text font-italic">Category:</a> 
                                <p class="card-text" id="category"><?= $item['NutritionCategory'] ?></p>
                            </div>
                            <div class="card-body item-action">
                                <button type="button" class="btn btn-outline-warning save-btn">Save</button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="item-title"><?= $item['Title'] ?></h5>
                            </div>
                            <div class="card-body" >
                                <p class="card-text">
                                <?= $item['Description'] ?>
                                </p>
                            </div>

                        </div>

                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

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
    
    <script>
    $(document).ready(function(){
        $('.savePost').on('click', function(){
        var statusVal = $(this).val();
        console.log(statusVal);
            $.ajax({
                type: "POST",
                url: "saveStatus.php",
                data: {statusType: statusVal},
                success: function(msg){
                    console.log(msg);
                }
            })
        });
    });

    </script>

</body>

</html>
