<?php

include("connection.php"); 

// Query to fetch products from the products table
$query = "SELECT id, name, qty, price, image FROM products";
$result = mysqli_query($mysqli, $query);

    // Check if the user is logged in
    $isLoggedIn = isset($_SESSION['valid']);


?>

<html>

<head>
    
    <title></title>
    <style>
       
.container {
    max-width: 70em;
    margin: 0 auto;
    padding: 20px;
    border: 2px solid saddlebrown;
    
}


.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    
}


.product-card {
    flex: 0 0 calc(33.33% - 20px); 
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    max-height:200px ;
    background-color: #fff;
    text-align: center;
    text-decoration: none;
    
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

h3 p .product-card{
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
                echo '<h3 style="text-decoration: none;">' . $row['name'] . '</h3>';
                echo '<p style="text-decoration: none;">Price: Nrs' . $row['price'] . '</p>';
                echo '<p style="text-decoration: none;">Remaining Qty: ' . $row['qty'] . '</p>';
               
                echo '</div>';
                
                echo '</a>';
            }
            ?>
        </div>

    </div>

</body>

</html>