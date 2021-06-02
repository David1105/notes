<?php
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  $db = "webtech"; // название таблицы
  $mysqli = mysqli_connect($servername, $username, $password, $db);

  $mysqli->set_charset("utf8");
  $mysqli->query("CREATE TABLE users (
  uid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  mail VARCHAR(32) NOT NULL,
  pass VARCHAR(32) NOT NULL
  )");

  $mysqli->query("CREATE TABLE notes (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  uid INT(6) NOT NULL,
  mid INT(6) NOT NULL,
  folder INT(1) NOT NULL,
  note TEXT NOT NULL,
  date DATETIME
  )");
  $mysqli->close();
?>
