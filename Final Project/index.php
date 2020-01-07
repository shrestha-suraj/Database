<?session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<?php
					$countries= [
		"Afghanistan",
		"Albania",
		"Algeria",
		"Andorra",
		"Angola",
		"Antigua and Barbuda",
		"Argentina",
		"Armenia",
		"Australia",
		"Austria",
		"Azerbaijan",
		"Bahamas",
		"Bahrain",
		"Bangladesh",
		"Barbados",
		"Belarus",
		"Belgium",
		"Belize",
		"Benin",
		"Bhutan",
		"Bolivia",
		"Bosnia and Herzegovina",
		"Botswana",
		"Brazil",
		"Brunei",
		"Bulgaria",
		"Burkina Faso",
		"Burundi",
		"Cambodia",
		"Cameroon",
		"Canada",
		"Cape Verde",
		"Central African Republic",
		"Chad",
		"Chile",
		"China",
		"Colombi",
		"Comoros",
		"Congo (Brazzaville)",
		"Congo",
		"Costa Rica",
		"Cote d'Ivoire",
		"Croatia",
		"Cuba",
		"Cyprus",
		"Czech Republic",
		"Denmark",
		"Djibouti",
		"Dominica",
		"Dominican Republic",
		"East Timor (Timor Timur)",
		"Ecuador",
		"Egypt",
		"El Salvador",
		"Equatorial Guinea",
		"Eritrea",
		"Estonia",
		"Ethiopia",
		"Fiji",
		"Finland",
		"France",
		"Gabon",
		"Gambia, The",
		"Georgia",
		"Germany",
		"Ghana",
		"Greece",
		"Grenada",
		"Guatemala",
		"Guinea",
		"Guinea-Bissau",
		"Guyana",
		"Haiti",
		"Honduras",
		"Hungary",
		"Iceland",
		"India",
		"Indonesia",
		"Iran",
		"Iraq",
		"Ireland",
		"Israel",
		"Italy",
		"Jamaica",
		"Japan",
		"Jordan",
		"Kazakhstan",
		"Kenya",
		"Kiribati",
		"Korea, North",
		"Korea, South",
		"Kuwait",
		"Kyrgyzstan",
		"Laos",
		"Latvia",
		"Lebanon",
		"Lesotho",
		"Liberia",
		"Libya",
		"Liechtenstein",
		"Lithuania",
		"Luxembourg",
		"Macedonia",
		"Madagascar",
		"Malawi",
		"Malaysia",
		"Maldives",
		"Mali",
		"Malta",
		"Marshall Islands",
		"Mauritania",
		"Mauritius",
		"Mexico",
		"Micronesia",
		"Moldova",
		"Monaco",
		"Mongolia",
		"Morocco",
		"Mozambique",
		"Myanmar",
		"Namibia",
		"Nauru",
		"Nepal",
		"Netherlands",
		"New Zealand",
		"Nicaragua",
		"Niger",
		"Nigeria",
		"Norway",
		"Oman",
		"Pakistan",
		"Palau",
		"Panama",
		"Papua New Guinea",
		"Paraguay",
		"Peru",
		"Philippines",
		"Poland",
		"Portugal",
		"Qatar",
		"Romania",
		"Russia",
		"Rwanda",
		"Saint Kitts and Nevis",
		"Saint Lucia",
		"Saint Vincent",
		"Samoa",
		"San Marino",
		"Sao Tome and Principe",
		"Saudi Arabia",
		"Senegal",
		"Serbia and Montenegro",
		"Seychelles",
		"Sierra Leone",
		"Singapore",
		"Slovakia",
		"Slovenia",
		"Solomon Islands",
		"Somalia",
		"South Africa",
		"Spain",
		"Sri Lanka",
		"Sudan",
		"Suriname",
		"Swaziland",
		"Sweden",
		"Switzerland",
		"Syria",
		"Taiwan",
		"Tajikistan",
		"Tanzania",
		"Thailand",
		"Togo",
		"Tonga",
		"Trinidad and Tobago",
		"Tunisia",
		"Turkey",
		"Turkmenistan",
		"Tuvalu",
		"Uganda",
		"Ukraine",
		"United Arab Emirates",
		"United Kingdom",
		"United States",
		"Uruguay",
		"Uzbekistan",
		"Vanuatu",
		"Vatican City",
		"Venezuela",
		"Vietnam",
		"Yemen",
		"Zambia",
		"Zimbabwe"
    ];
					if(isset($_GET['signup']) && $_GET['signup']==true){
						echo "<form class='login100-form validate-form' action='authentication/signup.php' method='POST'>
					<span class='login100-form-title p-b-59'>
						Sign Up
					</span>

					<div class='wrap-input100 validate-input' data-validate='Name is required'>
						<span class='label-input100'>Full Name</span>
						<input class='input100' type='text' name='name' placeholder='Name...'>
						<span class='focus-input100'></span>
					</div>
					<div class='wrap-input100 validate-input' data-validate='Name is required'>
						<span class='label-input100'>Age</span>
						<input class='input100' type='number' name='age' placeholder='Age...'>
						<span class='focus-input100'></span>
					</div>

					<div class='wrap-input100 validate-input' data-validate='Valid email is required: ex@abc.xyz>
						<span class='label-input100'>Email</span>
						<input class='input100' type='text' name='email' placeholder='Email addess...'>
						<span class='focus-input100'></span>
					</div>

					<div class='wrap-input100 validate-input' data-validate='Username is required'>
						<span class='label-input100'></span>Username</span>
						<input class='input100' type='text' name='username' placeholder='Username...'>
						<span class='focus-input100'></span>
					</div>

					<div class='wrap-input100 validate-input' data-validate='Password is required'>
						<span class='label-input100'>Password</span>
						<input class='input100' type='password' name='pass' placeholder='*************'>
						<span class='focus-input100'></span>
					</div>

					<div class='wrap-input100 validate-input'>
						<span class='label-input100'>Address</span>
						<input class='input100' type='text' name='address' placeholder='Address'>
						<span class='focus-input100'></span>
					</div>
					<div class='wrap-input100 validate-input'>
						<span class='label-input100'>Country</span>
						<select class='input100' name='country' placeholder='Address'>
						<option></option>";
						foreach($countries as $country){
							echo "<option style='color:black;' value='".${country}."'>".${country}."</option>";
						}
					echo "
						</select>
						<span class='focus-input100'></span>
					</div>

					<div class='flex-m w-full p-b-33'>
						<div class='contact100-form-checkbox'>
							<input class='input-checkbox100' id='ckb1' type='checkbox' name='remember-me'>
							<label class='label-checkbox100' for='ckb1'>
								<span class='txt1'>
									I agree to the
									<a href='html/termsofuse.html' class='txt2 hov1'>
										Terms of User
									</a>
								</span>
							</label>
						</div>
					</div>

					<div class='container-login100-form-btn'>
						<div class='wrap-login100-form-btn'>
							<div class='ogin100-form-bgbtn'></div>
							<input type='submit' class='login100-form-btn' style='background-color:green;' value='Register'/>
						</div>

						<a href='index.php' class='dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30'>
							Sign in
							<i class='fa fa-long-arrow-right m-l-5'></i>
						</a>
					</div>
				</form>";
						
					}
				else{
					echo "
						<form class='login100-form validate-form' action='authentication/login.php' method='POST'>
					<span class='login100-form-title p-b-59'>
						Login
					</span>
					<div class='wrap-input100 validate-input' data-validate='Username is required'>
						<span class='label-input100'>Username</span>
						<input class='input100' type='text' name='username' placeholder='Username...'>
						<span class='focus-input100'></span>
					</div>

					<div class='wrap-input100 validate-input' data-validate='Password is required'>
						<span class='label-input100'>Password</span>
						<input class='input100' type='password' name='pass' placeholder='*************'>
						<span class='focus-input100'></span>
					</div>
					<div class='container-login100-form-btn'>
						<div class='wrap-login100-form-btn'>
							<div class='login100-form-bgbtn'></div>
							<input style='background-color:green;' class='login100-form-btn' value='Login' type='submit'/>
						</div>
						<a href='index.php?signup=true' class='dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30'>
							Sign Up
							<i class='fa fa-long-arrow-right m-l-5'></i>
						</a>
					</div>
				</form>";
				}
				?>
				
			</div>
		</div>
	</div>
	<?php
		if (isset($_GET['account']) && $_GET['account']==0){
			echo "<script>alert('Cannot verify Login Credentials.')</script>";
		}
		if (isset($_GET['account']) && $_GET['account']==1){
			echo "<script>alert('Email or Username already taken.')</script>";
		}
		if (isset($_GET['account']) && $_GET['account']==false){
			echo "<script>alert('Wrong password')</script>";
		}
		if(isset($_GET['registered']) && $_GET['registered']==true){
			echo "<script>alert('Thank You for registration. Please Login with the credentials.')</script>";
		}
	?>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>

</html>