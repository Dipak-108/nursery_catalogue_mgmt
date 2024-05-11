<?php session_start(); ?>

<?php
if (!isset($_SESSION['valid'])) {
	header('Location: login.php');
} else {
	include('logout_header.php');
}
?>

<html>

<head>
	<title>Add Data</title>
	<link rel="stylesheet" href="css/add.css">
</head>

<body>


	<form action="add.php" method="post" name="form1" enctype="multipart/form-data" enctype="text/plain">
		<table width="25%" border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="text" name="qty"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>

			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="description" cols="50" rows="10"></textarea></td>
			</tr>
			<tr>
				<td>Tag of the item</td>
				<td>
					<select name="category">
						<option value="plant">Plant</option>
						<option value="supplies">Supplies</option>
						<option value="decor">Decor</option>
					</select>
				</td>
				
			</tr>
			<tr>
				<td></td>
			<td class="button"><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>

</html>


<?php

include_once("connection.php");

if (isset($_POST['Submit'])) {
	$name = htmlspecialchars($_POST['name']);
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$desc = htmlspecialchars($_POST['description']);
	$loginId = $_SESSION['id'];
	$category=$_POST['category'];
	$image = $_FILES["image"]["name"];

	$tempName = $_FILES["image"]["tmp_name"];
	$imageName = htmlspecialchars($image);
	$targetDirectory = "upload/" . $imageName;
	move_uploaded_file($tempName, $targetDirectory);
	if (empty($name) || empty($qty) || empty($price) || empty($imageName)) {

		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if (empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}

		if (empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}

		if (empty($imageName)) {
			echo "<font color='red'>image field is empty.</font><br/>";
		}

		if (empty($desc)) {
			echo "<font color='red'>description is empty.</font><br/>";
		}
		if(empty($category)){
			echo "<font color='red'>category is empty.</font><br/>";
		}


		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {


		$result = mysqli_query($mysqli, "INSERT INTO products(name, qty, price, login_id,image,description,tag) VALUES('$name','$qty','$price', '$loginId','$targetDirectory','$desc','$category')");



		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>
</body>

</html>