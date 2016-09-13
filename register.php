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
    <title>iBand - Register</title>
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
     

    <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.css"  />

	  <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/green.css" media="screen"/>
    

  
      <!-- Javascript -->

       

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
                        <li class="active"><a href="./register.php"><i class="pe-7s-add-user"></i>Register</a></li>
                        <li ><a href="./login.php"><i class="pe-7s-network"></i>Login</a></li>
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
       name: { required:true,maxlength:255},
       type: { required:true },
       country: { required:true },
       state: { required:true },
       email: { required:true, email:true, maxlength:255},
       phone: {maxlength:255},
       price: {maxlength:255},
       image: {url:true, maxlength:255},
       musiclist: {maxlength:500},
       description: {maxlength:500},

        password: { required:true,  minlength:6, maxlength:255},
        password2:{equalTo: "#password",minlength:6, maxlength:255}
      },
      messages: {
         name: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>'),  maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
         type: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>') },
         country: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>') },
         state: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>') },
         email: { required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>'), email: jQuery.validator.format('<div id="error" class="msg-error">Wrong format</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
         phone: { maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
         price: { maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
         image: { url: jQuery.validator.format('<div id="error" class="msg-error">Wrong format</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
         musiclist: { maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 500 characters</div>') },
         description: { maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 500 characters</div>') },

          password: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>'), minlength: jQuery.validator.format('<div id="error" class="msg-error">At least 6 characters</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
          password2: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>'), equalTo: jQuery.validator.format('<div id="error" class="msg-error">The passwords do not match</div>'), minlength: jQuery.validator.format('<div id="error" class="msg-error">At least 6 characters</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
          
        }
      });
   
   
    });
  });
  </script>


  <!-- Ajax to reload the state combobox -->
  <script>
  function dynamicConsult(idComboBox){
          var parametros = {
                  "idComboBox" : idComboBox
          };
          if(idComboBox!="")
          $.ajax({
                  data:  parametros,
                  url:   './php/ajax_states.php',
                  type:  'post',
                  beforeSend: function () {
                         
                  },
                  success:  function (response) {
                         $("#state").html(response);
                  }
          });
        else{
          $("#state").html('<option value="">No selected</option>');
        }
  }
  </script>
 
         

      

</body>
</html>


