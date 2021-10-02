<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$useremail=$_SESSION['user_id'];
        if (isset($_POST['delete-cart-submit'])){
            
        }
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
	$sql = "SELECT products.Vimage1 as Vimage1,products.price,products.title,products.id as pid,type.typename,cart.cart_id,cart.Status from cart join products on cart.item_id=products.id join type on type.id=products.ptype where cart.userEmail=:useremail";
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
											<input type="submit" class="btn-link mr-2"  name="submit" value="Save for later">
											<input type="submit" class="btn-link text-danger"  name="delete-cart-submit" value="Delete">
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
