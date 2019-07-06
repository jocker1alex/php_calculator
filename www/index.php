<?php
require_once 'calc.php';
session_start();
if($_POST){
  $btn = array_shift($_POST); //Извлечь первый элемент массива
  getClickBtn($btn);
}
session_write_close();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Калькулятор</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="allpage">
      <div class="header">
        <div class="title">
          <h1>Тестовое задание #</h1>
        </div>
      </div>
      <div class="left">
      </div>
      <div class="center">
        <div class="top">
          <h2>Калькулятор</h2>
        </div>
        <div class="mainbody">
          <form class="" action="" method="post">
            <div class="calc calc-txt">
              <textarea class="" id="result" col="24" rows="3" wrap="off" placeholder="0" readonly><?=$_SESSION['textarea1'] . PHP_EOL . $_SESSION['textarea2']. PHP_EOL .$_SESSION['textarea3']?></textarea>
            </div>
            <div class="calc calc-btn-lvl1">
              <input class="calc-btn calc-btn-spec" type="submit" name="btn_calc" id="btn_backspace" value="backspace">
              <input class="calc-btn calc-btn-spec" type="submit" name="btn_calc" id="btn_C" value="C">
              <input class="calc-btn calc-btn-act" type="submit" name="btn_calc" id="btn_div" value="/">
            </div>
            <div class="calc calc-btn-lvl2">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_7" value="7">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_8" value="8">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_9" value="9">
              <input class="calc-btn calc-btn-act" type="submit" name="btn_calc" id="btn_mult" value="*">
            </div>
            <div class="calc calc-btn-lvl2">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_4" value="4">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_5" value="5">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_6" value="6">
              <input class="calc-btn calc-btn-act" type="submit" name="btn_calc" id="btn_sub" value="-">
            </div>
            <div class="calc calc-btn-lvl2">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_1" value="1">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_2" value="2">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_3" value="3">
              <input class="calc-btn calc-btn-act" type="submit" name="btn_calc" id="btn_add" value="+">
            </div>
            <div class="calc calc-btn-lvl2">
              <input class="calc-btn calc-btn-num" type="submit" name="btn_calc" id="btn_0" value="0">
              <input class="calc-btn calc-btn-sign" type="submit" name="btn_calc" id="btn_point" value=".">
              <input class="calc-btn calc-btn-result" type="submit" name="btn_calc" id="btn_result" value="=">
            </div>
          </form>
        </div>
        <div class="bottom">
          <br>
        </div>
      </div>
      <div class="right">
      </div>
      <div class="footer">
        <div class="copyright">
          <p>jocker1alex &copy; 2019</p>
        </div>
      </div>
    </div>
  </body>
</html>
