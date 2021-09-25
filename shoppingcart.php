<?php 
session_start();

    include("connection.php");
    include("functions.php");

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

<title>Zirconium - Shopping Cart</title>

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Fonticons -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<link href="fonts/feathericons/css/iconfont.css" rel="stylesheet" type="text/css" />
<link href="fonts/material-icons/css/materialdesignicons.css" rel="stylesheet" type="text/css" />

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" />

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>


</head>
<body>

<!-- ========================= HEADER  ========================= -->
<?php include('includes/header.php') ?>




<section class="section-content padding-y bg">
<div class="container">

<br>
<br>


<!-- ============================ COMPONENT 2  ================================= -->
<div class="card">
<div class="row no-gutters">
	<aside class="col-md-9">
			<article class="card-body border-bottom">
					<div class="row">
						<div class="col-md-7">
							<figure class="itemside">
								<div class="aside"><img src="../images/items/1.jpg" class="border img-sm"></div>
								<figcaption class="info">
									<a href="#" class="title">Some name of item goes here nice </a>
									<strong class="">$128.00</strong>
									<div>
										<a href="#" class="btn-link mr-2">Save for later</a> 
										<a href="#" class="btn-link text-danger"> Delete</a>
									</div>
								</figcaption>
							</figure> 
						</div> <!-- col.// -->
						<div class="col-md-5 text-md-right text-right"> 
							<div class="input-group input-spinner">
							  <div class="input-group-prepend">
							    <button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-plus"></i> </button>
							  </div>
							  <input type="text" class="form-control"  value="1">
							  <div class="input-group-append">
							    <button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-minus"></i> </button>
							  </div>
							</div> <!-- input-group.// -->
						</div>
					</div> <!-- row.// -->
			</article> <!-- card-group.// -->
			<article class="card-body border-bottom">
					<div class="row">
						<div class="col-md-7">
							<figure class="itemside">
								<div class="aside"><img src="../images/items/2.jpg" class="border img-sm"></div>
								<figcaption class="info">
									<a href="#" class="title">Product name goes here nice </a>
									<strong class="">$128.00</strong>
									<div>
										<a href="#" class="btn-link mr-2">Save for later</a> 
										<a href="#" class="btn-link text-danger"> Delete</a>
									</div>
								</figcaption>
							</figure> 
						</div> <!-- col.// -->
						<div class="col-md-5 text-md-right text-right"> 
							<div class="input-group input-spinner">
							  <div class="input-group-prepend">
							    <button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-plus"></i> </button>
							  </div>
							  <input type="text" class="form-control"  value="1">
							  <div class="input-group-append">
							    <button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-minus"></i> </button>
							  </div>
							</div> <!-- input-group.// -->
						</div>
					</div> <!-- row.// -->
			</article> <!-- card-group.// -->
			<article class="card-body border-bottom">
					<div class="row">
						<div class="col-md-7">
							<figure class="itemside">
								<div class="aside"><img src="../images/items/3.jpg" class="border img-sm"></div>
								<figcaption class="info">
									<a href="#" class="title">Another name of some product goes just </a>
									<strong class="">$98.50</strong>
									<div>
										<a href="#" class="btn-link mr-2">Save for later</a> 
										<a href="#" class="btn-link text-danger"> Delete</a>
									</div>
								</figcaption>
							</figure> 
						</div> <!-- col.// -->
						<div class="col-md-5 text-md-right text-right"> 
							<div class="input-group input-spinner">
							  <div class="input-group-prepend">
							    <button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-plus"></i> </button>
							  </div>
							  <input type="text" class="form-control"  value="1">
							  <div class="input-group-append">
							    <button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-minus"></i> </button>
							  </div>
							</div> <!-- input-group.// -->
						</div>
					</div> <!-- row.// -->
			</article> <!-- card-group.// -->
	</aside> <!-- col.// -->
	<aside class="col-md-3 border-left">
		<div class="card-body">
			<dl class="dlist-align">
			  <dt>Total price:</dt>
			  <dd class="text-right">$69.00</dd>
			</dl>
			<dl class="dlist-align">
			  <dt>Discount:</dt>
			  <dd class="text-right text-danger">- $13.00</dd>
			</dl>
			<dl class="dlist-align">
			  <dt>Total:</dt>
			  <dd class="text-right text-dark b"><strong>$80.45</strong></dd>
			</dl>
			<hr>
			<a href="purchase.php" class="btn btn-primary btn-block"> Make Purchase </a>
			<a href="index.php" class="btn btn-light btn-block">Continue Shopping</a>
		</div> <!-- card-body.// -->
	</aside> <!-- col.// -->
</div> <!-- row.// -->
</div> <!-- card.// -->
<!-- ============================ COMPONENT 2 END .// ================================= -->


	</aside> <!-- col.// -->
</div> <!-- row.// -->
 
<br>
<br>
<br>
<br>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<br>
<br>
<br> 
<br>


<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php') ?>



</body>
</html>