<?php
class Database
{

    // Crea una conexión a la base de datos.
    public static function connect($database = 'primor_bbdd', $username = 'root', $password = '', $hostname = 'localhost')
    {
        // Create a database connection
        $conn = new mysqli($hostname, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }

    // Cierra la conexión a la base de datos.
    public static function close($conn)
    {
        $conn->close();
    }
}
