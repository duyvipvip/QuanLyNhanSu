<?php

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Baxster an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<?php echo $this->_arrMetaName; ?>
<?php echo $this->_arrMetaHTTP; ?>
<?php echo $this->_arrFileCss; ?>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class="sidebar" role="navigation">
            <div class="navbar-collapse">
				<!-- phần menu -->
				<?php require_once('template/menu.php'); ?>
				<!-- phần menu -->
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- phần header start -->
		<?php require_once('template/header.php') ?>
		<!-- // phần header end -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<?php require_once ($this->_contentPage ); ?>
			</div>
		</div>
		<!--footer-->
		 <div class="dev-page">
	 
			<!-- page footer -->   
            <?php require_once('template/footer.php') ?>
            <!-- /page footer -->
		</div>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<!-- <script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script> -->
		<?php echo $this->_arrFileJs; ?>
		<script>
			new WOW().init();
		</script>
</body>
</html>