<?php

class Database  {
    private $link;
    private $request;
    private $host;
    private $user;
    private $pass;
    private $dbase;

  function __construct($host, $user, $pass, $dbase) {
      $this->link = false;
      $this->request = '';
      $this->host = $host;
      $this->user = $user;
      $this->pass = $pass;
      $this->dbase = $dbase;
  }

  function __destruct() {
  }

  public function getRequest() {
      return $this->request;
  }

  public function connect() {
      $this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->dbase);
      if (!$this->link) {
          die('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
      }
      return true;
  }

  public function insert($formula, $result) {
      if($this->link) {
          $formula = mysqli_real_escape_string($this->link, $formula);
          $result = mysqli_real_escape_string($this->link, $result);
          $query = "INSERT INTO `calclog` (`formula`, `result`) VALUES ('$formula', '$result')";
          return mysqli_query($this->link, $query);
      }
      return false;
  }

  public function last($limit, $sort) {
      if($this->link) {
          $rows = array();
          $query = "SELECT `formula`, `result` FROM `calclog` ORDER BY `id` $sort LIMIT $limit";
          if($result = mysqli_query($this->link, $query)) {
              while($row = $result->fetch_assoc()) {
                  $rows[] = $row;
          }
          mysqli_free_result($result);
          $this->request = $rows;
        }
        return true;
      }
      return false;
  }

  public function close(){
    if($this->link) {
        mysqli_close($this->link);
        $this->link = false;
    }
  }

}

?>
