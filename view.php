<?php
 session_start();
include('logout_header.php');
?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
include_once("connection.php");


$result = mysqli_query($mysqli, "SELECT * FROM products  ORDER BY id ASC");
?>

<html>
<head>
	<title>Homepage</title>
	<style>
		.table{
			border-collapse: collapse;
			margin-left:10%;
		}
	</style>
</head>

<body>
	<br> 
	<table class="table" width='80%' border=1px>
		<tr bgcolor='#CCCCCC'>
			<td>Name</td>
			<td>Quantity</td>
			<td>Price </td>
			<td>image</td>
			<td>Category</td>
			<td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['price']."</td>";	?>
			 <td><img src="<?php echo $res['image']; ?>" height="50px" width="50px" /></td>
			 <?php echo "<td>".$res['tag']."</td>";
			
			 "<tr>";
			echo "<td><a href=\"edit.php?id=$res[id]\">edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
