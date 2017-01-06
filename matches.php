<style>
	body {
		background-image: URL("background.jpg");
		background-attachment: fixed;
		color: #fff;
		font-weight: bold;
	}
	.container {
		margin: 10px;
		margin-top: 25px;
		color: #fff;
	}
	.formtitle {
		color: #fff;	
	}
</style>
<body>
	<div class="container">
		<?php include("top.html"); ?>

		<form action="matches-submit.php" method="get">
			<fieldset class="column">
				<legend class="formtitle">Returning User:</legend>

				<div class="input-group input-group-sm col-xs-4">
					<span class="input-group-addon">Name</span>
					<input type="text" name="name" class="form-control" placeholder="Full Name">
				</div> <br/>

				<span class="input-group-btn">
					<button class="btn btn-default">
						<input type="submit" value="View My Matches" formacation="matches-submit.php">
					</button>
				</span><br/>
			</fieldset>
		</form><hr/><br/>

		<?php include("bottom.html"); ?>
	</div>
</body>