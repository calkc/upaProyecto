<?php

    class db {
        private $dbhost = 'y2w3wxldca8enczv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        private $dbuser = 'hq0uu1lh61z9l0br';
        private $dbpass = 't2919fwobev4dklj';
        private $dbname = 'nrm0t8gdg6uch1z6';
        //cnnect
        public function connect ( ){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname;";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }