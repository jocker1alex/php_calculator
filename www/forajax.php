<?php

require_once 'db_class.php';

$_POST = json_decode(file_get_contents("php://input"), true);

if(isset($_POST['str'])) {

  $calcbase = new Database("localhost", "calcuser", "CaLcUlAtOr", "calcbase");

  $calcbase->connect();

  if($_POST['str'] != 'last_results') {
    $calcbase->insert($_POST['str'], calc($_POST['str']));
  }

  $calcbase->last(5, 'DESC');

  $calcbase->close();

  echo json_encode($calcbase->getRequest());

} else {
  echo '';
}

function calc($str) {
  @eval('$str = '.$str.';');
  if(is_infinite($str) || is_nan($str)) {
    $str = 'Делить на ноль нельзя!';
  }
  return $str;
}

?>
