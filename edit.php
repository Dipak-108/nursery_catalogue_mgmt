<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
	header('Location: login.php');
} else {
	include('logout_header.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if (isset($_POST['update'])) {
	$id = $_POST['id'];

	$name = htmlspecialchars($_POST['name']);
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$desc = htmlspecialchars($_POST['description']);
	$category=$_POST['category'];

	
	
		
		$result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', price='$price', description='$desc',tag='$category' WHERE id=$id");


		header("Location: view.php");
	
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
	$name = htmlspecialchars($res['name']) ;
	$qty = $res['qty'];
	$price = $res['price'];
	$desc=htmlspecialchars($res['description']); 
	$category=$res['tag'];
}
?>
<html>

<head>
	<title>Edit Data</title>
	<link rel="stylesheet" href="css/edit.css">
</head>

<body>
	<div class="section_class">
		<a href="view.php"><img class="view_product" src="img/go_back.png" alt=""></a>
		<br /><br />

		<form class="form_class" name="form1" method="post" action="edit.php">
			<table border="0">
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td><input type="text" name="qty" value="<?php echo $qty; ?>"></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="text" name="price" value="<?php echo $price; ?>"></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><textarea name="description"  cols="40" rows="10" ><?php echo $desc;?></textarea></td>
				</tr>
				<tr>
					<td>Category</td>
					<td>
						<select name="category" value="" >
							<option value="plant" <?php echo $category=="plant"?"selected":"" ?> >Plant</option>
							<option value="supplies" <?php echo $category=="supplies"?"selected":"" ?>>Supplies</option>
							<option value="decor" <?php echo $category=="decor"?"selected":"" ?>>Decor</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
					<td><input type="submit" name="update" value="Update"></td>
				</tr>
			</table>
		</form>
	</div>

</body>

</html>