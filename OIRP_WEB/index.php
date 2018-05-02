<?php
	include 'loginPhp.php';
	error_reporting(0);
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
        <link rel="icon" href="img/ust.png" type="image/png" sizes="196x196">
		<title>OIRP</title>
	</head>
	<body style="background-color: white;">
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script src="bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js"></script>
		
			<nav class="header navbar">
				<div class="navbar-header">
					<div class="col-sm-7"><a class="" href="index.php"><img src='img/logo.png' height=auto class="img-responsive"></a></div>
					<div class="col-sm-5" style="margin-top: 50px;">
						<form method="post" class="navbar-form" >
							<div class="form-group">
								<input type="text" name="email" class="input form-control shadow" placeholder="Email or Username" pattern="[^<>].{1,30}" required/>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="input form-control shadow" placeholder="Password" required/>
							</div>
							<div class="form-group">
								<button type="submit" name="btn_login" class="btn btn-info btn-block shadowbtn">Login</button>
							</div>
							<div class="form-group">
								or <a href="register.php"><u>Register</u></a>
							</div>
						</form>
						<small><b>Note:</b> for students, please use your birthday <b>(mm/dd/yyyy)</b> as your password</small>
					</div>
				</div>
			</nav>
			
			<div class="main">
				<div class="">
					<img src='img/arch.jpg' width=100% height=auto class="image-home">
				</div>
			<!-- div class="container-fluid three">
				<div class="col-sm-4 threepanel">
					<div class="">
						<h2 class="txtStyle"><b>UST Identity</b></h2>
						<p>The University of Santo Tomas, the Pontifical, Royal, and Catholic University of the Philippines, is a Dominican institution of learning founded in 1611, under the patronage of St. Thomas Aquinas.</p>
					</div>
				</div>
				<div class="col-sm-4 threepanel">
					<div class="">
						<h2 class="txtStyle"><b>Mission</b></h2>
						<p>The University, in pursuit of truth, guided by reason and illumined by faith, dedicates herself to the generation, advancement, and transmission of knowledge to form competent and compassionate professionals, committed to the service of the Church, the nation, and the global community.</p>
					</div>
				</div>
				<div class="col-sm-4 threepanel">
					<div class="">
						<h2 class="txtStyle"><b>Vision</b></h2>
						<p>Faithful to its centuries-old tradition of excellence, the University of Santo Tomas envisions itself as a premier Catholic institution of learning in Asia, committed to the professional and moral formation of her stakeholders for social transformation.</p>
					</div>
				</div>
			</div>
			
			<div class="content col-sm-9">
				<span class="" style="padding-left: 50px; float: inherit;">
					<h2>About UST</h2>
					<br>
					<p>The University of Santo Tomas is one of the top four universities in the Philippines and is consistently ranked among the top 1000 universities in the whole world. UST is both timeless, owing to its more than four hundred years of quality Catholic education, and timely, as it continuously responds to the needs of the present.</p>
					<p>While the University of Santo Tomas holds the distinction of being Asia's oldest existing university, its age is coupled with its preeminence in Philippine education. Not only does it boast of several firsts in the different realms of education, it also has administrators and faculty members who are holding leadership positions in the Philippines' policy-making bodies and professional organizations, helping influence policies for the betterment of the society in general.</p>
					<br>
					<p>More about <a href="" onclick="window.open('http://www.ust.edu.ph/')">UST</a></p>
					<br>
					<h2>About OIRP</h2>
					<br>
					<p>Internationalization is a thrust of the University of Santo Tomas, in its attempt to foster mutually beneficial and enriching partnerships with educational institutions, associations, and consortia. Such a thrust has several facets: student mobility, academic and administrative staff mobility, program mobility, research collaboration, and the conduct of joint scientific/academic activities.</p>
					<p>All these are facilitated by the Office of International Relations and Programs (OIRP), established in 2013. The OIRP liaises with the different faculties, colleges, institutes, and schools, which have their own Internationalization Coordinators, for the efficient management of the University's linkages.</p>
					<br>
					<p>More about <a href="" onclick="window.open('http://www.ust.edu.ph/linkages/internationalization-2/')">OIRP</a></p>
				</span>
			</div>
				
			<div class="col-sm-3 pull-sm-right login">
					<br>
					<h3 style="text-align: center">LOGIN</h3>
					
					<br>
					<form method="post">
						<div class="form-group">
							<input type="text" name="email" class="input form-control" placeholder="Enter Email or Username" pattern="[^<>].{1,30}" required/>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="input form-control" placeholder="Enter Password" required/>
						</div>
						<button type="submit" name="btn_login" class="button btn btn-block btn-primary">Login</button>
						<p style="text-align: center">OR</p>
					</form>
					<form action="register.php">
						<button type="submit" class="button btn btn-block btn-primary">Register</button>
					</form>
					<br>
					<p>*Note: for students, please use your birthday <b>(mm/dd/yyyy)</b> as your password.</p>
					<br>
				</div>
				<! div class="col-sm-3 login" style="background-color: #00a1e4;>
				<div class="col-sm-3 login info">
					<br>
					<h3 style="text-align: center">CONTACT US</h3><br>
					<p>Office of International Relations and Programs<br>
					Espana Blvd., Sampaloc, Manila, Philippines 1015<br>
					406-1611 local 8658<br>
					international@ust.edu.ph</p>
					<br>
				</div>
			</div-->
			<?php echo $error_message?>
			<div class="footer">
					&copy; University of Santo Tomas 2018
			</div>
		</div>
	</body>
</html>