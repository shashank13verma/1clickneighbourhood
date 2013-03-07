<html>
	<head>
		<style>
			body{
				/* background-image: url(blackbackground1.jpg);
				background-repeat: no-repeat;
				background-size: cover; */
			}
			#main{
				height:100%;
				width:100%;
				
				
			}	
			#header{
				height: 3%;
				width: 100%;
			}
			#headerLeft{
				height: 100%;
				width:40%;
				float:left;
			}
			#headerMid{
				height: 100%;
				width: 20%;
				background-color: #ff6f00;
				float:left;
				border-radius: 5px;
				box-shadow: 0 0 5px 5px #888;
			}
			
			#headerRight{
				height: 100%;
				width:40%;
				float: right;
			}
			#name{
				margin-top: 1%; 	
				height: 15%;
				width: 100%;
			}
			#nameLeft{
				height: 100%;
				width:35%;
				float: left;
				
			}
			#nameMid{
				
				height: 100%;
				width:30%;
				float: left;
			}
			#nameRight{
				height: 100%;
				width:35%;
				float: right;
				
			}
			#middle{
				height: 72%;
				width: 100%;
			}
			#middleLeft{
				height: 90%;
				width: 38%;
				float: left;
				
				margin-top: 1%;
				margin-left: 2%;
				box-shadow: 0 0 5px 5px #888;
				border-radius: 5px;
			}
			
			#middleMid{
				
				height:95%;
				width: 20%;
				background-color: #ff6f00;
				float: left;
				box-shadow: 0 0 5px 5px #888;
				border-radius: 5px;
				position: relative;
				z-index: 100;
			}
			#middleRight{
				height: 90%;
				width: 38%;
				float: left;
				
				margin-top: 1%;
				margin-right: 2%;
				border-radius: 5px;
				box-shadow: 0 0 5px 5px #888;
				position:relative;
				z-index: 10;
			}
			#footer{
				height: 10%;
				width:100%;
				
			}
			/* #footerLeft{
				height: 100%;
				width:40%;
			}
			#footerMid{
				height: 100%;
				width:20%;
			}
			#footerRight{
				height:100%;
				width:40%;
			} */
			#middleMid li{
				
				display:block;
				
				padding-bottom: 5%;
				text-align: justify;
				color:white;
				text-align: center;
				text-decoration: none;
				type:none;
				text-indent: 0px;
				font-size: 16pt;
				font-weight: bold;
				font-family:monospace;
				
			}
			#middleMid ul{
				margin-top: 40%;
				padding-right: 15%;
				
			}
			
			#nameRight img{
				float:right;
			
				color:white;

				
			}
			#headerright a{
				text-decoration: none;
				color: white;
				font-size:14pt;
				float: right;
				padding-left:2%;
				padding-right: 2%;
			}
			#middleMid a{
				color:white;
				text-decoration: none;
			}
			
			#middleRight div{
				color: black
			}
			#about_us,#products,#contact_us,#advertise{
				display: none;
				color: white;
			}
			#image1{
				padding-top:1%;
				margin-left: 8%;
				
				height: 40%;
				width: 90%;
				box-shadow: 0 0 5px 5px #888;
			}
			#descHome{
				height: 50%;
				width:90%;
				padding-top:2%;
				padding-left: 8%;
				text-align: justify;
				
				
				
				
			}
			#welcome{
				font-size: 18pt;
				color: black;
				padding-left: 2%;
				text-align: left;
				font-family: verdana;
				text-shadow: 3px 3px 4px #888;
			}
			#imgLogin{
				height:100%;
				width:25%;
			}
			#imgRegister{
				margin-top: 2%;
				height:70%;
				width:18%;
				float: right;
			
			}
        </style>
		</style>
		 <script>
			function funcSelect(id)
			{
			if(id==home)
			{
				about_us.style.display="none";
				products.style.display="none";
				contact_us.style.display="none";
				 advertise.style.display="none";
			    home.style.display="block";
			}
			else if(id==about_us)
			{
				home.style.display="none";
				products.style.display="none";
				contact_us.style.display="none";
				 advertise.style.display="none";
			    about_us.style.display="block";
			    
			}
			else if(id==products)
			{
				home.style.display="none";
				about_us.style.display="none";
				contact_us.style.display="none";
				 advertise.style.display="none";
			    products.style.display="block";
			    
			}
			else if(id==contact_us)
			{
				home.style.display="none";
				about_us.style.display="none";
				products.style.display="none";
				advertise.style.display="none";
			    contact_us.style.display="block";
			    
			}
			else if(id==advertise)
			{
				home.style.display="none";
				about_us.style.display="none";
				products.style.display="none";
				contact_us.style.display="none";
			    advertise.style.display="block";
			    
			}
		    }
        </script>
	</head>
	<body>
		<div id="main">
		
			<div id="header" class >
					<div id="headerLeft">
						
					</div>
					<div id="headerMid">
						
						
						
					</div>
					<div id="headerRight">
						<label id="login"><a href="login/login.php">Login</a></label>
						<label id="register"><a href="login/registration.php">Register</a></label>
					</div>
			</div>
			<div id="name">
				<div id="nameLeft">
					
				</div>
				<div id="nameMid">
					<img src="name1.jpg" height="100%" width="100%"/>
				</div>
				<div id="nameRight">
					
					
				</div>
				
			</div>
			<div id="middle">
				<div id="middleLeft">
					
				</div>
				<div id="middleMid">
					<ul>
						<li><a href="#" onclick="funcSelect(home)">HOME</a></li>
						<li><a href="#" onclick="funcSelect(about_us)">ABOUT US</a></li>
						<li><a href="#" onclick="funcSelect(products)">PRODUCTS</a></li>
						<li><a href="#" onclick="funcSelect(contact_us)">CONTACT US</a></li>
						<li><a href="#" onclick="funcSelect(advertise)">ADVERTISEMENT</a></li>
						
					</ul>
				</div>
				<div id="middleRight">
					
						<div id="home">
							<div id="welcome">
								WELCOME
							</div>
							<div id="image1">
								<img src="images/image2.jpg" width="100%" height="100%"/>
							</div>
							<div id="descHome">
							1ClickNeighbourhood is about you, your neighbours & the entire society you live in.
							We connect you on a single platform of camaraderie, ownership, pride, fun & solutions.
							Members can interact, share or discuss common issues. There is a complete transparency
							in the day-to-day operations of the society and each member is just a click away from you.
							The management team & the members together get to form a strong cooperative spirit to ensure
							smooth functioning of their own society. What's more, 1ClickNeighbourhood gives you an array of
							various services and entertainment options!
							
							</div>
						    </div>
						    <div id="about_us">
							about us
						    </div>
						    <div id="products">
							products
						    </div>
						    <div id="contact_us">
							contact
						    </div>
						    <div id="advertise">
							advertise
						    </div>
					
					
				</div>
				
			</div>
			<div id="footer">
				<div id="footerLeft">
					
				</div>
				<div id="footerMid">
					
				</div>
				<div id="footerRight">
					<!-- <a href=""  ><img src="Login.png" id="imgLogin"/></a>
					<a href="" ><img src="register3.png" id="imgRegister"/></a> -->
				</div>
			</div>
		</div>
	</body>
</html>