<?php
include('functions.php');

if (isset ( $_POST ["user"] )) {
	$user = $_POST ['user'];
	$pass = md5($_POST ['pass']);

	if ($user == NULL | $pass == NULL) {
		?>
		<script type="text/javascript">
			alert("blank fields");
			history.back(1);
		</script>
	<?php
	} else {
		if (login ( $user, $pass )) {
			header("Location: http://".getIP());
			die();
		} else {
			?>
		<script type="text/javascript">
			alert("Invalid user or pass");
			history.back(1);
		</script>
	<?php
		}
	}
} else {
	?>
		<script type="text/javascript">
			alert("blank fields");
			history.back(1);
		</script>
<?php
}
?>
