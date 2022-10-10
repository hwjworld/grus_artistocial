<?php
require_once(__DIR__."/../config/db_properties.php");
global $db_username, $db_password;

class Db{
    public $servername = "localhost";
    public $username = $db_username;
    public $password = $db_password;
    public $dbname = "artistocial";

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


    public function preparedStatment($sql, $type, ...$modelData){
        // var_dump($modelData);
        if(is_null($modelData)){
            error_log("model insert model NULL data");
            return null;
        }
        return $this->insertPrepared($sql, $type, ...$modelData);
    }

    /**
     * i: int
     * d: float
     * s: string
     * b: blob
     */
    public function insertPrepared($sql, $types, $data){
        
        foreach($data as $k=>$v){
            if(is_array($v)){ // 可能是对象是数组, 不支持二级数组
                $data[$k] = trim(implode(",", $v));
            }elseif(is_null($v) or is_string($v)){
                $data[$k] = trim($v); // 可能有值是NULL
            }
        }
        $conn = self::getConn();
        $result = true;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$data);
        $result = $stmt->execute();
        $stmt->close();
        self::closeConn($conn);
        echo "New records created successfully";
        return $result;
    }
}

// $db = new Db();
// var_dump($db->query("select * from artsytoken"));
?>