<?php
class database {
  private $hostName = "localhost";
  private $userName = "root";
  private $password = "";
  private $dbName = "form_db";

  public function sendMessage($name = "", $email = "", $message = "") {
    $result =  "Error";
    $query = "INSERT INTO submission(name, email, comments) VALUE('$name', '$email', '$message');";
    $conn = mysqli_connect($this->hostName, $this->userName, $this->password, $this->dbName);
    if (mysqli_query($conn, $query)) {
      $result =  "Query submitted successfully!";
    }
    mysqli_close($conn);
    return $result;
  }

  public function auth($username, $password) {
    $auth_user = false;
    $query = "SELECT * FROM users WHERE user_name='$username' AND passwd='$password'";
    $conn = mysqli_connect($this->hostName, $this->userName, $this->password, $this->dbName);
    if ($res = mysqli_query($conn, $query)) {
      $auth_user = mysqli_fetch_array($res);
    }
    mysqli_close($conn);
    return $auth_user;
  }

  public function readQuery($username, $password) {
    if (!$this->auth($username, $password)){ return "User not authenticated!";}
    $query = "SELECT name, email, comments FROM submission ORDER BY submission_date";
    $conn = mysqli_connect($this->hostName, $this->userName, $this->password, $this->dbName);
    if ($res = mysqli_query($conn, $query)) {
      while ($row = mysqli_fetch_array($res)){
        $data[] = $row; 
      }
    }
    mysqli_close($conn);
    return $data;
  }
}
?>