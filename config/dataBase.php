<?php
class Database{

    public static function connect($database='restauracion',$username='root',$password='',$hostname='localhost'){
        // Create a database connection
        $conn = new mysqli($hostname, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }else{
            return $conn;
        }

    }

    public static function close($conn){
        $conn->close();
    }

}

?>