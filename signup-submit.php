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

<h1>Signup Successful</h1><hr/>

<p>Welcome to NerdLuv, <?= $_POST["name"] ?>!</p>

<p>Now <a href="matches.php">log in to see your matches!</a></p><hr/>

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
	<h1>Error! Invalid data.</h1><hr/>
	<p>We're sorry. You submitted invalid user information. Please go back and try again.</p><hr/>
	<?php
	include("bottom.html");
	exit;
}
?>