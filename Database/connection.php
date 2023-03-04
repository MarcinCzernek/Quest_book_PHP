<?php

class Database{

    private $host;
    private $db_name;
    private $db_user;
    private $db_password;

  public function connect(){

      $this->host = "localhost";
      $this->db_name = "quest_book_db";
      $this->db_user = "root";
      $this->db_password = "qwerty";

      try{
          $connection = new mysqli($this->host,$this->db_name,$this->db_user,$this->db_password);

          if($connection->connect_errno != 0){
              throw new Exception(mysqli_connect_error());
          }else{
              return $connection;
          }
      }
      catch (Exception $e){
          header('Location: Home.php?error=Connection');
          exit();
      }
  }

  public function query($conn, $query){
     if($reply = mysqli_query($conn, $query)){
         return $reply;
     }else{
         header('Location: Home.php?error=Query');
         exit();
     }
  }

    public function dateFormat($date){
        date_default_timezone_set('Europe/Warsaw');
        $date = $date('M j, h:i:s a',time());
        return $date;
    }

  public function close($conn){
      $conn->close();
  }
}

?>


