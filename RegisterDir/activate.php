<?php
require_once("connection.php");

class PlayerInfo {
	public $username;
	public $password;
}

$con = $webpage->GetConnection();

if (isset($_GET['email'], $_GET['code'])) {
	$email = $_GET['email'];
	$code = $_GET['code'];

	if(AccountExist($email, $code, $con)) {
		if(ActivateAccount($email, $code, $con))
		{
			$playerInfo = GetGameInfo($email, $con);
			if(AddPlayer($playerInfo))
				header("location: ../email-confirmed.php");
			else
				echo 'There was an error adding your account to game database! Please contact us.';
		}
		else
			echo 'The account is already activated!';
	}
	else
		echo 'The account is already activated or doesn\'t exist!';
}

function AccountExist($email, $code, $con) : bool {
	if ($stmt = pg_prepare($con, "query", 'SELECT * FROM "public"."accounts" WHERE email = $1 AND activation_code = $2')) {
		$result = pg_execute($con, "query", array($email, $code));
		return pg_num_rows($result) > 0;
	}
	else {
		exit ("Failed to query the database!");
	}
}
function ActivateAccount($email, $code, $con) : bool {
	if ($stmt = pg_prepare($con, "activate", 'UPDATE accounts SET activation_code = $1 WHERE email = $2 AND activation_code = $3')) {
		$newcode = 'activated';
		pg_execute($con, "activate", array($newcode, $email, $code));
		return true;
	}
	else {
		return false;
	}
}
function GetGameInfo($email, $con) : PlayerInfo {
	$playerInfo = new PlayerInfo;
	if ($stmt = pg_prepare($con, "getGameInfo", 'SELECT username, "password" FROM "public"."accounts" WHERE EMAIL = $1')) {
		$result = pg_execute($con, "getGameInfo", array($email));
		$row = pg_fetch_array($result);
		$playerInfo->username = $row['username'];
		$playerInfo->password = $row['password'];
	}
	return $playerInfo;
}
function AddPlayer(PlayerInfo $playerInfo) : bool {
	global $game;
	$con = $game->getConnection();
	if ($stmt = pg_prepare($con, 'addPlayer', 'INSERT INTO "accounts"."accounts" ("Name", "Password", "MasterAccountId", "Authority", "Language", "BankMoney", "IsPrimaryAccount") VALUES ($1, $2, $3, 0, 0, 0, false);')) {
		pg_execute($con, "addPlayer", array($playerInfo->username, $playerInfo->password, "f6a16ff7-4a31-11eb-be7b-8344edc8f36b"));
		return true;
	}
	return false;	
}

?>