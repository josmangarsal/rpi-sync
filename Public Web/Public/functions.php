<?php
function connect() {
	if (! ($link = mysql_connect("db_url","db_user","db_pass"))) {
		echo "Error conectando a la base de datos.";
		exit ();
	}
	if (! mysql_select_db ("db_name", $link)) {
		echo "Error seleccionando la base de datos.";
		exit ();
	}
	mysql_query ("SET NAMES utf8");
}

function login($user, $pass) {
	if (($user != NULL) && ($pass != NULL)) {
		if (checkUser ( $user, $pass ) == true) {
			session_start ();
			$_SESSION ['user'] = $user;
			$_SESSION ['pass'] = $pass;
			return true;
		} else {
			return false;
		}
	}
}

function checkUser($user, $pass) {
	conectar ();
	$query = mysql_query ( "SELECT * FROM pi_raspberry WHERE user='$user' AND pass='$pass'" );
	if (mysql_num_rows ( $query ) == 1) {
		return true;
	}
	return false;
}

function getIP() {
	connect ();
	$user = $_SESSION ['user'];
	$pass = $_SESSION ['pass'];
	$query = mysql_query ( "SELECT ip FROM pi_raspberry WHERE user='$user' AND pass='$pass'" );
	if (mysql_num_rows ( $query ) != 0) {
		$data = mysql_fetch_array ( $query );
		return $data ["ip"];
	}
}

function getLastUpdate() {
	connect ();
	$user = $_SESSION ['user'];
	$pass = $_SESSION ['pass'];
	$query = mysql_query ( "SELECT lastupdate FROM pi_raspberry WHERE user='$user' AND pass='$pass'" );
	if (mysql_num_rows ( $query ) != 0) {
		$data = mysql_fetch_array ( $query );
		return $data ["lastupdate"];
	}
}
?>
