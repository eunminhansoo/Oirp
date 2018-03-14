<?php
	include 'inbound_application.php';
	error_reporting(0);
	$sql = "select distinct country from partner_universities order by country asc";
	$result = mysqli_query($conn, $sql);
	
	$res;
	while($row = mysqli_fetch_array($result)) {
		$res .=  "<option value='".$row["country"]."'>".$row["country"]."</option>";
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		
		<div class="header">
			<img src='img/logo.png' height=auto class="img-responsive">
		</div>
		
		<form method="get">
			<div class="col-sm-5">
				Country: <select id="country" name="country" class="form-control">
				
				</select>
			</div>
			<div class="col-sm-5">
				University: <input type="text" id="university" name="university" class="form-control">
			</div>
			<input type="submit" value="Submit">
		</form>
	
	</body>
	<script>
	$(document).ready(function() {
		var val = "<?php echo $res ?>";
		$("#country").empty().append(val);
	});		
	</script>
</html>