<?php session_start(); 
if(isset($_SESSION['user'])){    
   header('Location: ./myprofile.php');                  
} 
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	 <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>iBand - Login</title>
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
						<li ><a href="./index.php"><i class="pe-7s-home"></i>Home</a></li>
                        <li ><a href="./searching.php"><i class="pe-7s-search"></i>Searching</a></li>
                        <li ><a href="./register.php"><i class="pe-7s-add-user"></i>Register</a></li>
                        <li class="active"><a href="./php/login.php"><i class="pe-7s-network"></i>Login</a></li>
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
                <p class="sub-title">Access to your account</p>

                <h3 class="title">Login</h3>
                <hr/>
                <?php 
                    if(isset($_SESSION['errors'])){                    
                       echo '<div>'.$_SESSION['errors'].'</div>';
                    }
                    if(!isset($_SESSION['user'])){    
                       session_unset();
                       session_destroy();                 
                    }
                ?>
               <form id="formm" name="form" method="POST" class="margin-t-40" action="./php/login.php">
                    <div class="row">
                        <div class="col-md-12">
                        <div id="divFormRegister">
                            <!-- Name -->
                            
                            <!-- Email -->
                             <label>*E-mail: </label> <br><input class="camposRegister" type="text" name="email" id="email" placeholder="Email" /><br>
                             <label>*Password: </label> <br><input class="camposRegister" type="password" name="password" id="password" placeholder="Password" /><br>
                
                            <!-- Submit_Button -->
                         
                            <input type="submit" class="btn btn-custom"  value="Login" id="btn"/><br>                           
                            </div>
                        </div>

                    </div> <!-- End row -->
                </form><!-- END FORM -->


               

            <!-- ====================
                 FOOTER
                 ====================-->
                 <br>
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
    <script type="text/javascript" src="js/jquery-2.2.0.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/jquery.app.js"></script>
    <script src="js/jquery.validate.min.js"></script>   

     <!-- Validator for the form -->
    <script>
    $(document).ready(function(){
     
      $("#btn").on("click", function(){
     
        $("#form").validate({
        rules:
        {
         email: { required:true, email:true, maxlength:255},
         password: { required:true,  minlength:6, maxlength:255}
          
        },
        messages: {
           email: { required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>'), email: jQuery.validator.format('<div id="error" class="msg-error">Wrong format</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
        password: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>'), minlength: jQuery.validator.format('<div id="error" class="msg-error">At least 6 characters</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
            
          }
        });
     
     
      });
    });
    </script>


</body>
</html>