<?php
session_start(); // Starts the session

include("connection.php"); 

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['valid']);


include("header.php");

// Initialize variables for search and search results
$searchResults = [];

if (isset($_GET['search'])) {
	$searchQuery = $_GET['search'];

	// Query to search for products by name
	$query = "SELECT id, name, qty, price, image FROM products WHERE name LIKE '%$searchQuery%'";
	$result = mysqli_query($mysqli, $query);

	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$searchResults[] = $row;
			
		}
	}
}
?>

<html>

<head>
	<title>Search Results</title>
	<style>
    
    .product-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, 200px);
        gap: 20px;
        justify-items: center;
    }

    .product-card {
        width: 70%; 
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: center;
    }

    .product-image {
        max-width: 100%;
        height: auto;
    }
</style>

</head>

<body>
	<div class="container">
		



		<?php if (!empty($searchResults)) { ?>
			<p>Search results for: <?php echo $searchQuery; ?></p> </br><br>

			<div class="product-container">
				<?php
				foreach ($searchResults as $result) {
					
				?>
				<a href="product_view.php?id=<?php echo $result['id'];?>">
				<div class="product-card">
						<img class="product-image" src="<?php echo $result['image']; ?>" alt="<?php echo $result['name']; ?>"height="1500px" width="150px">
						<h3><?php echo $result['name']; ?></h3>
						<p>Price: Nrs<?php echo $result['price']; ?></p>
						<p>Remaining Qty: <?php echo $result['qty']; ?></p>
					</div>
				<?php
				}
				?>
			</div>
				</a>
					
		<?php } else { ?>
			<p>No results found for: <?php echo $searchQuery; ?></p>
		<?php } ?>
	</div>
</body>

</html>