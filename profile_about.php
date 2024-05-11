<?php
session_start();
if(isset($_SESSION['valid'])){
    include('logout_header.php');
    include('connection.php');
   $id= $_SESSION['id'];
}

$query = "SELECT id, name, email, username FROM login WHERE id=$id ";
	$result = mysqli_query($mysqli, $query);

    if ($result) {
		while ($row = mysqli_fetch_assoc($result)) { ?>
			<h3> <?php echo 'id: '. $row['id']; ?> <br> </h3> 
            <h3><?php echo 'Name: '. $row['name'];?> <br> </h3>
            <h3> <?php echo 'Email: '.$row['email'];?> <br> </h3>
            <h3><?php echo 'Username: '.$row['username'];?> <br> </h3>
		<?php	
		}
	}
    ?>
