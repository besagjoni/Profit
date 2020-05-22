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

    $result = $mysqli->query ("SELECT * FROM program ORDER BY Title DESC LIMIT 3 ") or die($mysqli->error);
    $res = $mysqli->query ("SELECT * FROM nutrition ORDER BY Title DESC LIMIT 3 ") or die($mysqli->error);
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

        <!--Start Image Slider-->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">

                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1">

                </li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2">

                </li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!--slide1-->
                <div class="carousel-item active" style="background-image: url(img/pic1.jpg);">
                    <div class="carousel-caption text-center">
                        <a class="btn btn-outline-light btn-lg" href="#work-section">Get Started</a>
                    </div>
                </div>
                <!--slide2-->
                <div class="carousel-item" style="background-image: url(img/pic2.jpg);">
                    <div class="carousel-caption text-center">
                        <a class="btn btn-outline-light btn-lg" href="#work-section">Get Started</a>
                    </div>
                </div>
                <!--slide3-->
                <div class="carousel-item" style="background-image: url(img/pic3.jpg);">
                    <div class="carousel-caption text-center">
                        <a class="btn btn-outline-light btn-lg" href="#work-section">Get Started</a>
                    </div>
                </div>
            </div>
            <!--End Carousel Inner-->
            <!--Prev & Next Buttons-->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">
                </span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true">
                </span>
            </a>
        </div>
        <!--End Image Slider-->
    </div>
    <!--End Home Section-->


    <!--work from home SECTION-->

    <div id="work-section">
        <div class="col-12 narrow text-center">
            <div class="paragraph-text">
                <h1>Work out at home for free.</h1>
                <p class="lead">
                    We believe fitness should be accessible to everyone, everywhere, regardless of income or access to a gym.
                    With hundreds of professional workouts, healthy recipes and informative articles, as well as one of the
                    most positive communities on the web, you’ll have everything you need to reach your personal fitness goals
                    – for free!
                </p>
            </div>
        </div>
    </div>

    <!--END work from home SECTION-->


    <!--Who are we?-->
    <div id="paragraph1" class="offset">


        <div class="col-12 narrow text-center">
            <div class="paragraph1-text">
                <h1>Why choose ProFIT?</h1>
                <P class="lead1">
                    Created to help you live a better, happier, healthier life.<br>
                    We believe fitness should be accessible to everyone, everywhere, regardless of income level or access to a gym. That's why we offer hundreds of free, full-length workout videos, the most affordable and effective workout programs on the web, meal plans, and helpful health, nutrition and fitness information.
                </P>
            </div>
        </div>
    </div>

    </div>

    <!---------- Video Section Starts--------->

    <iframe src="https://www.youtube.com/embed/UBMk30rjy0o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

    </iframe>

    <!---------- Video Section Ends----------->


    <!--Top 3 articles-->

    <!---------- Blog Section Starts----------->


    <section class="details-card">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center">
                        <h2><b>Programet me te fundit</b></h2>
                        <div class="sub-heading">
                            Ketu kemi programet e publikuara me te fundit<br>Gjeni programin qe pelqeni me shume!
                        </div>
                    </div>
                </div>
            </div> <br><br>
        
            <div class="row">
            <?php while ($program = $result->fetch_assoc()): ?>
                <div class="col-md-4">           
                    <div class="card-content">                   
                        <div class="card-img">                                             
                            <?php echo '<img src="data:img/jpg;base64,'.base64_encode($program['img']).'" >' ?>
                            <span>
                            <h4><?= $program['ProgramCategory'] ?></h4> 
                            </span>
                        </div>
                        <div class="card-desc">                        
                            <h3><?= $program['Title'] ?></h3>
                            <p><?= $program['Description'] ?></p>
                            <a href="useraccount/redirect.php?ID=<?php echo $program['ID']; ?>" class="btn-card">Read</a>                              
                        </div>                                          
                    </div>                    
                </div>
                <?php endwhile; ?>                         
            </div>                       
        </div>
        
                
    </section>
    <!---------- Blog Section Ends  ----------->

    <!------------Blog section 2 ------------------->

    <section class="details-card2">
        <div class="container">

            <div class="row">
            <?php while ($nutrition = $res->fetch_assoc()): ?>
                <div class="col-md-4">           
                    <div class="card-content">                   
                        <div class="card-img">                                             
                            <?php echo '<img src="data:img/jpg;base64,'.base64_encode($nutrition['img']).'" >' ?>
                            <span>
                                <h4><?= $nutrition['NutritionCategory'] ?></h4>
                            </span>
                        </div>
                        <div class="card-desc">                        
                            <h3><?= $nutrition['Title'] ?></h3>
                            <p><?= $nutrition['Description'] ?></p>
                            <a href="useraccount/redirect.php?ID=<?php echo $nutrition['ID']; ?>" class="btn-card">Read</a>                              
                        </div>                                          
                    </div>                    
                </div>
                <?php endwhile; ?>                         
            </div>                       
        </div>
    </section>
    <!-- details card section starts from here -->

    <!------------end Blog section 2 -------------->

    <!--Section: Contact v.2-->
    <section class="mb-4" id="contact-area">
        <div class="container">
            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4" style="font-size: 40px; ">Kontakt</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5" style="font-size: 20px; ">Nese keni ndonje pyetje apo paqartesi, mos hezitoni te na kontaktoni.
                Mundohemi te zgjidhim cdo paqartesi tuajen.
            </p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Emri</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Email</label>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Subjekti</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    <label for="message">Mesazhi</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->
                        <div class="send-btn">
                            <div class="text-center text-md-left">
                                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
                            </div>
                        </div>

                    </form>

                    <div class="status"></div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>Albania, Tirane</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+ 355 34 56 789</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>contact@profit.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>
        </div>
    </section>
    <!--Section: Contact v.2-->

    <!---------- Map Section Starts  ----------->

    <section class="maps wow fadeIn" id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47935.73251235451!2d19.782803666629967!3d41.33097689278679!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1350310470fac5db%3A0x40092af10653720!2sTirana%2C%20Albania!5e0!3m2!1sen!2s!4v1574016540126!5m2!1sen!2s" width="100%" height="655" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </section>

    <!---------- Map Section Ends  ----------->


    <!---------- Contact Form Section Starts ---------->

    <!---------- Contact Form Section Ends  ----------->

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
