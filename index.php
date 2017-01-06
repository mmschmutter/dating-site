<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width = device-width, initial-scale = 1"/>

	<title>NerdLuv</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
	<link href="https://fonts.googleapis.com/css?family=Pacifico" type="text/css" rel="stylesheet"/>
	<link href="heart.png" type="image/png" rel="shortcut icon"/>

	<style>
		body {
			background-image: URL("background.jpg");
			background-attachment: fixed;
			color: #fff;
			font-weight: bold;
		}	
		.container {
			margin-top: 10px;
		}
		h1 {
			font-size: 25px;
		}
		.banner > img {
			margin-right: 100px;
			background-color: #000;
		}
		.buttons {
			margin: auto;
			width: 50%;
		}
		.btn.btn-primary.btn-lg {
			color: #000;
			background-color: #fff;
			width: 200px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="banner">
			<img src="nerdluv.png" alt="banner logo"/> <br/>
			<p>where meek geeks meet</p>
		</div>


		<h1>Welcome to NerdLuv!</h1><hr/>
		<div class="buttons">
			<a href="signup.php" class="btn btn-primary btn-lg" role="button">
				<img src="signup.png" alt="icon"/>
				Sign Up
			</a>

			<a href="matches.php"class="btn btn-primary btn-lg" role="button">
				<img src="heart.png" alt="icon"/>
				Check Matches
			</a>	
		</div><hr/>


		<p>This is a site for single nerds to meet and date each other.</p>
		<p>Type in your personal information and wait for the nerdly luv to begin!</p>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>