<?php
	require 'universities.php';
	
	$sql = "select distinct country from partner_universities order by country asc";
	$result = mysqli_query($conn, $sql);
	
	$res = "[";
	while($row = mysqli_fetch_array($result)){
		$res .= "'" .$row['country']."',";
	}
	$res .= "' '];";
	
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width = device-width, initial-scale = 1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/custom.css">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/jquery-ui.css">
    	
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
	
	</head>
	<body>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-1.12.4.js"></script>
  		<script src="bootstrap-3.3.7-dist/js/jquery-ui.js"></script>
  
		<div class="">
		<div class="container-fluid">
			<a href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a>
		</div>
		<div class="container-fluid">
			<form method="post" action="add_universities.php">
				<div class="col-sm-1"></div>
				<div class="col-sm-11 container-fluid">
					<div class="form-group row">
						<div class="col-sm-4">
							<div class="ui-widget">
								Country: <input type="text" name="country" id="country" class="form-control">
							</div>
						</div>
						<div class="col-sm-4">
							University: 
							<input type="text" name="university" id="university" class="form-control">
						</div>
						<div class="col-sm-2" align="right">
							<br>
							<input type="submit" value="Submit" class="btn btn-block btn-primary">
						</div>
					</div>	
				</div>
			</form>
		</div>
		</div>
	</body>
	<script>
	$(document).ready(function() {
		var val = <?php echo $res ?>;
		
		$("#country").autocomplete({
			source: val
		});
		
	});		
	</script>
</html>