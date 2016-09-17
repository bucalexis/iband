<?php session_start(); 
    require_once  ('./php/util.php'); 

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
    <title>iBand - Searching</title>
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


</head>

<body data-spy="scroll" data-offset="120">




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
                        <li class="active"><a href="./searching.php"><i class="pe-7s-search"></i>Searching</a></li>
                        <li ><a href="./register.php"><i class="pe-7s-add-user"></i>Register</a></li>
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
                <p class="sub-title">Look for a music artist</p>
                <h3 class="title">Searching</h3>
                <hr/>
                <?php 
                    if(isset($_SESSION['errors'])){                    
                       echo '<div>'.$_SESSION['errors'].'</div>';
                       unset($_SESSION['errors']);
                    }
                    
                ?>
               <form id="form" name="form" method="GET" class="margin-t-40" action="./php/searching.php">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Name -->
                            
                            <!-- Email -->
                            
                             </label><br><select name="country" id="country" class="campos" onchange="dynamicConsult($('#country').val());return false;">
                                  <option value="">All countries</option>
                                  <?php
                                
                                   $data= consult ('SELECT * FROM country');
                                  
                                  foreach($data as $row){
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                  }
                              ?>
                            </select>


                             <select name="state" id="state" class="campos">  
                               <option value="">All states</option>               
                            </select>

                             <select name="type" id="type" class="campos">
                              <option value="">All types</option>

                              <?php
                                  
                                  $data= consult ('SELECT * FROM type');
                                  
                                  foreach($data as $row){
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';

                                  }
                              ?>                    
                            </select>

                            <input  type="text" name="name" id="name" placeholder="Name" class="campos"/>
                            <!-- Submit_Button -->
                            <div class="text-right">
                                <input type="submit" class="btn btn-custom"  value="Search" id="btn"/><br>
                            </div>
                        </div>

                    </div> <!-- End row -->
                </form><!-- END FORM -->


             <?php if(isset($_SESSION['search'])){ $i=0;?>

                <?php foreach ($_SESSION['search'] as $row) {
                     $id=$row['id'];
                     $name=$row['name'];
                     $type=consult("SELECT name FROM type WHERE id=".$row['id_type']);
                     $type=$type[0]['name'];
                     $country=consult("SELECT name FROM country WHERE id=".$row['id_country']);
                     $country=$country[0]['name'];
                     $state=consult("SELECT name FROM state WHERE id=".$row['id_state']);
                     $state=$state[0]['name'];
                     $image=$row['image'];
                     if($image=="")
                        $image="./img/default.jpg";
                    
                     $email=$row['email'];
                     $phone=$row['phone'];
                     $price=$row['price'];
                     $musiclist=$row['musiclist'];
                     $description=$row['description'];
                ?>



              <!-- Experience-Item -->
                <hr>    
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class=" design effects overlay-effect clearfix">
                                    <div class="img">
                                        <img src=<?php echo '"'.$image.'"'; ?> alt="Sorry, the image is not available">
                                        <div class="overlay">
                                            <button class="md-trigger expand" data-modal="modal-<?php echo $i.'"'; ?> ><i class="fa fa-search"></i><br/>view More</button>
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



                            <?php $i++;} ?>  

             <?php } ?>  

              
            </section>


            <!-- End Experience -->

            <!--====================
                HOME
                ====================-->
  
                 

			<!--====================
                MODAL ITEM
                ====================-->
                <?php if(isset($_SESSION['search'])){ $i=0;?>

                <?php foreach ($_SESSION['search'] as $row) {
                     $id=$row['id'];
                     $name=$row['name'];
                     $type=consult("SELECT name FROM type WHERE id=".$row['id_type']);
                     $type=$type[0]['name'];
                     $country=consult("SELECT name FROM country WHERE id=".$row['id_country']);
                     $country=$country[0]['name'];
                     $state=consult("SELECT name FROM state WHERE id=".$row['id_state']);
                     $state=$state[0]['name'];
                     $image=$row['image'];
                     if($image=="")
                        $image="./img/default.jpg";
                    
                     $email=$row['email'];
                     $phone=$row['phone'];
                     $price=$row['price'];
                     $musiclist=$row['musiclist'];
                     $description=$row['description'];
                ?>
                                    <div class="md-modal md-effect" id="modal-<?php echo $i.'"'; ?>>
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

                        <?php $i++;} ?>  

             <?php  
                       session_unset();
                       session_destroy();                 

             } ?>  

			

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

      <!-- Ajax to reload the state combobox -->
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