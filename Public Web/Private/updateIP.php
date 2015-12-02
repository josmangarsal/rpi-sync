<?php
$user = $_POST['USER'];
$pass = $_POST['PASS'];
$ip = $_SERVER['REMOTE_ADDR'];

// BD Connection
if (! ($link = mysql_connect("db_url","db_user","db_pass"))) {
	echo "Error connecting DB";
	exit ();
}
if (! mysql_select_db ("db_name", $link)) {
	echo "Error selecting DB";
	exit ();
}
mysql_query ("SET NAMES utf8");

// Check user and pass
if ($user == NULL | $pass == NULL) {
	echo "User/pass wrong";
	exit ();
}

$query = mysql_query("SELECT * FROM pi_sync WHERE user='$user' AND pass='$pass'");
if (mysql_num_rows ( $query ) == 1) {
	// Update IP
	$today = date('Y/m/d H:i:s');
	mysql_query("UPDATE pi_sync SET ip='$ip', lastupdate='$today' WHERE user='$user' AND pass='$pass'") or die("Error update");
}else{
	echo "Error query";
	exit ();
}
?>
