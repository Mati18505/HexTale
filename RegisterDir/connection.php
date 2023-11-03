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

    //$webpage = new Database('172.28.223.161', 'postgres', 'Mateusz1234', 'webpage');
    //$game = new Database('172.28.223.161', 'postgres', 'Mateusz1234', 'game');
    $webpage = new Database('144.24.178.177', 'postgres', 'NosTaleTeczkaPriv', 'webpage');
    $game = new Database('144.24.178.177', 'postgres', 'NosTaleTeczkaPriv', 'game');
?>