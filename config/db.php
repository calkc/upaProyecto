<?php

    class db {
        private $dbhost = 'iwqrvsv8e5fz4uni.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        private $dbuser = 'fvrj3u6h61o7784h';
        private $dbpass = 'sdge90a611wxv9cb';
        private $dbname = 'aa50fhmbma0hfxk7';
        //cnnect
        public function connect ( ){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname;";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }