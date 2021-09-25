<?php
session_start();
error_reporting(0);
include('includes/connection.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
    $title=$_POST['title'];
    $producttype=$_POST['producttype'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $vimage1=$_FILES["img1"]["name"];
    $vimage2=$_FILES["img2"]["name"];
    $vimage3=$_FILES["img3"]["name"];
    move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
    move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
    move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
$sql="update products set title=:title, ptype=:producttype, description=:description, price=:price, vimage1=:vimage1, vimage2=:vimage2, vimage3=:vimage3 where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':title',$title,PDO::PARAM_STR);
$query->bindParam(':producttype',$producttype,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

$msg="Products succesfully updated!!";

}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Products</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Form fields</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<?php	
$id=$_GET['id'];
$ret="select * from products where id=:id";
$query= $dbh -> prepare($ret);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>

<div class="panel-body">
				<form method="GET" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Product Title<span style="color:red">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="title" class="form-control" required>
						</div>

						<div class="hr-dashed"></div>
						<div class="hr-dashed"></div>
						<div class="hr-dashed"></div>

						<label class="col-sm-2 control-label">Select type<span style="color:red">*</span></label>
						<div class="col-sm-2">
						<select class="selectpicker" name="producttype" required>
						<option value=""> Select </option>
						<?php $ret="select id,typename from type";
						$query= $dbh -> prepare($ret);
						//$query->bindParam(':id',$id, PDO::PARAM_STR);
						$query-> execute();
						$results = $query -> fetchAll(PDO::FETCH_OBJ);
						if($query -> rowCount() > 0)
						{
						foreach($results as $result)
						{
						?>
						<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->typename);?></option>
						<?php }} ?>

						</select>
						</div>
					</div>

						<div class="hr-dashed"></div>
						
						<div class="form-group">
						<label class="col-sm-2 control-label">Description<span style="color:red">*</span></label>
							<div class="col-sm-10">
							<textarea class="form-control" name="description" rows="3" required></textarea>
							</div>
						</div>

						<div class="hr-dashed"></div>

						<div class="form-group">
						<label class="col-sm-2 control-label">Price in (RM)<span style="color:red">*</span></label>
							<div class="col-sm-4">
							<input type="text" name="price" class="form-control" required>
							</div>
						</div>

						<div class="hr-dashed"></div>

						<div class="form-group">
							<div class="col-sm-12">
							<h4><b>Upload Images</b></h4>
							</div>
						</div>


						<div class="form-group">
							<div class="col-sm-4">
							Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
							</div>
							<div class="col-sm-4">
							Image 2<span style="color:red">*</span><input type="file" name="img2" required>
							</div>
							<div class="col-sm-4">
							Image 3<span style="color:red">*</span><input type="file" name="img3" required>
							</div>
						</div>
											<div class="hr-dashed"></div>
											
											
										<?php }} ?>
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Submit</button>
													<a href="../admin/manage_products.php">Back</a>
													</form>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
<?php } ?>