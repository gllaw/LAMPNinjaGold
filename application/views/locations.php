<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">
</head>
<body>
	<div id="container">
		<div id="yourgold">
		<p>Your Gold: </p>
		<textarea rows="1" cols="50"><?= $this->session->goldCount ?></textarea>
		<form action="/Main/reset" method="post"><input type="submit" value="Reset"></form>
		</div>

		<div class="structure">
			<h3 class="label">Farm</h3>
			<p>(earns 10-20 golds)</p>
			<form action="/Main/process_money" method="post">
				<input type="hidden" name="building" value="farm"/>
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>
		<div class="structure">
			<h3 class="label">Cave</h3>
			<p>(earns 5-10 golds)</p>
			<form action="/Main/process_money" method="post">
				<input type="hidden" name="building" value="cave"/>
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>
		<div class="structure">
			<h3 class="label">House</h3>
			<p>(earns 2-5 golds)</p>
			<form action="/Main/process_money" method="post">
				<input type="hidden" name="building" value="house"/>
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>
		<div class="structure">
			<h3 class="label">Casino</h3>
			<p>(earns/takes 0-50 golds)</p>
			<form action="/Main/process_money" method="post">
				<input type="hidden" name="building" value="casino"/>
				<input type="submit" value="Find Gold!"/>
			</form>
		</div>
		<div>
			<p><label>Activities:</label></p>
			<!-- <textarea rows="10" cols="50" name="activitieslog"> -->
			<div id="actionlog"
<?php
	// $actArr = $this->session->userdata('activityArray')
	// array_slice($actArr, 0, 5);
	foreach ($this->session->userdata('activityArray') as $action) {
?>
				<p><?= $action; ?></p>
<?php
	}
?>	
			</div>

	</div>
</body>
</html>