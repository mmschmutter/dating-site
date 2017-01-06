<?php include("top.html"); ?>

<form action="matches-submit.php" method="get">
	<fieldset class="column">
		<legend class="formtitle">Returning User:</legend>

		<div class="input-group input-group-sm col-xs-4">
			<span class="input-group-addon">Name</span>
			<input type="text" name="name" class="form-control" placeholder="Full Name">
		</div><br/>

		<span class="input-group-btn">
			<button class="btn btn-default">
				<input type="submit" value="View My Matches" formacation="matches-submit.php">
			</button>
		</span>
	</fieldset>
</form><hr/>

<?php include("bottom.html"); ?>