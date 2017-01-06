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
	}
	.formtitle {
		color: #fff;
	}
	.submit {
		padding-left: 25px;
		color: #000;
	}
</style>

<div class="container">
	<?php include("top.html"); ?>

	<form action="signup-submit.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend class="formtitle">New User Signup:</legend>

			<div class="input-group input-group-sm col-xs-4">
				<span class="input-group-addon">Name</span>
				<input type="text" name="name" class="form-control" placeholder="Full Name">
			</div> <br/>

			<div class = "btn-group" data-toggle ="buttons">
				<label class="btn btn-default">
					<input type="radio" name ="gender" value="M" id="male"> Male
				</label>
				<label class = "btn btn-default">
					<input type="radio" name="gender" value="F" id="female"> Female
				</label>
			</div><br/><br/>

			<div class="input-group input-group-sm col-xs-4">
				<span class="input-group-addon">Age</span>
				<input type="text" class="form-control" placeholder="age" name="age" size="6" maxlength="2">
			</div> <br/>

			<div class="input-group input-group-sm col-xs-4">
				<span class="input-group-addon">Personality Type</span>
				<input type="text" class="form-control" placeholder="Jung Typology" name="personality" maxlength="4">
				<span class="input-group-btn">
					<button class="btn btn-default"><a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a></button>
				</span>
			</div> <br/>

			<div class = "btn-group" data-toggle ="buttons">
				<label class="btn btn-default">
					<input type="radio" name ="os" value="Windows" id="Windows"> Windows
				</label>

				<label class = "btn btn-default">
					<input type="radio" name="os" value="Mac OS X" id="Mac OS X"> Mac OS X
				</label>

				<label class = "btn btn-default">
					<input type="radio" name="os" value="Linux" id="Linux"> Linux
				</label>
			</div><br/><br/>

			<div class="input-group input-group-sm col-xs-4">
				<span class="input-group-addon">Seeking Age:</span>
				<input type="text" class="form-control" placeholder="min" name="min_age" maxlength="2">
				<span class="input-group-addon">To</span>
				<input type="text" class="form-control" placeholder="max" name="max_age" maxlength="2">
			</div> <br/>

			<div class="input-group input-group-sm col-xs-4">
				<span class="input-group-btn">Photo</span>
				<input type="file" name="photo" class="form-control"> 
			</div>
			<hr>		
			<span class="input-group-btn">
				<button class="btn btn-default">
					<input type="submit" value="Sign Up" formaction="signup-submit.php">
				</button>
			</span>
		</fieldset>
	</form><br/>

	<?php include("bottom.html"); ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>