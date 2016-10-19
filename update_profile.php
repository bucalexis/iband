<?php session_start(); 

 if(!isset($_SESSION['user'])){    
   header('Location: ./login.php');                  
 }
 else{
     require_once ('./php/util.php'); 
     $user=consult("SELECT * FROM musicartist WHERE id=".$_SESSION['user']);
     $name=$user[0]['name'];
     
     $type=$user[0]['id_type'];
     $country=$user[0]['id_country'];;
     $state=$user[0]['id_state'];

     $image=$user[0]['image'];
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
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>

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
            <li ><a href="./myprofile.php"><i class="pe-7s-user"></i>My profile</a></li>
            <li class="active"><a href="./update_profile.php"><i class="pe-7s-note"></i>Update profile</a></li>
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
                <p class="sub-title">Modify your information!</p>
                <h3 class="title">UPDATE</h3>
                <hr/>
                <?php 
                    if(isset($_SESSION['errors'])){                    
                       echo '<div>'.$_SESSION['errors'].'</div>';
                       unset($_SESSION['errors']);
                    }
                    if(!isset($_SESSION['user'])){    
                       session_unset();
                       session_destroy();                 
                    } 
                    
                ?>
               <form id="form" name="form" method="POST" class="margin-t-40" action="./php/updateUser.php">
                    <div class="row">
                        <div class="col-md-12">
                        <div id="divFormRegister">
                            <!-- Name -->
                            
                            <!-- Email -->
                             <label>*Name: </label> <br><input class="camposRegister" type="text" name="name" id="name" placeholder="Name"  value=<?php echo '"'.$name.'"'; ?>/><br>
                             <label>*Type:</label><br> 
                             <select name="type" class="camposRegister" id="type" >
                                <option value="">No selected</option>

                              <?php
                                  
                                  $data= consult ('SELECT * FROM type');
                                  
                                  foreach($data as $row){
                                    if ($row[0]==$type)
                                        echo '<option value="'.$row[0].'" selected>'.$row[1].'</option>';
                                    else
                                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';


                                  }
                              ?>
                                                   
                              </select><br>

                             <label>*Country: </label><br><select name="country" id="country" class="camposRegister" onchange="dynamicConsult($('#country').val());return false;">
                                  <option value="">No selected</option>
                                  <?php
                                
                                   $data= consult ('SELECT * FROM country');
                                  
                                  foreach($data as $row){
                                    if ($row[0]==$country)
                                        echo '<option value="'.$row[0].'" selected>'.$row[1].'</option>';
                                    else
                                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                     }
                                    ?>
                            </select><br>

                            <label>*State: </label><br><select name="state" id="state" class="camposRegister">
                              <option value="">No selected</option>
                              <?php
                                
                                   $data= consult ('SELECT * FROM state WHERE id_country='.$country);
                                  
                                  foreach($data as $row){
                                    if ($row[0]==$state)
                                        echo '<option value="'.$row[0].'" selected>'.$row[1].'</option>';
                                    else
                                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                     }
                                    ?>
                               
                            </select><br>

                            <label>Current password:</label><br> <input class="camposRegister" type="password" name="currentPassword" id="currentPassword" placeholder="Current password"  /><br>

                           <label>New password:</label><br> <input class="camposRegister" type="password" name="newPassword" id="newPassword" placeholder="New password"  /><br>
                           <label>Confirm new password:</label> <br><input class="camposRegister" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm new password" /><br>
                           <label>Phone:</label> <br><input class="camposRegister" type="text" name="phone" id="phone" placeholder="Phone" value=<?php echo '"'.$phone.'"'; ?>/><br>
                           <label>Price: </label><br><input class="camposRegister" type="text" name="price" id="price" placeholder="Price" value=<?php echo '"'.$price.'"'; ?>/><br>
                           <label>Image URL: </label><br><input class="camposRegister" type="text" name="image" id="image" placeholder="URL of your profile image" value=<?php echo '"'.$image.'"'; ?>/><br>
                           
                            <label>Music list: </label><br><textarea class="camposTextArea" name="musiclist" id="musiclist" placeholder="Paste here your YouTube's shared list" ><?php echo $musiclist; ?></textarea><br>

                            <label>Description: </label><br><textarea class="camposTextArea" name="description" id="description" placeholder="You can add here some additional information" ><?php echo $description; ?></textarea><br>

                           
                            <!-- Submit_Button -->
                         
                            <input type="submit" class="btn btn-custom"  value="Update" id="btn"/><br>
                           
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
    var validator = $("#form").validate({
                  rules:
                  {
                   name: { required:true,maxlength:255},
                   type: { required:true },
                   country: { required:true },
                   state: { required:true },
                   phone: {maxlength:255},
                   price: {maxlength:255},
                   image: {url:true, maxlength:255},
                   musiclist: {maxlength:500},
                   description: {maxlength:500},
                   currentPassword: {minlength:6, maxlength:255},
                   newPassword: {minlength:6, maxlength:255},
                   confirmPassword:{equalTo:"#newPassword",minlength:6, maxlength:255}
                  },
                  messages: {
                     name: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>'),  maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
                     type: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>') },
                     country: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>') },
                     state: {required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>') },
                     phone: { maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
                     price: { maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
                     image: { url: jQuery.validator.format('<div id="error" class="msg-error">Wrong format</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
                     musiclist: { maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 500 characters</div>') },
                     description: { maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 500 characters</div>') },

                      currentPassword: { minlength: jQuery.validator.format('<div id="error" class="msg-error">At least 6 characters</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
                      newPassword: { minlength: jQuery.validator.format('<div id="error" class="msg-error">At least 6 characters</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') },
                      confirmPassword: {equalTo: jQuery.validator.format('<div id="error" class="msg-error">The passwords do not match</div>'), minlength: jQuery.validator.format('<div id="error" class="msg-error">At least 6 characters</div>'), maxlength: jQuery.validator.format('<div id="error" class="msg-error">Type less than 255 characters</div>') }
                      
                    }
                  });

    $("#newPassword").on("change", function(){
        if($('#newPassword').val()!=""){
                
                $( "#currentPassword" ).rules( "add", {
                  required: true,
                  messages: {
                    required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>') 
                  }
                });
                validator.form();
        }
        else{
            $( "#currentPassword" ).rules( "remove", "required" );
            validator.form();
        }

     });

    $("#currentPassword").on("change", function(){
        if($('#currentPassword').val()!=""){
                
                $( "#newPassword" ).rules( "add", {
                  required: true,
                  messages: {
                    required: jQuery.validator.format('<div id="error" class="msg-error">Required field</div>') 
                  }
                });
                validator.form();
        }
        else{
            $( "#newPassword" ).rules( "remove", "required" );
            validator.form();
        }

     });

    
   
    $("#btn").on("click", function(){
      validator.form();
   
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
                         $("#state").html('<option value="">Not selected</option>');
                         $(response).appendTo("#state");
                  }
          });
        else{
          $("#state").html('<option value="">No selected</option>');
        }
  }
  </script>


</body>
</html>