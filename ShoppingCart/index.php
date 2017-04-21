<!DOCTYPE html>
<html>
<head>
<title> ETES - Online Shopping Cart </title>
<meta charset="utf-8" />
            <link rel="shortcut icon" type="image/png" href="images/favicon_2016.png"/>

<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.shop.js"></script>
<script type="text/javascript" src="../js/shopping_cart.js"></script>
<script type="text/javascript" src = "js/distance_matrix.js"></script>
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
<script language="javascript" type="text/javascript" src="js/jquery.min.js"></script>
</head>

<script>
	   function getParameterByName(name, url) {
        if (!url) {
          url = window.location.href;
        }
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    function goHome(){
    	var us_id = "../index.html";
    	if (getParameterByName('user_id'))
    	{
    		us_id = '../index.html?user_id=' + getParameterByName('user_id');
    	}
        // window.location = '../index.html?user_id=' + getParameterByName('user_id');
        window.location = us_id;
    }
    function goContact(){
    	var us_id = '../contact.php';
    	if (getParameterByName('user_id'))
    	{
    		us_id = '../contact.php?user_id=' + getParameterByName('user_id');
    	}
        window.location = us_id;
    }

</script>

<body>
<div class="topnav" id="myTopnav">
  <a onclick="goContact()">Contact Us</a>
  <a href="../sign_up/signup.html">Sign In</a>
  <a onclick="goHome()">Home</a>
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

		if(!empty($_GET['user_id'])){
            $id = $_GET['user_id'];
        }

        $sql = "SELECT distinct ticket_id, ticket_name, ticket_detail, ticket_quantity, ticket_price, ticket_pickup_address FROM tickets";
        if(!empty($_GET['search'])){
            $keyword = $_GET['search'];
            $sql .= " where ticket_name like '%" . $keyword . "%' or ticket_detail like '%" . $keyword . "%'";
        }

		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result)){
			$ticket_id = $row['ticket_id'];
			$ticket_name = $row['ticket_name'];
			$ticket_detail = $row['ticket_detail'];
			$ticket_quantity = $row['ticket_quantity'];
			$ticket_price = $row['ticket_price'];
			$ticket_pickup_address = $row['ticket_pickup_address'];
			?>
			<li>
				<div class="product-description" data-name="<?php echo $ticket_name?>" data-price="<?php echo $ticket_price?>">
					<h4 class="product-name"> <?php echo $ticket_name?> </h4>
					<h5> <?php echo $ticket_detail?> </h5>
					<h6> <?php echo $ticket_pickup_address?> </h6>
					<p class="product-price">&dollar;<?php echo $ticket_price?></p>
					<form class="add-to-cart" action="checkout.html?ticket_id=<?php echo $ticket_id ?>&user_id=<?php echo $id ?>" method="post">
					<!-- Remove Echo from formClass for user ID -->
						<div>
						<label for="qty-1">Quantity</label>
						<input type="text" name="qty-1" id="qty-1" class="qty" value="1" />
						</div>
						<p><input type="submit" value="Checkout" class="btn"/></p>
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
