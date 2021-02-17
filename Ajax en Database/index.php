<!DOCTYPE html>
<html>
	<head>
		<title>t09m04o03</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/script.js"></script>
	</head>
	<body>
		<div id="errors"></div>
		<form id="form" method="post">
			<fieldset>
				<legend>Registratie formulier</legend>
				<label for="firstName">Voornaam:</label><br>
				<input id="firstName" type="text" ><br>
				<label for="lastName">Achternaam:</label><br>
				<input id="lastName" type="text" ><br>
				<label for="userName">Gebruikersnaam:</label><br>
				<input id="userName" type="text" ><br>
				<label for="password">Wachtwoord:</label><br>
				<input id="password" type="password" ><br>
				<label for="confirmPass">Herhaal wachtwoord:</label><br>
				<input id="confirmPass" type="password" ><br>
				<input id="register" type="button" value="Registreer"><br>
			</fieldset>
		</form>
		<hr>
		<div id="users"></div>
	</body>
</html>