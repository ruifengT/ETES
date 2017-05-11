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
	function check(){
		if (getParameterByName('user_id')== null){
			alert('You need to log in first.');
		}
	}
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
    function goDash()
    {
        var us_dashboard = "../sign_up/signup.html";
        if (getParameterByName('user_id'))
    	{
    		us_dashboard = '../userdashboard.html?user_id=' + getParameterByName('user_id');
        }
        window.location = us_dashboard;
    }
    function goBuy()
    {
        window.location = 'index.php?user_id=' + getParameterByName('user_id');
    }
    function goSell()
    {
    		window.location = '../sell_tickets.html?user_id=' + getParameterByName('user_id');
    }
    function signedIn()
    {
        var foo = "";
        if (getParameterByName('user_id'))
    	{
            foo += "<a href='../sign_up/signup.html'>Sign Out <a onclick='goContact()'>Contact Us</a><a onclick='goBuy()'>Buy Tickets</a> <a onclick='goSell()'> Sell Tickets</a> <a onclick='goDash()'>Dashboard</a> <a onclick='goHome()'>Home</a> </a> </div>"
        }
        else
            {
                foo += "<a onclick='goContact()'>Contact Us</a><a href='index.php'>Buy Tickets</a><a onclick='goDash()'>Sign In</a> <a onclick='goHome()'>Home</a> </div>"
            }
        document.getElementById("myTopnav").innerHTML = foo;
    }
</script>

<body onload="signedIn()">
<div class="topnav" id="myTopnav">
</div>
<div id="site">
	<header id="masthead">
		<h1>ETES<span class="tagline">Online Ticket Marketplace</h1>
	</header>
	<div id="content"><br>
        <form action='index.php' metho='POST' style="text-align:center;">
                    <input type="search" name="search" placeholder="Search for tickets"></form> <p></p>
		<div id="products">
		<ul>
		<?php
		require "../php/Config.php";

        $sql = "SELECT DISTINCT ticket_id, ticket_name, ticket_detail, ticket_quantity, ticket_price, ticket_postedby, ticket_pickup_address FROM tickets";
        if(!empty($_GET['user_id'])){
            $id = $_GET['user_id'];
            $sql .= " where NOT ticket_postedby like '%". $id ."%'";
        }
        if(!empty($_GET['search'])){
            $keyword = $_GET['search'];

            $sql = " where ticket_name like '%" . $keyword . "%' or ticket_detail like '%" . $keyword . "%'";
        }

		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result)){
            if ($row['ticket_quantity'] > 0){
			$ticket_id = $row['ticket_id'];
			$ticket_name = $row['ticket_name'];
			$ticket_detail = $row['ticket_detail'];
			$ticket_quantity = $row['ticket_quantity'];
			$ticket_price = $row['ticket_price'];
            $ticket_postedby = $row['ticket_postedby'];
			$ticket_pickup_address = $row['ticket_pickup_address'];

			?>
			<li>
				<div class="product-description" data-name="<?php echo $ticket_name?>" data-price="<?php echo $ticket_price?>">
					<h4 class="product-name"> <?php echo $ticket_name?> </h4>
					<p> <?php echo $ticket_detail?> </p>
					<p> <?php echo $ticket_pickup_address?> </p>
                    <p>Ticket Posted By: <?php echo $ticket_postedby?></p>
					<p class="product-price">&dollar;<?php echo $ticket_price?></p>
					<form class="add-to-cart"  action="<?php
						if(empty($_GET['user_id']))
						{
							echo "../sign_up/signup.html";
						}
						else{
							echo "checkout.html?ticket_id=", $ticket_id, "&user_id=", $id;					}
					?>" method="post">
						<div>
						<label for="qty-1">Quantity</label>
						<input type="number" min="1" name="qty-1" id="qty-1" class="qty" value="1" maxlength="2" required /> of <?php echo $ticket_quantity?>
						</div>
						<p onclick="check()"><input type="submit" value="Checkout" class="btn"/></p>
					</form>
				</div>
			</li>
			<?php
                }
			} // ending while loop
			?>

			</ul>
		</div>
	</div>
</div>
</body>
</html>
