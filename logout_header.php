
<head>
<link rel="stylesheet" href="css/logout_style.css">
</head>

<html>
<body>
  <header>
  <nav class="nav">
    <a href="index.php"><img class="logo" src="img/logo_harmony.png" alt="Garden_logo"></a>
    
    
      <a href="index.php">Home</a>
      <a href="plants.php">Plants</a>
      <a href="supplies.php">Supplies</a>
      <a href="decor.php">Decor</a>
    
    
      <form  action="search.php" method="GET">
        <input class="search-field" type="text" name="search" placeholder="Search products...">
        <button class="search-button" type="submit">Search</button>
    </form>
    

        <div class=profile-name>
         <?php
        $profile_name=  $_SESSION['name'];?>
        <a href="profile_about.php"><?php echo strtoupper($profile_name);?></a>
        
        </div>
        <a href="logout.php"><button class="logout-btn" >logout</button></a>
    </nav>
  </header>
</body>
</html>
</html>