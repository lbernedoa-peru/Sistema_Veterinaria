<?php
// config/Database.php
class Database {
    private $host = "localhost";
    private $db_name = "sistema_veterinaria"; // Cambia por el nombre real
    private $username = "root"; // Ejemplo: root
    private $password = ""; // Ejemplo: ""
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>