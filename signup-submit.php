<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>
	body {
		background-image: URL("background.jpg");
		background-attachment: fixed;
		color: #fff;
		font-weight: bold;
	}
	.container {
		color: #fff;
		margin-top: 25px;
	}
	p > a {
		color: #6495ED;
	}
</style>

<div class="container">
	<?php
	include("top.html");
	$name = $_POST["name"];
	$gender = $_POST["gender"];
	$age = $_POST["age"];
	$personality = $_POST["personality"]; 
	$os = $_POST["os"];
	$min_age = $_POST["min_age"];
	$max_age = $_POST["max_age"];
	$db = new PDO("mysql:host=localhost;dbname=singles", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	verify();
	?>

	<hr/><h1>Signup Successful</h1>

	<p>Welcome to NerdLuv, <?= $_POST["name"] ?>!</p>

	<p>Now <a href="matches.php">log in to see your matches!</a></p><hr/><br/>

	<?php
	include("bottom.html");

	function verify(){
		global $name, $gender, $age, $personality, $os, $min_age, $max_age, $db;
		/* assign form info to variables */
		$check_user = "SELECT name FROM singles
		WHERE name = '$name'";
		$user = null;
		$attributes = $db->query($check_user);
		foreach($attributes as $attribute){
			$user = $attribute["name"];
			break;
		}
		if($user !== null){
			reject();
		}
		/* verify that each piece of form data is valid */
		if(preg_match("/.*[^ ].*/", $name) === 0 || preg_match("/M|F/", $gender) === 0 || preg_match("/[0-9][0-9]?/", $age) === 0 ||
			preg_match("/(I|E)(N|S)(F|T)(J|P)/", $personality) === 0 || preg_match("/Windows|Mac OS X|Linux/", $os) === 0 ||
			preg_match("/[0-9][0-9]?/", $min_age) === 0 || preg_match("/[0-9][0-9]?/", $max_age) === 0){
			reject(); /* reject submission if form data is invalid */
	}
	else{
		submit(); /* accept submission */
	}
}

function submit(){
	global $name, $gender, $age, $personality, $os, $min_age, $max_age, $image, $db;
	$stream = fopen($_FILES["photo"]["tmp_name"], "rb");
	$image = stream_get_contents($stream);
	fclose($stream);
	$path = $_FILES["photo"]["tmp_name"];
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$base64 = "data:image/" . $type . ";base64," . base64_encode($image);
	/* add user to profiles database */
	$add_user = "INSERT INTO singles (name, gender, age, personality, os, min_age, max_age, image)
	VALUES ('$name', '$gender', '$age', '$personality', '$os', '$min_age', '$max_age', '$base64')";
	$db->query($add_user);
}

function reject(){
	?>
	<hr/><h1>Error! Invalid data.</h1>
	<p>We're sorry. You submitted invalid user information. Please go back and try again.</p><hr/><br/>
	<?php
	include("bottom.html");
	exit;
}
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>