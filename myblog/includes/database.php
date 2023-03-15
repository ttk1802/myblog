<?php
    class Database{
        private $dns = "mysql:host=bpqgrzo6r1z84tkflilr-mysql.services.clever-cloud.com;dbname=bpqgrzo6r1z84tkflilr";
        private $username = "uorgoshnxw4sokkp";
        private $password = "sFbOSjsweOAqbVu5r7fo";
        private $conn;

        public function connect(){
            $this->conn = null;
            try{
                $this->conn = new PDO($this->dns, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
            return $this->conn;
        }
    }
    


?>