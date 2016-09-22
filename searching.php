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


<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" href="js/venobox/venobox.css" type="text/css" media="screen" />

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
                         $("#state").html('<option value="">All states</option>');
                         $(response).appendTo("#state");
                      

                  }
          });
        else{
          $("#state").html('<option value="">All states</option>');
        }
  }
  </script>




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
                <div id="input-search">
                <?php 
                    if(isset($_SESSION['errors'])){                    
                       echo $_SESSION['errors'];
                       unset($_SESSION['errors']);
                    }
                    
                ?>
                </div>
               <form id="form" name="form"  class="margin-t-40" >
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
                                <input type="submit" class="btn btn-custom"  value="Search" id="btn" onclick="searching($('#name').val(),$('#country').val(),$('#state').val(),$('#type').val() );return false;"/><br>
                            </div>
                        </div>

                    </div> <!-- End row -->
                </form><!-- END FORM -->

            <div id="results">
                
            </div>


            </section>

          

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
    <script type="text/javascript" src="js/venobox/venobox.min.js"></script>


      <!-- Ajax to reload the state combobox -->
  <!-- Ajax to reload the state combobox -->
  <script>

  function searching(name, country, state,type){
          var parametros = {
                  "name" : name,
                  "country": country,
                  "state": state,
                  "type": type
          };
          if(name==""&&country==""&&state==""&&type==""){
                $("#input-search").html("<div id='alert' >At least choose a filter or try a name.</div>");
                $("#results").html("");
            }
            else{
              $.ajax({
                      dataType: "json",
                      data:  parametros,
                      url:   './php/ajax_searching.php',
                      type:  'get',
                      beforeSend: function () {
                        $("#input-search").html("");
                         
                         $("#results").html("");
                         $("#results").html("<div id='divFormRegister'><img src='http://www.sannichi-ybs.co.jp/sanybsgrp/wp-content/themes/ybsgrp/images/loading.gif'></div>");

                             
                      },
                      success:  function (response) {
                        $("#results").html("");
                              if($(response).size()>0)
                              {
                                  $.each(response, function(i,row){
                                    
                                    var newRow =
                                        '<hr> <div class="row"> <div class="col-md-3 col-sm-4"><div class=" design effects overlay-effect clearfix"> <div class="img"> <a class="venobox" data-type="youtube" title="'+row.name+' - Music list" href="'+row.musiclist+'"><img src="'+row.image+'"></a></div> </div> </div><div class="col-md-9 col-sm-8"> <div class="cv-item"> <h4>'+row.name+'</h4> <p> <strong>Country: </strong>'+row.country+'&nbsp;&nbsp;&nbsp;<strong>State: </strong>'+row.state+'<br> <strong>Type: </strong>'+row.type+'&nbsp;&nbsp;&nbsp; <strong>Price: </strong>'+row.price+'<br> <strong>Email: </strong>'+row.email+'&nbsp;&nbsp;&nbsp; <strong>Phone: </strong>'+row.phone+'<br> <strong>Description: </strong>'+row.description+' </p>  </div> </div> </div>';
                                    $(newRow).appendTo("#results");
                                    });
                                  $('.venobox').venobox();
                              }
                              else{
                                $("#results").html("<br><div id='alert' >Results not found.</div>");

                              }
                      }
              });
      }
  }
  </script>
 


</body>
</html>