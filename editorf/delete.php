<?php
	$delId = $_POST['id'];
	if (!empty($delId)) {
		$mysqli = mysqli_connect("127.0.0.1", "root", "", "webtech");
		$mysqli->set_charset("utf8");
		$result = $mysqli->query("DELETE FROM notes
			WHERE id = '".$delId."'; ");
		$mysqli->close();
	}
	header('Location: /?mid=0');
	exit;
?>