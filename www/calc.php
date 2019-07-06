<?php
function getClickBtn($btn) {
  $str = '';
  $str =  $_SESSION['textarea1'];
  if($str != '') {
      if(!preg_match('/^[\-0-9*\.+\/]+$/i', $str)) {//защита от "левых" символов в textarea
          $str = '';
          $btn = '';
          $_SESSION = array();
      }
  }
  $numbers = array('0','1','2','3','4','5','6','7','8','9');
  switch(true){
    case $btn == '.':
      if($str!='' && $_SESSION['textarea2'] != '=') {
        if(in_array(substr($str, -1), $numbers, true)) {//проверяем на цифру предыдущий символ
          $str .= $btn;
        }
      }
      break;
    case $btn == 'backspace':
      if($str!='' && $_SESSION['textarea2'] != '=') {
        $str = substr($str, 0, strlen($str)-1);
      }
      break;
    case $btn == 'C':
      $_SESSION = array();
      $str = '';
      break;
    case $btn == '+':
    case $btn == '-':
    case $btn == '/':
    case $btn == '*':
      if($str!='' && $_SESSION['textarea2'] != '=') {
        if(in_array(substr($str, -1), $numbers, true)) {//проверяем на цифру предыдущий символ
          $str .= $btn;
        }
      } else if($_SESSION['textarea2'] == '=' && preg_match('/^[\-0-9*\.+\/]+$/i', $_SESSION['textarea3'])) {
        $str = $_SESSION['textarea3'] . $btn;
        $_SESSION['textarea2'] = '';
        $_SESSION['textarea3'] = '';
      }
      break;
    case in_array($btn, $numbers, true):
      if($_SESSION['textarea2'] != '=') {
        $str .= $btn;
      }
      break;
    case $btn == '=':
      if($str!='' && $_SESSION['textarea2'] != '=') {
        if(in_array(substr($str, -1), $numbers, true)) {//проверяем на цифру предыдущий символ
          $_SESSION['textarea2'] = '=';
          $_SESSION['textarea3'] = calc($str);
        }
      }
      break;
    }
    $_SESSION['textarea1'] = $str;
}

function calc($str) {
  @eval('$str = '.$str.';');
  if(is_infinite($str) || is_nan($str)) {
    $str = 'Делить на ноль нельзя!';
  }
  return $str;
  }
?>
