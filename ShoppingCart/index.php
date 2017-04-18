<!DOCTYPE html>
<html>
<head>
<title> ETES - Online Shopping Cart </title>
<meta charset="utf-8" />
            <link rel="shortcut icon" type="image/png" href="images/favicon_2016.png"/>

<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'></head></head>
    <style>
.topnav {
    background-color: #45ada8;
    overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: right;
    display: block;
    color: white;
    text-align: right;
    padding: 10px 25px;
    text-decoration: none;
    font-size: 17px;
    font-family: 'Roboto';
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: #547980;
    color: white;
}

/* Add a color to the active/current link */
.topnav a.active {
    background-color: #45ada8;
    color: white;
          }</style>
<body>
<div class="topnav" id="myTopnav">
  <a href="../contact.php">Contact Us</a>
  <a href="../sign_up/signup.html">Sign In</a>
  <a href="index.php">Buy Tickets</a>
  <a href="../index.html">Home</a>
</div>
<div id="site">
	<header id="masthead">
		<h1>ETES<span class="tagline">Online Ticket Marketplace </h1>
	</header>
	<div id="content">
		<div id="products">
		<ul>
            
		<?php
		require "../php/Config.php";
		$sql = "SELECT ticket_id, ticket_name, ticket_detail, ticket_quantity, ticket_price, ticket_pickup_address FROM tickets";
		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($result)){
			$ticket_id = $row['ticket_id'];
			$ticket_name = $row['ticket_name'];
			$ticket_detail = $row['ticket_detail'];
			$ticket_quantity = $row['ticket_quantity'];
			$ticket_price = $row['ticket_price'];
			$ticket_pickup_address = $row['ticket_pickup_address'];

			?> 
			<!-- 	break then parse information -->
			<!-- HTML Information To Populate Blobs-->
			<!-- should only be able to buy one ticket at a time -->

            <li>
            <div class="product-description">
					<h4 class="product-name"> <?php echo $ticket_name?> </h4>
					<h5> <?php echo $ticket_detail?> </h5>
					<h6> <?php echo $ticket_pickup_address?> </h6>
					<p class="product-price">&dollar;<?php echo $ticket_price?></p>
					<form class="add-to-cart" action="cart.html?ticket_id=<?php echo $ticket_id ?>?ticket_address=<?php echo $ticket_pickup_address ?>" method="post">
						<div>
						<label for="qty-1">Quantity</label>
						<input type="text" name="qty-1" id="qty-1" class="qty" value="1" />
						</div>
						<p><input type="submit" value="Add to cart" class="btn"/></p>
					</form>
			
                </div> 
			<?php
            } 
                ?>
           </li>
			</ul>
        </div>
			
		
	</div>
</div>
</body>
</html>