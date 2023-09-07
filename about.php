<?php
    include 'connection.php';
    session_start();
    $admin_id = $_SESSION['user_name'];

    if (!isset($admin_id)) {
        header('location:login.php');
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap icon link -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet"  href="main.css">
        <title>about page</title>
    </head>
<body>
<?php include 'header.php';  ?>

    <div class="banner">    
    <div class="detail">
        <h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspabout us</h1>
      
        <a href="index.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   home </a><span>/ about us</span>
    </div>
</div>
<!-------------------------about us---------------------------->
<div class="about-us">
    <div class="row">
        <div class="row">
            <div class="title">
                <span>ABOUT OUR ONLINE STORE</span>
                <h1>Hello, with 25 year of experience</h1>
            </div>
            <p>If you re older than 25, do you remember your 25th birthday and what you did to celebrate? The answer for most people is probably not—25 is seen as a less momentous occasion than turning 21 (the legal drinking age in the United States) or 30, when a person enters the next phase of life as a thirtysomething. Yet for companies, 25 is a significant milestone, marking a quarter century of existence, a feat that only a minority of companies that start each year actually achieve. </p>
        </div>
        <div class="img-box">
            <img src="image/59.png">
        </div>
    </div>
</div>
<!-------------------------about us features---------------------------->
    <!-- <div class="line4"></div> -->
    <div class="features">
        <div class="title">
            <h1>Complete Customer Ideas</h1>
            <span> best features</span>
        </div>
        <div class="row">
            <div class="box">
                <img src="image/16.png">
                <h4>24 X 7</h4>
                <p>Online Support 27/7</p>
            </div>

            <div class="box">
                <img src="image/17.jpg">
                <h4>Money Back Guarantee</h4>
                <p>100% Secure Payment</p>
            </div>

            <div class="box">
                <img src="image/18.png">
                <h4>Special Gift Card</h4>
                <p>Give The Perfect Gift</p>
            </div>

            <div class="box">
                <img src="image/19.png">
                <h4>Worldwide Shipping</h4>
                <p>On Order Over $99</p>
            </div>
        </div>
    </div>
        <div class="line4"></div>

<!-------------------------team section---------------------------->
        <!-- <div class="line2"></div> -->
        <div class="team">
            <div class="title">
                <h1>Our Workable Team</h1>
                <span>best team</span>
            </div>
            <div class="row">
                <div class="box">
                    <div class="img-box">
                        <img src="image/21.jpg">
                    </div>
                    <div class="detail">
                        <span>Founder</span>
                        <h4>Mitali Kasodariya</h4>
                        <div class="icons">
                            <i class="bi bi-instagram"></i>
                            <i class="bi bi-youtube"></i>
                            <i class="bi bi-twitter"></i>
                            <i class="bi bi-behance"></i>
                            <i class="bi bi-whatsapp"></i>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="img-box">
                        <img src="image/21.jpg">
                    </div>
                    <div class="detail">
                        <span>Co-Founder</span>
                        <h4>Sahil Chotaliya</h4>
                        <div class="icons">
                            <i class="bi bi-instagram"></i>
                            <i class="bi bi-youtube"></i>
                            <i class="bi bi-twitter"></i>
                            <i class="bi bi-behance"></i>
                            <i class="bi bi-whatsapp"></i>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="img-box">
                        <img src="image/21.jpg">
                    </div>
                    <div class="detail">
                        <span>HR manager </span>
                        <h4>Mitali </h4>
                        <div class="icons">
                            <i class="bi bi-instagram"></i>
                            <i class="bi bi-youtube"></i>
                            <i class="bi bi-twitter"></i>
                            <i class="bi bi-behance"></i>
                            <i class="bi bi-whatsapp"></i>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="img-box">
                        <img src="image/21.jpg">
                    </div>
                    <div class="detail">
                        <span>front-end developers</span>
                        <h4>Sahil</h4>
                        <div class="icons">
                            <i class="bi bi-instagram"></i>
                            <i class="bi bi-youtube"></i>
                            <i class="bi bi-twitter"></i>
                            <i class="bi bi-behance"></i>
                            <i class="bi bi-whatsapp"></i>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="img-box">
                        <img src="image/21.jpg">
                    </div>
                    <div class="detail">
                        <span>full-stack developers</span>
                        <h4>Mittu Kasodariya</h4>
                        <div class="icons">
                            <i class="bi bi-instagram"></i>
                            <i class="bi bi-youtube"></i>
                            <i class="bi bi-twitter"></i>
                            <i class="bi bi-behance"></i>
                            <i class="bi bi-whatsapp"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-------------------------project---------------------------->

        <div class="line4"></div>
        <div class="project">
            <div class="title">
                <h1>Our Best Project</h1>
                <span>how it works</span>
            </div>
            <div class="row">
                <div class="box">
                    <img src="image/25.png">
                </div>
                <div class="box">
                    <img src="image/26.png">
                </div>
            </div>
        </div>
        <!-------------------------History---------------------------->

        <!-- <div class="line"></div> -->
        <!-- <div class="line2"></div> -->
        <div class="ideas">
            <div class="title">
                <h1>We And Our Clients Are Happy To Cooperate Eith Our Company</h1>
                <span>our features</span>
            </div>
            <div class="row">
                <div class="box">
                    <i class="bi bi-stack"></i>
                    <div class="detail">
                        <h2>What We Really</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus necullamcirper mattis,pulvinar dapibus leo.</p>
                    </div> 
                </div>

                <div class="box">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <div class="detail">
                        <h2>History of Beginning</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus necullamcirper mattis,pulvinar dapibus leo.</p>
                    </div> 
                </div>

                <div class="box">
                    <i class="bi bi-tropical-storm"></i>
                    <div class="detail">
                        <h2>Our Vision</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus necullamcirper mattis,pulvinar dapibus leo.</p>
                    </div> 
                </div>
            </div>
        </div>



    <?php include 'footer.php';  ?>

   <script type="text/javascript" src="script.js"></script>
</html>