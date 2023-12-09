<?php
    class Database {
        private $con;

        function __construct($host, $user, $pass, $name) {
            $this->con = pg_connect("host=$host dbname=$name user=$user password=$pass");
            if (!$this->con) {
                exit('Failed to connect to PostgreSQL: ' . pg_last_error());
            }
        }

        function __destruct() {
            pg_close($this->con);
        }

        function GetConnection() {
            return $this->con;
        }
    }
    define('PRIVATE_INCLUDE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/../PrivateInclude');
    $connectionCredentials = json_decode(file_get_contents(PRIVATE_INCLUDE_DIR . '/database.json'), true);
    $host = $connectionCredentials["host"];
    $user = $connectionCredentials["user"];
    $pass = $connectionCredentials["pass"];
    
    $webpage = new Database($host, $user, $pass, 'webpage');
    $game = new Database($host, $user, $pass, 'HexTaleDB');
?>