<?php session_start(); 
include("connection.php");
if(isset($_SESSION['valid'])&& $_SESSION['id']==1) {			
    include("logout_header.php");					
    
}

else if(isset($_SESSION['valid'])&& $_SESSION['id']!==1){

	include('logout_header.php');
	
}
else {
	include('header.php');
	
}
$query = "SELECT id, name, qty, price, image FROM products WHERE tag='decor'";
$result = mysqli_query($mysqli, $query);

?>
<html>

<head>
    <title></title>
    <style>
       /* Style for the container */
.container {
    max-width: 70em;
    margin: 0 auto;
    padding: 20px;
    border: 2px solid saddlebrown;
    
}

/* Style for the product container */
.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    
}

/* Style for each product card */
.product-card {
    flex: 0 0 calc(33.33% - 20px); /* Adjust the width as needed */
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    max-height:200px ;
    background-color: #fff;
    text-align: center;
    
}



.product-image {
    max-width: 50%;
    height: auto;
    border-radius: 10px;
    max-height:30% ;
}

h3 {
    font-size: 1em;
    margin: 10px 0;
    text-decoration: none;
}

p {
    font-size: 1em;
    margin: 5px 0;
    text-decoration: none;
}




    </style>
</head>

<body>


    <div class="container">

        <div class="product-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="product_view.php?id=' . $row['id'] . '">';
                echo '<div class="product-card">';
                echo '<img class="product-image" src="' . $row['image'] . '" alt="' . $row['name'] . '" height="150px" width="150px" style="border-radius: 20px;">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>Price: Nrs' . $row['price'] . '</p>';
                echo '<p>Remaining Qty: ' . $row['qty'] . '</p>';
                echo '</div>';
                echo '</a>';
            }
            ?>
        </div>

    </div>

</body>

</html>
