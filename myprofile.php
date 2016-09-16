
 <!-- Obtain and verify user's information
    ================================================== -->

<?php session_start(); 

 if(!isset($_SESSION['user'])){    
   header('Location: ./login.php');                  
 }
 else{
     include ('./php/util.php'); 
     $user=consult("SELECT * FROM musicartist WHERE id=".$_SESSION['user']);
     $name=$user[0]['name'];
     
     $type=consult("SELECT name FROM type WHERE id=".$user[0]['id_type']);
     $type=$type[0]['name'];
     $country=consult("SELECT name FROM country WHERE id=".$user[0]['id_country']);
     $country=$country[0]['name'];
     $state=consult("SELECT name FROM state WHERE id=".$user[0]['id_state']);
     $state=$state[0]['name'];

     $image=$user[0]['image'];
     if($image=="")
        $image="./img/default.jpg";
    else {
        if(getimagesize($image)<1){
        $image="./img/default.jpg";
        }
    }
     $email=$user[0]['email'];
     $phone=$user[0]['phone'];
     $price=$user[0]['price'];
     $musiclist=$user[0]['musiclist'];
     $description=$user[0]['description'];

 }
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	 <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>iBand - My profile</title>
    <meta name="description" content="Swiftly Personal/Portfolio Template">
    <meta name="keywords" content="personal template, portfolio template, creative, bootstrap, html5/css5">
    <meta name="author" content="Harry">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Google-Fonts
    ================================================== -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/plugins.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/green.css" media="screen"/>

    <!-- Modernizr
    ================================================== -->
    <script type="text/javascript" src="js/modernizr.js"></script>
</head>


<body data-spy="scroll" data-offset="120">

    <!-- Preloader -->
    <div class="animationload">
        <div class="loader">
            Loading...
        </div>
    </div> 
    <!-- End Preloader -->


	<!-- Container -->
	<div id="container" class="container">

		<!-- LEFT-SIDEBAR
		================================================== -->
		<div id="sidebar" class="fl_menu">
			<!-- header -->
			<header class="sidebar-section">
				<div class="header-logo">
                    <!-- Logo -->
					<a class="logo" href="#">
                        <span>iBand</span> <!-- Your logo here-->
                    </a>
				</div>
				<a class="elemadded responsive-link" href="#">Menu</a>
				<div class="navbar-vertical">
					<ul class="main-menu nav">
						<li class="active"><a href="./myprofile.php"><i class="pe-7s-user"></i>My profile</a></li>
                        <li ><a href="./update_profile.php"><i class="pe-7s-note"></i>Update profile</a></li>
                        <li ><a href="./php/logout.php"><i class="pe-7s-network"></i>Logout</a></li>
					</ul>
				</div>
			</header>
			<div class="social-box text-center" id="sidebar-social">
				<ul class="list-inline">
			
				</ul>
			</div>
		</div>
		<!-- End Left-Sidebar -->

		<!-- content 
		================================================== -->
		<div id="content">

        <!-- ====================
                 EXPERIENCE 
                 ====================-->
            <section class="experience section section-t wow fadeInRight animated" id="experience">
                <p class="sub-title">How does my profile look like?</p>
                <h3 class="title">See your profile!</h3>
                <hr/>
               <form id="contactForm" name="contactForm" method="POST" class="margin-t-40">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Name -->
                            
                            <!-- Email -->
                            
                             <h3>When a user consults your information, it will look in the next way:</h3>
                        </div>

                    </div> <!-- End row -->
                </form><!-- END FORM -->


                <!-- Experience-Item -->
                <hr>    
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class=" design effects overlay-effect clearfix">
                                    <div class="img">
                                        <img src=<?php echo '"'.$image.'"'; ?> alt="Sorry, the image is not available">
                                        <div class="overlay">
                                            <button class="md-trigger expand" data-modal="modal-1"><i class="fa fa-search"></i><br/>view More</button>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="col-md-9 col-sm-8">
                        <div class="cv-item">
                            <h4><?php echo $name; ?></h4>
                            <p>
                                <strong>Country: </strong><?php echo $country; ?><br>
                                <strong>State: </strong><?php echo $state; ?><br>
                                <strong>Type: </strong><?php echo $type; ?><br>
                                <strong>Price: </strong><?php if($price==""){echo "Not available";} else {echo $price;} ?><br>
                                <strong>Description: </strong>
                                <?php if($description==""){echo "Not available";} else {echo $description;} ?>
                            </p>
                        </div><!-- end .cv-item -->
                    </div>
                </div>
                     



                <!-- End Row --> 



              
            </section>
            <!-- End Experience -->

			<!--====================
                HOME
                ====================-->
                
                            <div class="md-modal md-effect" id="modal-1">
                                    <div class="md-content">
                                        <div class="folio">
                                            <div class="port-img margin-t-40" id="div-modal-img">
                                                <img src=<?php echo '"'.$image.'"'; ?> alt="Sorry, the image is not available" class="img-responsive">
                                            </div>
                                            <div class="sp-name"><strong><?php echo $name; ?></strong><br><span><?php echo $country.", ".$state."<br>".$type; ?></span></div>
                                            <div class="sp-dsc">
                                                <strong>Price: </strong><?php echo $price; ?><br>
                                                <strong>Phone: </strong><?php echo $phone; ?><br>
                                                <strong>E-mail: </strong><?php echo $email; ?><br>
                                                <strong>Description: </strong><br><?php echo $description; ?><br>
                                                <blockquote>
                                                    
                                                </blockquote>
                                   
                                            </div>
                                            <?php echo $musiclist; ?>
                                            <button class="md-close"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                </div>


			

            <!-- ====================
                 FOOTER
                 ====================-->
            <footer class="footer">
                <p class="copyright">© 2016 iBand. All rights Reserved.</p>
            </footer>
            <!-- End Footer -->


		</div>
		<!-- End content -->
	</div>
    <!-- End Container -->

    <!-- Scroll top -->
    <a href="#" class="back-to-top"> <i class="pe-7s-angle-up"></i></a>


	<!-- Javascript -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/jquery.app.js"></script>


</body>
</html>