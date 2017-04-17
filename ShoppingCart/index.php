<!DOCTYPE html>
<html>
<head>
<title> ETES - Online Shopping Cart </title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>

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
				<div class="product-description" data-name="Ticket_dets" data-price="20">
					<h4 class="product-name"> <?php echo $ticket_name?> </h4>
					<h5> <?php echo $ticket_detail?> </h5>
					<h6> <?php echo $ticket_pickup_address?> </h6>
					<p class="product-price">&dollar;<?php echo $ticket_price?></p>
					<form class="add-to-cart" action="checkout.html?ticket_id=<?php echo $ticket_id ?>" method="post">
						<div>
						<label for="qty-1">Quantity</label>
						<input type="text" name="qty-1" id="qty-1" class="qty" value="1" />
						</div>
						<p><input type="submit" value="Add to cart" class="btn"/></p>
					</form>
				</div>
			</li>
			<?php
			} // ending while loop
			?>

			</ul>
		</div>
	</div>
</div>
</body>
</html>