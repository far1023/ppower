<!DOCTYPE html>
<html lang="en">

<head>
	<title>Portal Siak Bedelau</title>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Siak Bedelau">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="icon" href="<?= FCPATH ?>favicon.png" type="image/png">
	
	<!-- CSS For All File -->
    <link href="<?= FCPATH ?>assets/demo/lingua/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--<link rel="stylesheet" type="text/css" href="<?= FCPATH ?>assets/demo/lingua/styles/bootstrap4/bootstrap.min.css">-->
    <!--upgrade to bootstrap 4.5-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= FCPATH ?>assets/demo/lingua/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= FCPATH ?>assets/demo/lingua/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?= FCPATH ?>assets/demo/lingua/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= FCPATH ?>assets/css/scrollbar.css">
    <style>
        .dropdown-submenu {
          position: relative;
        }
        
        .dropdown-submenu a::after {
          transform: rotate(-90deg);
          position: absolute;
          right: 6px;
          top: .8em;
        }
        
        .dropdown-submenu .dropdown-menu {
          top: 0;
          left: 100%;
          margin-left: .1rem;
          margin-right: .1rem;
        }
        
        .dropdown-item.active, .dropdown-item:active {
            color: #fff;
            background-color: #fff;
        }
        
        .container .dropdown .dropdown-menu a:hover
        {
          color: #000;
          background-color: #fff;
          border-color: #000;
        }
        
        .dropdown:hover>.dropdown-menu {
          display: block;
        }
        
        .dropdown-submenu:hover>.dropdown-menu {
          display: block;
        }
    </style>
	
	<!-- Css For Spesific File -->
	<?php include(APPPATH."views/public/cssphp/css-index.php"); ?>
    
<!-- Disable </head> to avoid ads from Telkom -->    
<!--</head>-->
</head>

<body>
    
	<div class="super_container">
	    <!-- Header -->
	    <?php include(APPPATH."views/public/components/header.php"); ?>

		<!-- Main Content -->
		<div class="video">
        	<div class="">
        		<div class="row">
        			<div class="col-lg-8 offset-lg-2">
        				<div class="video_content pt-5 mt-5" style="background-color: #F8F8F8">
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        
        <div class="instructors">
        	<div class="instructors_background" style="background-image:url(<?= FCPATH ?>assets/demo/lingua/images/instructors_background.png)"></div>
        	<div class="container">
        		<div class="row pt-5">
        			<div class="col">
        			    <h1><?php echo $heading; ?></h1>
        				<p><?php echo $message; ?></p>
        			</div>
        		</div>
        		<div class="row instructors_row">
                    <div class="instructor text-center">
        					<div class="instructor_text">
        						<p></p>
        					</div>
        				</div>
        		</div>
        	</div>
        </div>

        <!-- Footer -->
	    <?php include(APPPATH."views/public/components/footer.php"); ?>
	</div>
	
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="<?= FCPATH ?>assets/demo/lingua/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="<?= FCPATH ?>assets/demo/lingua/plugins/easing/easing.js"></script>
    <script>
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
          if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
          }
          var $subMenu = $(this).next(".dropdown-menu");
          $subMenu.toggleClass('show');
        
        
          $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
          });
        
        
          return false;
        });
    </script>

	<!-- JS For Spesific File -->
	<?php include(APPPATH."views/public/jsphp/js-index.php"); ?>
    
<!-- Disable </body> and </html> to avoid ads from Telkom -->
<!--</body> </html>-->
</body>
</html>
