<?php 
session_start();

    include('includes/connection.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $ptype = $_POST['product_type'];
        $title = $_POST['title'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$brand = $_POST['brand'];
		$description = $_POST['description'];
		$ribbon = $_POST['ribbon'];
        $img1 = $_POST['img1'];
        $img2 = $_POST['img2'];
        $img3 = $_POST['img3'];
        $delivery = $_POST['delivery'];



        if(!empty($title) && !empty($price) && !is_numeric($title) )
        {
            //save to database
            $pid = random_num(20);
            $query = "insert into products (pid,product_type,title,price,quantity,brand,description,ribbon,img1,img2,img3,delivery) values ('$pid','$ptype','$title','$price','$quantity','$brand','$description','$ribbon','$img1','$img2','$img3','$delivery',)";

            mysqli_query($dbh, $query);

            header("Location: dashboard.php");
            die;
        }else
		{
            echo "Please enter valid details!";
        }

    }

?>

<!DOCTYPE HTML>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Zirconium Registered Users</title>

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
<!-- Add Coding Here -->
<!-- ========================= Header ========================= -->
<?php include('includes/header.php');?>

<!-- ========================= SECTION CONTENT ========================= -->
<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
    <div class="content-wrapper">
		<div class="container-fluid">
<!-- ============================ COMPONENT REGISTER   ================================= -->
	<div class="row">
      <article class="col-md-12">
		<header class="mb-4"><h1 class="card-title">Add Products</h1></header>
		<form method="post">
				<div class="form-row">
					<label>Product Type</label>
					<select id="inputState" class="form-control" name="brand" >
						<option> Choose...</option>
                        <option>Groceries</option>
					    <option>Frozen</option>
                        <option>Fresh products</option>
                        <option>Confectioneries</option>
                        <option>Health & Beauty</option>
					    <option>Electronics</option>
					    <option>Sports & Lifestyle</option>
					    <option>Babies & Toys</option>
                        <option>Books</option>
						<option>Appliances</option>
						<option>Automotive & Motorcycles</option>
					</select>
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<div class="col form-group">
						<label>Title</label>
					  	<input type="text" class="form-control" placeholder="Title" name="title" required="required">
					</div> <!-- form-group end.// -->
				</div> <!-- form-row end.// -->
                <div class="form-group">
					<label>Price</label>
					<input id="text" type="number" class="form-control" min="1" step="any" placeholder="Price" name="price" required="required">   
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Quantity</label>
					<input id="text" type="number" class="form-control" placeholder="Quantity" name="quantity" required="required">
				</div> <!-- form-group end.// -->
                <div class="form-group">
					<label>Ribbon</label>
					<input id="text" type="text" class="form-control" placeholder="New Arrivals/On Sale.." name="ribbon">
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label class="custom-control custom-radio custom-control-inline">
					  <input class="custom-control-input"  type="radio" name="discount" value="discount">
					  <span class="custom-control-label">Discount</span>
					</label>
				</div> <!-- form-group end.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
					  <label>Delivery</label>
					  <input type="text" class="form-control" name="delivery" placeholder="Store Walk-Ins/Shipped Worldwide">
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
					  <label>Brand</label>
					  <select id="inputState" class="form-control" name="brand" >
					    <option> Choose...</option>
                          <option>Padini</option>
					      <option>Uniqlo</option>
                          <option>Louis Vuitton</option>
                          <option>Gucci</option>
                          <option>Prada</option>
					      <option>Armani Exchange</option>
					      <option selected="">Asadi</option>
					      <option>Salvatore Ferragamo</option>
                          <option>Burberry</option>
						  <option>No Brand</option>
					  </select>
					</div> <!-- form-group end.// -->
				</div> <!-- form-row.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Images</label>
					    <input class="form-control" type="file" name="img1"  placeholder="Images">
                        <input type="submit" name="uploadimg1" value="upload">
					</div> <!-- form-group end.// -->  
				</div>
			    <div class="form-group">
			        <button id="button" type="submit" value="Signup" class="btn btn-primary btn-block"> Add Product  </button>
			    </div> <!-- form-group// -->              
			</form>
		</article><!-- card-body.// -->
    </div> <!-- card .// -->
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
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