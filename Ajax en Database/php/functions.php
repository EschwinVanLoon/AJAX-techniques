<?php	
include_once 'config.php';

function makeConnection() : PDO {
	static $pdo = false;
	if ($pdo) {return $pdo;}
	
	// Verbinding maken met de database
	$host     = DB_HOST;
	$dbname   = DB_NAME;
	$user     = DB_USER;
	$password = DB_PASS;
	$charset  = 'utf8mb4';

	// Hulpvariabelen voor het verbinden
	$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
	$options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];

	// Maak een nieuwe database verbinding aan
	$pdo = new PDO($dsn, $user, $password, $options);
	$pdo->exec("SET sql_mode='traditional';");
	
	return $pdo;
}

function getUsers(PDO $pdo) : array {
	$ps = $pdo->prepare("SELECT * FROM users ORDER BY id DESC");
	$ps->execute();	
	return $ps->fetchAll();
}

function registerUser(PDO $pdo, $firstName, $lastName, $userName, $password) {
	$hash = password_hash($password, PASSWORD_DEFAULT);
	
	$ps = $pdo->prepare("INSERT INTO users (firstName, lastName, userName, password)
						 VALUES (:fn, :ln, :us, :pw)");
	$ps->execute([
		':fn' => $firstName,
		':ln' => $lastName,
		':us' => $userName,
		':pw' => $hash
	]);
}	
	
function showUsers($data){
	foreach($data as $key => $value){
		echo '<article>';
			echo '<h2>Gebruiker '.$value['id'].': '.$value['userName'].'</h2>';
			echo '<h3>Voornaam: '.$value['firstName'].'</h3>';	
			echo '<h3>Achternaam: '.$value['lastName'].'</h3>';	
		echo '</article>';	
		echo '<hr>';	
	}
}
	
?>