<?php
include("top.html");

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

<h2>Matches for <?= $name ?></h2><hr/>

<?php foreach($matches as $match){ ?>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default">	
			<div class="panel-heading"> <?= $match[0] ?> </div>
			<div class="panel-body">
				<img src="<?= $match[7] ?>" alt="user image" class="img-circle" /><br/>
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

<div class="map"><hr/>
	<h3>Since all your matches love <?= $os ?>, here are some places you might want to take them:</h3>

	<?php if($os === "Mac OS X"){ ?>
	<iframe width="600" height="450" src="https://www.google.com/maps/embed/v1/search?q=Apple%20Stores&key=AIzaSyBvzxDSgQwpg4ThNqNUWBCoP2pRK_IykWQ" allowfullscreen></iframe>
	<?php } elseif($os === "Windows"){ ?>
	<iframe width="600" height="450" src="https://www.google.com/maps/embed/v1/search?q=Microsoft%20Stores&key=AIzaSyBvzxDSgQwpg4ThNqNUWBCoP2pRK_IykWQ" allowfullscreen></iframe>
	<?php } elseif($os === "Linux"){ ?>
	<iframe width="600" height="450" src="https://www.google.com/maps/embed/v1/search?q=PC%20Richard%20%26%20Son&key=AIzaSyBvzxDSgQwpg4ThNqNUWBCoP2pRK_IykWQ" allowfullscreen></iframe>
	<?php
} ?>
</div><hr/>

<?php include("bottom.html");

function reject(){
	?>
	<h1>Error! Invalid data.</h1>
	<p>We're sorry. You submitted invalid user information. Please go back and try again.</p><hr/>
	<?php
	include("bottom.html");
	exit;
}
?>