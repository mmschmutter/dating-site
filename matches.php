<?php include("top.html"); ?>

<form action="matches-submit.php" method="get">
	<fieldset class="column">
		<legend class="formtitle">Returning User:</legend>

		<div class="input-group input-group-sm col-xs-4">
			<span class="input-group-addon">Name</span>
			<input type="text" name="name" class="form-control" placeholder="Full Name">
		</div><br/>

		<span class="input-group-btn">
			<input class="btn btn-default" type="submit" value="View My Matches" formaction="matches-submit.php">
		</span>
	</fieldset>
</form><hr/>

<?php include("bottom.html"); ?>