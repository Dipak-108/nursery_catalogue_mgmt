<?php session_start();
if(isset($_SESSION['valid'])&& $_SESSION['id']==1) {			
    include("logout_header.php");					
    include("connection.php");
	?>

<a  href='view.php'><img class="view_productt"  src="img/view_product.png" alt="View Product" ></a>
<a  href='add.php'><img class="view_productt"  src="img/add_new _product.png" alt="Add Product" ></a>
<?php }
else if(isset($_SESSION['valid'])&& $_SESSION['id']!==1){

	include('logout_header.php');
	include('user_view.php');
}
else {
	include('header.php');
	//include('slideshow.html');
	include('user_view.php');
}
?>

<html>
	
<head>
	<title>Homepage</title>
	<style>
		img.view_productt{
			border:5px solid black;
			margin:20px 0px 0px 150px;
			border-radius:20px;
		}

		img.view_productt:hover{
			background-color:#00b300;
		}
	</style>
</head>
</html>