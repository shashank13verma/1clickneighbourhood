<html>
	<head>
		<title>1ClickNeighbourhood</title>
		<?php include_once("css/css.html")	
		
		?>
		<script>
		function openLogin()
		{ 		
		
			document.getElementById('bodyofpage').style.opacity=0.2;
			//alert("hello");
			var popup=window.open
			("login/login.php","popup","width=300,height=300");
			popup.focus();
		}
		</script>
	</head>
	<body id="bodyofpage">	
		<div>
			<input type="button" value="Login" id="login" onclick="openLogin()"><a href="login/registration.php"><input type="button" value="Registration" id="login"></a>
		</div>
		
		<div id="menu">	
			
					<ul>
						<li id="click"><a href="#" onclick="funcSelect(home)">Home</a></li>
						<li id="about"><a href="#" onclick="funcSelect(about_us)">About Us</a></li>
						<li id="product"><a href="#" onclick="funcSelect(products)">Products</a></li>
						<li id="supplier"><a href="#" onclick="funcSelect(supplier)">Supplier</a></li>
						<li id="business"><a href="#" onclick="funcSelect(business)">Business Listings</a></li>
						<li id="contact"><a href="#" onclick="funcSelect(contact_us)">Contact Us</a></li>
					</ul>
		</div>
	</body>
</html>
