<?php
class Db{
    public string $servername = "localhost";
    public string $username = "root";
    public string $password = "root";
    public string $dbname = "artistocial";

    public function getConn(){

        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function closeConn($conn){
        $conn->close();
    }

    public function query($sql){
        $conn = self::getConn();
        $result = $conn->query($sql);
        
        $data = array();
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            // echo "token: " . $row["token"]. " - expiredate: " . $row["expiredate"]. "<br>";
            $data[] = $row;
          }
        } 
        self::closeConn($conn);
        return $data;
    }   

    public function insert($sql){
        $conn = self::getConn();
        $result = true;
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            $result = false;
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        self::closeConn($conn);
        return $result;
    }   
}

// $db = new Db();
// var_dump($db->query("select * from artsytoken"));
?>