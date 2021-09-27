<?php
session_start();
include('../includes/connection.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$sql="INSERT INTO  tblbooking(userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}

}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

<title>Zirconium - Salmon King</title>

<!-- jQuery -->
<script src="../js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="../js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Fonticons -->
<link href="../fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<link href="../fonts/feathericons/css/iconfont.css" rel="stylesheet" type="text/css" />
<link href="../fonts/material-icons/css/materialdesignicons.css" rel="stylesheet" type="text/css" />

<!-- custom style -->
<link href="../css/ui.css" rel="stylesheet" type="text/css"/>
<link href="../css/responsive.css" rel="stylesheet" />

<!-- custom javascript -->
<script src="../js/script.js" type="text/javascript"></script>


<?php
    include_once('includes/header.php')
?>
<!-- section-header.// -->

<?php
$vhid=intval($_GET['vhid']);
$sql = "SELECT products.*,type.typename,type.id as bid  from products join type on type.id=products.ptype where products.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
$_SESSION['brndid']=$result->bid;
?>

<section class="section-content padding-y bg">
<div class="container">

<!-- ============================ COMPONENT 1 ================================= -->
<div class="card">
	<div class="row no-gutters">
		<aside class="col-md-6">
<article class="gallery-wrap"> 
	<div class="img-big-wrap">
	   <a href="../images/items/frozen/salmon.jpg"><img src="../images/items/<?php echo htmlentities($result->Vimage1);?>"></a>
	</div> <!-- img-big-wrap.// -->
	<div class="thumbs-wrap">
	  <a href="../images/items/frozen/salmon1.jpg" class="item-thumb"> <img src="../images/items/<?php echo htmlentities($result->Vimage2);?>"></a>
	  <a href="../images/items/frozen/salmon2.jpg" class="item-thumb"> <img src="../images/items/<?php echo htmlentities($result->Vimage3);?>"></a>
	</div> <!-- thumbs-wrap.// -->
</article> <!-- gallery-wrap .end// -->
		</aside>
		<main class="col-md-6 border-left">
<article class="content-body">

<h2 class="title"><?php echo htmlentities($result->title);?></h2>

<div class="rating-wrap my-3">
	<ul class="rating-stars">
		<li style="width:100%" class="stars-active">
			<img src="../images/icons/stars-active.svg" alt="">
		</li>
		<li>
			<img src="../images/icons/starts-disable.svg" alt="">
		</li>
	</ul>
	<small class="label-rating text-muted">669 reviews</small>
	<small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 69,666 orders </small>
</div> <!-- rating-wrap.// -->

<div class="mb-3"> 
	<var class="price h4">RM<?php echo htmlentities($result->price);?></var> 
	<span class="text-muted">/per kg</span> 
</div> 

<p> <?php echo htmlentities($result->description);?> </p>

<dl class="row">
  <dt class="col-sm-3">Type</dt>
  <dd class="col-sm-9"><?php echo htmlentities($result->typename);?></dd>

  <dt class="col-sm-3">Brand</dt>
  <dd class="col-sm-9">Regal Salmon</dd>
    <!-- ?php echo htmlentities($result->brand);?>// -->
  <dt class="col-sm-3">Delivery</dt>
  <dd class="col-sm-9">Worldwide </dd>
</dl>

<hr>
	<div class="row">
		<div class="form-group col-md flex-grow-0">
			<label>Quantity</label>
			<div class="input-group mb-3 input-spinner">
			  <div class="input-group-prepend">
			    <button class="btn btn-light" type="button" id="button-plus"> + </button>
			  </div>
			  <input type="text" class="form-control" value="1">
			  <div class="input-group-append">
			    <button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
			  </div>
			</div>
		</div> <!-- col.// -->
		<div class="form-group col-md">
				<label>Select size</label>
				<div class="mt-2">
					<label class="custom-control custom-radio custom-control-inline">
					  <input type="radio" name="select_size" checked="" class="custom-control-input">
					  <div class="custom-control-label">Small</div>
					</label>

					<label class="custom-control custom-radio custom-control-inline">
					  <input type="radio" name="select_size" class="custom-control-input">
					  <div class="custom-control-label">Medium</div>
					</label>

					<label class="custom-control custom-radio custom-control-inline">
					  <input type="radio" name="select_size" class="custom-control-input">
					  <div class="custom-control-label">Large</div>
					</label>

				</div>
		</div> <!-- col.// -->
	</div> <!-- row.// -->
    <?php if($_SESSION['login'])
    {?>
	<a href="#" class="btn  btn-primary"> Buy now </a>
	<a href="#" class="btn  btn-outline-primary"> <span class="text" name="submit">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>
    <?php } else { ?>
        <a href="../login.php" class="btn  btn-primary">Login to buy</a>
    <?php } ?>
</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->
<!-- ============================ COMPONENT 1 END .// ================================= -->

<!-- ========================= SIMILAR PRODUCTS ========================= -->
<div class="container">
      <h3>Similar Products</h3>
      <div class="row">
<?php
$bid=$_SESSION['brndid'];
$sql="SELECT products.title,type.typename,products.price,products.id,products.description,products.Vimage1 from products join type on type.id=products.ptype where products.ptype=:bid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
        <div class="col-md-3 grid_listing">
          <div class="product-listing-m gray-bg">
            <div class="product-listing-img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" /> </a>
            </div>
            <div class="product-listing-content">
              <h5><a href="product_details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->typename);?> , <?php echo htmlentities($result->title);?></a></h5>
              <p class="list-price">RM<?php echo htmlentities($result->price);?></p>
            </div>
          </div>
        </div>
 <?php }} ?>

      </div>
    </div>


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->


<!-- ========================= FOOTER ========================= -->
<?php include_once('../includes/footer.php') ?>
<!-- ========================= FOOTER END // ========================= -->


</body>
</html>