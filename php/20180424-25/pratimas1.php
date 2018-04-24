
<?php

var_dump($_REQUEST);
$username = $_POST['username'];
$password = $_POST['password'];

login($username, $password);

function login (string $username, string $password) {
if ($username === 'Arunas' && $password === 'Norvaisa') {
	echo 'Pavyko!!!';
} else {
	echo 'Prisijungti nepavyko!';
}
}

?>

