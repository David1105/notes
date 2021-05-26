<?php
	if (!empty($_POST['id'])) {
		$mysqli = mysqli_connect("127.0.0.1", "root", "", "webtech");
		$mysqli->set_charset("utf8");
		$result = $mysqli->query("DELETE FROM notes
			WHERE id = '".$_POST['id']."'; ");
		$mysqli->close();
	}
	header('Location: /?mid=0');
	exit;
?>