<?php

$link = connect_to_database("localhost", "calcuser", "CaLcUlAtOr", "calcbase");

//insert_to_databse('5+5-5', '5', $link);

$json_data = select_from_database(5, 'DESC', $link);

echo $json_data;

mysqli_close($link);

/*
CREATE USER 'calcuser'@'localhost' IDENTIFIED BY 'CaLcUlAtOr';
GRANT SELECT, INSERT ON calcbase.* TO 'calcuser'@'localhost';
FLUSH PRIVILEGES;
*/

function connect_to_database($host, $user, $pass, $dbase) {
  $link = mysqli_connect($host, $user, $pass, $dbase);
  if (!$link) {
      die('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
  }
  return $link;
}

function insert_to_databse($formula, $result, $link) {
  $formula = mysqli_real_escape_string($link, $formula);
  $result = mysqli_real_escape_string($link, $result);
  $query = "INSERT INTO `calclog` (`formula`, `result`) VALUES ('$formula', '$result')";
  return mysqli_query($link, $query);
}

function select_from_database($limit, $sort, $link) {
  $rows = array();
  $query = "SELECT `formula`, `result` FROM `calclog` ORDER BY `id` $sort LIMIT $limit";
  if($result = mysqli_query($link, $query)) {
      while($row = $result->fetch_assoc()) {
          $rows[] = $row;
      }
      mysqli_free_result($result);
  }
  return json_encode($rows);
}

?>
