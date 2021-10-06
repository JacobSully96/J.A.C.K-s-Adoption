<?php
//require_once('config.php');


function NewConnection()
{
//    $connection = new mysqli("localhost", 'ics325su2115', "8348", 'ics325su2115');
    $connection = new mysqli("localhost", 'root', "", 'mySite');

    if ($connection->connect_errno) {
        echo "Failed to connect to MySQL: " . $connection->connect_error;
        exit();
    }

    return $connection;

}

//class database
//{
//
//    protected $user = 'root';
//    protected $password = "";
////    protected $db = "site2";
//    protected $db = "mySite";
//    protected $config;
//    protected $cn;
//
//    public function __set($attribute, $value)
//    {
//        if (property_exists($this, $attribute)) {
//            $this->$attribute = $value;
//            echo "Updated {$attribute} to {$value}";
//        } else {
//            echo "Failed to update {$attribute}.";
//        }
//    }
//
//    public function __get($name)
//    {
//        return $this->$name;
//    }
//
//    public function __construct()
//    {
//        $config = new configuration();
//        $this->db = $config->db;
//        $this->user = $config->username;
//        $this->password = $config->password;
//        $this->config=$config;
//    }
//
//    function NewConnection(){
//        $connection = new mysqli("localhost", $this->user, $this->password, $this->db);
//
//        if($connection->connect_errno){
//            echo "Failed to connect to MySQL: ".$connection->connect_error;
//            exit();
//        }
//
//        $this->cn=$connection;
//        return $this->cn;
//
//    }
//
//    public function getAll($query){
//        $cn = $this->cn;
//        if($query==""){
//            return "Error: $query cannot be blank";
//        }
//        $result = $cn->query($query);
//        $array = $result->fetch_all(MYSQLI_ASSOC);
//        $result->free_result();
//        return $array;
//    }
//
//
//    public function getArray($query){
//        $cn = $this->cn;
//        if($query==""){
//            return "Error: $query cannot be blank";
//        }
//        $result = $cn->query($query);
//        $array = $result->fetch_array(MYSQLI_ASSOC);
//        $result->free_result();
//        return $array;
//    }
//
//    public function closeConnection(){
//        $this->cn->close();
//    }
//
//}
//
//$db = new database();
//$cn = $db-> NewConnection();