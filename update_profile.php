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
    <title>iBand - Update</title>
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
            <li ><a href="./myprofile.html"><i class="pe-7s-user"></i>My profile</a></li>
            <li class="active"><a href="./update_profile.html"><i class="pe-7s-note"></i>Update profile</a></li>
            <li ><a href="./login.html"><i class="pe-7s-network"></i>Logout</a></li>
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
                <p class="sub-title">Be a member of us!</p>
                <h3 class="title">Register</h3>
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
               <form id="formm" name="form" method="POST" class="margin-t-40" action="./php/createUser.php">
                    <div class="row">
                        <div class="col-md-12">
                        <div id="divFormRegister">
                            <!-- Name -->
                            
                            <!-- Email -->
                             <label>*Name: </label> <br><input class="camposRegister" type="text" name="name" id="name" placeholder="Name"  /><br>
                             <label>*Type:</label><br> 
                             <select name="type" class="camposRegister" id="type" >
                                <option value="">No selected</option>

                              <?php
                                  include ('./php/util.php'); 
                                  $data= consult ('SELECT * FROM type');
                                  
                                  foreach($data as $row){
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';

                                  }
                              ?>
                                                   
                              </select><br>

                             <label>*Country: </label><br><select name="country" id="country" class="camposRegister" onchange="dynamicConsult($('#country').val());return false;">
                                  <option value="">No selected</option>
                                  <?php
                                
                                   $data= consult ('SELECT * FROM country');
                                  
                                  foreach($data as $row){
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                  }
                              ?>
                            </select><br>

                            <label>*State: </label><br><select name="state" id="state" class="camposRegister">
                              <option value="">No selected</option>
                               
                            </select><br>

                           <label>*E-mail:</label><br> <input class="camposRegister" type="email" name="email" id="email" placeholder="E-mail" /><br>
                           <label>*Password:</label><br> <input class="camposRegister" type="password" name="password" id="password" placeholder="Password" id="password" /><br>
                           <label>*Confirm password:</label> <br><input class="camposRegister" type="password" name="password2" id="password2" placeholder="Confirm password" /><br>
                           <label>Phone:</label> <br><input class="camposRegister" type="text" name="phone" id="phone" placeholder="Phone" /><br>
                           <label>Price: </label><br><input class="camposRegister" type="text" name="price" id="price" placeholder="Price" /><br>
                           <label>Image URL: </label><br><input class="camposRegister" type="text" name="image" id="image" placeholder="URL of your profile image" /><br>
                           
                            <label>Music list: </label><br><textarea class="camposTextArea" name="musiclist" id="musiclist" placeholder="Paste here your YouTube's shared list"></textarea><br>

                            <label>Description: </label><br><textarea class="camposTextArea" name="description" id="description" placeholder="You can add here some additional information"></textarea><br>
                             

                           
                            <!-- Submit_Button -->
                         
                            <input type="submit" class="btn btn-custom"  value="Register" id="btn"/><br>
                           
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
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/jquery.app.js"></script>


</body>
</html>