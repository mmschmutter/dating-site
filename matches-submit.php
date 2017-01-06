<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Pacifico" type="text/css" rel="stylesheet" />	

<style>
	body {
		background-image: URL("background.jpg");
		background-attachment: fixed;
		font-weight: bold;
	}
	.container {
		margin: 10px;
		margin-top: 25px;
		color: #fff;
	}
	.row {
		float: left;
		padding: 10px;
		color: #000;
	}
	.map {
		overflow: hidden;
		clear: both;
		text-align: center;
	}
	.panel.panel-default > .panel-heading {
		color: #fff;
		background-color: #000;
		border-color: #000;
	}
	.panel.panel-default > .panel-body {
		overflow: hidden;
		min-height: 300;
		max-height: 300;
		overflow-y: hidden;
		width: 250;
		overflow-x: hidden;
	}
	.panel-body > h3 {
		font-size: 15px;
	}
	.panel-body > img {
		max-width: 100%;
		max-height: 100%;
		height: 150px;
		width: 150px;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}

</style>

<body>
	<div class="container">
		<?php include("top.html"); ?>

		<?php
		$name = $_GET["name"];
		$user = null;
		$db = new PDO("mysql:host=localhost;dbname=singles", "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$get_user = "SELECT * FROM singles
		WHERE name = '$name'";
		$attributes = $db->query($get_user);
		foreach($attributes as $attribute){
			$user = $attribute["name"];
			$gender = $attribute["gender"];
			$age = $attribute["age"];
			$personality = $attribute["personality"]; 
			$os = $attribute["os"];
			$min_age = $attribute["min_age"];
			$max_age = $attribute["max_age"];
		}
		if($user == null){
			reject();
		}
		$get_profiles = "SELECT * FROM singles";
		$profiles = $db->query($get_profiles);
		/* add each profile that matches user's specifications to matches array */
		$matches = array();
		foreach($profiles as $profile){
			if($profile["gender"] != $gender && $profile["age"] > $min_age && $profile["age"] < $max_age &&
				$profile["min_age"] < $age && $profile["max_age"] > $age && $profile["os"] === $os){
				for($i = 0; $i < strlen($profile["personality"]); $i++){
					if(strpos($personality, $profile["personality"][$i])){
						array_push($matches, $profile);
						break;
					}
				}
			}
		}
		?>
		<h2>Matches for <?= $name ?></h2>
		<hr/>

		<?php foreach($matches as $match){ ?>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">	
					<div class="panel-heading"> <?= $match[0] ?> </div>
					<div class="panel-body">
						<img src="<?= $match[7] ?>" alt="user image" class="img-circle" />
						<h3>Profile:</h3>
						<ul>
							<li><strong>Gender:</strong> <?= $match[1] ?></li>
							<li><strong>Age:</strong> <?= $match[2] ?></li>
							<li><strong>Type:</strong> <?= $match[3] ?></li>
							<li><strong>OS:</strong> <?= $match[4] ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>

		<div class="map"> <hr/>
			<h3>Since all your matches love <?= $os ?>, here are some places you might want to take them:</h3>

			<?php if($os === "Mac OS X"){ ?>
			<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?q=Apple%20Stores&key=AIzaSyBvzxDSgQwpg4ThNqNUWBCoP2pRK_IykWQ" allowfullscreen></iframe>
			<?php } elseif($os === "Windows"){ ?>
			<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?q=Microsoft%20Stores&key=AIzaSyBvzxDSgQwpg4ThNqNUWBCoP2pRK_IykWQ" allowfullscreen></iframe>
			<?php } elseif($os === "Linux"){ ?>
			<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?q=PC%20Richard%20%26%20Son&key=AIzaSyBvzxDSgQwpg4ThNqNUWBCoP2pRK_IykWQ" allowfullscreen></iframe>
			<?php
		} ?>
	</div><hr/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>

	<?php include("bottom.html");

	function reject(){
		?>
		<h1>Error! Invalid data.</h1>
		<p>We're sorry. You submitted invalid user information. Please go back and try again.</p>
		<?php
		include("bottom.html");
		exit;
	}
	?>
</body>
</div>