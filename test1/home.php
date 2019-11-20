<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

<style>
	
	.header{
		display: inline-flex;
		width: 100%;
		border: 1px solid black;
	}

    .logo{
    	display: inline-flex;
    	width: 80%;
    	float: left;
    	margin: 5px 5px 5px;
    }
    
    .nav{
    	display: inline-flex;
    	width: 20%;
    	float: right;
    	margin: 5px 5px 5px;
    }
    .nav ul{
    	display: inline-flex;
    	margin: 5px 5px 5px;
    }

    .nav ul li{
    	list-style: none;
    	margin: 5px 5px 5px;
    }
    .nav ul li a{
    	text-decoration: none;
    }

    .main{
    	display: inline-flex;
    	width: 100%;
    }

    .left_main{
    	width: 30%;
    	
    }

</style>





</head>


<body>

<div class="header">

	<div class="logo">
		<img src="logo.jpg">
	</div>

	<div class="nav">
		<ul>
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">Log out</a>
			</li>
		</ul>
		
	</div>
</div>

<div class="main">
	<div class="left_main">
		<ul>
			<li>
				<a href="#">Log in as patient</a>
			</li>
		</ul>
	</div>

	<div class="right_main">
		<div class="r_left_main">
		<ul>
			<li>
				<a href="#">Log in as Doctor</a>
			</li>
		</ul>
		</div>

		<div class="r_right_main">
		<ul>
			<li>
				<a href="#">Log in as Pharmacist</a>
			</li>
		</ul>
		</div>
	</div>
</div>

<div class="footer">

	<div class="left_footer">
		<p>copyright</p>
	</div>

	<div class="right_footer">
		<a href="#">Help</a>
	</div>

</div>



</body>
</html>