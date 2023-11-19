<?php

class MySQLdb
{
    private $host="localhost";
    private $usuario="root";
    private $password="1234";
    private $db="consultorio";
    private $port="3308";
    private $conn;
    

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->usuario, $this->password, $this->db, $this->port);
        
        if (mysqli_connect_errno()) {
            # code...
            print"Error en la conexion a la BD";
            die(); //lo mismo seria poner exit
        } else  {
            // print"Exito al conectar";
        }

        if (mysqli_set_charset($this->conn, "utf8")) {
            # code...
            // print"El conjunto de caracteres es ".mysqli_character_set_name($this->conn)."<br>";
        } else  {
            print"Error en la conversion de caracteres en la BD";
            die();
        }
    }
    public function query($sql = '') {
        $data = [];
        $r = mysqli_query($this->conn, $sql);
        if ($r) {
            # code...
            if (mysqli_num_rows($r) > 0) {
                # code...
                $data = mysqli_fetch_assoc($r);
            }
        }
        return $data;
    }
}

?>