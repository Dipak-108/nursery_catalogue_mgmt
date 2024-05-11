<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <style>
        
.image-container {
    text-align: center;
    margin: 20px;
}


.image_class {
    max-width: 50%;
    height: auto;
    border-radius: 20px;
}


h1 {
    font-size: 24px;
    margin: 10px 0;
}


p {
    font-size: 16px;
    margin: 5px 0;
}


p:last-child {
    margin-bottom: 20px;
}

        
    </style>
</head>
<body>

<?php
 session_start();
if(isset($_SESSION['valid'])&& $_SESSION['id']==1) {			
    include("logout_header.php");					
    include("connection.php");
}
else if(isset($_SESSION['valid'])&& $_SESSION['id']!==1){

	include('logout_header.php');
	
}
else {
	include('header.php');
	
}
	?>

<?php

include('connection.php');
if (isset($_GET['id'])) {
    

   
    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $product_id = mysqli_real_escape_string($mysqli, $_GET['id']);

   
    $query = "SELECT * FROM products WHERE id = $product_id";

    
    $result = mysqli_query($mysqli, $query);

    
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);?>
    <div class="image-container">
    <img class="image_class" src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
    <h1><?php echo $row['name']; ?></h1>
    <p>Price: Nrs <?php echo number_format($row['price'], 2); ?></p>
    <p>Quantity Available: <?php echo $row['qty']; ?></p>
    <p> <?php echo htmlspecialchars_decode($row['description']); ?></p>
</div>


   <?php mysqli_close($mysqli);
} else {
    echo "Product not found.";
}


} else {
    echo "Invalid product ID.";
}
?>



</body>
</html>
