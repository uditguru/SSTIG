<?php
session_start();
if(!isset ($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] !== TRUE){
    $_SESSION['message'] = 'Please login first.';
    header('location:index.php');
}else{
    include_once 'connect.php';
}
?>
<!DOCTYPE  html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- include header files -->
<?php include_once 'includes/extra-header.php'; ?>

</head>
<body> 
<!-- Start: page-top-outer -->
<div id="page-top-outer">    

<!-- Start: page-top -->
<div id="page-top">
<?php include_once 'includes/header.php'; ?>
</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->
	
<div class="clear">&nbsp;</div>
 
<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"> 
<!--  start nav-outer -->
<div class="nav-outer"> 
    <!-- start nav-right -->
    <?php include_once 'includes/menu.php'; ?>
    <!--  start nav -->
</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................................................... END -->

  <div class="clear"></div>
 
<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">

	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Well-Come</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">
			<h2>Sub Heading </h2>
			<h3>Local Heading</h3>
			
			Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
			adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
			adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. 
			<br />
			<br />
			Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
			adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
			adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. 
			<br />
			<br />
			Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
			adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Lorem ipsum dolor sit amet consectetur 
			adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  dolore magna aliqua. 
			
			
			</div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- start footer -->         
<div id="footer">
<!-- <div id="footer-pad">&nbsp;</div> -->
<!--  start footer-left -->
<?php include 'includes/footer.php'; ?>        
</div>
<!-- end footer -->
 
</body>
</html>