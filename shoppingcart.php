<?php 
session_start();

	include("products/includes/config.php");
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

<!-- ========================= CART ========================= -->
<<<<<<< Updated upstream
<?php include('cart.php') ?>
=======
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$useremail=$_SESSION['user_id'];
		//delete
        if (isset($_POST['delete-cart-submit'])){
			$cart_to_delete = mysqli_real_escape_string($con, $_POST['item_id']);
			$sql = "DELETE FROM cart WHERE item_id = $cart_to_delete";

			if(mysqli_query($con, $sql))
			{
				
			}else{
				echo "Failed to delete cart item";
			}

        }
    }
    // save for later
    if (isset($_POST['wishlist-submit'])){
        $Cart->saveForLater($_POST['item_id']);
    }
?>
<section class="section-content padding-y bg">
<div class="container">

<br>
<br>

<!-- ============================ COMPONENT 2  ================================= -->
<div class="card">
<div class="row no-gutters">
	<aside class="col-md-9">
	<?php
	$useremail=$_SESSION['user_id'];
	$sql = "SELECT products.Vimage1 as Vimage1,products.price,products.title,products.id as pid,type.typename,cart.cart_id,cart.Status from cart join products on cart.item_id=products.id join type on type.id=products.ptype where cart.User_id=:useremail";
	$query = $dbh -> prepare($sql);
	$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{  ?>
			<article class="card-body border-bottom">
					<div class="row">
						<div class="col-md-7">
							<figure class="itemside">
								<div class="aside"><img src="superadmin/img/<?php echo htmlentities($result->Vimage1);?>" class="border img-sm"></div>
								<figcaption class="info">
									<a href="product_details.php?vhid=<?php echo htmlentities($result->pid);?>" name="name" class="title"><?php echo htmlentities($result->title);?></a>
									<strong name="price" class="">RM<?php echo htmlentities($result->price);?></strong>
										<?php if($_SESSION['user_id'])
    									{?>
										<form method="post">
										<div class="form-group">
										<a href="#" class="btn-link mr-2">Save for later</a> 
										<form method="post">
										<input type="hidden" name="item_id" value="<?php echo htmlentities($result->pid) ?>">
										<button type="submit" name="delete-cart-submit" class="btn btn-light"> Delete</button>
										</form>
										</div>
										<?php } ?>
										</form>
								</figcaption>
							</figure> 
						</div> <!-- col.// -->
						<div class="col-md-5 text-md-right text-right"> 
							<div class="input-group input-spinner">
							  <div class="input-group-prepend">
							    <button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-plus"></i> </button>
							  </div>
							  <input type="text" name="quantity" class="form-control"  value="1">
							  <div class="input-group-append">
							    <button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-minus"></i> </button>
							  </div>
							</div> <!-- input-group.// -->
						</div>
					</div> <!-- row.// -->
			</article> <!-- card-group.// -->
			<?php }} ?>
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


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

>>>>>>> Stashed changes


<!-- ========================= FOOTER ========================= -->
<?php include('includes/footer.php') ?>



</body>
</html>
