<?
class Conexion {
    private $host = "localhost";
    private $db_name = "dbmodular";
    private $username = "root";
    private $password = "";
    public $connection;

    public function __construct($host, $db_name, $username, $password) {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function getConnection(): PDO {
        $this->connection = null;

        try{
            $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error: ". $e->getMessage();
        }

        return $this->connection;
    }

    public function closeConnection(): void {
        $this->connection = null;
    }
}