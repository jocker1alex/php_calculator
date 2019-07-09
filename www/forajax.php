<?php
$_POST = json_decode(file_get_contents("php://input"), true);
if(isset($_POST['str'])) {
  echo calc($_POST['str']);
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
