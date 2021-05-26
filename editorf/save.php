<?php
	if (!empty($_POST['text'])) {
		$mysqli = mysqli_connect("127.0.0.1", "root", "", "webtech");
		$mysqli->set_charset("utf8");
		$result = $mysqli->query("SELECT *
			FROM notes
			WHERE id = '".$_POST['id']."' OR note = '".$_POST['text']."'; ");
		$row = $result->fetch_assoc();
		$id = $row['id'];
		if ($id <= 0) {
			$mysqli->query("INSERT INTO notes (uid, mid, folder, note, date)
			VALUES ('1', '".$_POST['mid']."', '1', '".$_POST['text']."', now()); ");
		} else {
			$mysqli->query("UPDATE notes
			SET note = '".$_POST['text']."', date = now()
			WHERE id = '".$_POST['id']."';");
		}
		$result->close();
		$mysqli->close();
	}
	header('Location: /?mid='.$_POST['mid']);
	exit;
?>