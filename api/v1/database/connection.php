<?php

class Database {

    private $host = 'localhost';
    private $database = 'noWayHome';
    private $user = 'root';
    private $password = '';
    private $conn;

    function __construct(){
        $this -> conn = new mysqli($this -> host, $this -> user, $this -> password, $this -> database);
    }

    function get($query){
        $res = $this -> conn -> query($query);
        $result = [];
        while($row = $res -> fetch_object()){
            $result[] = $row;
        }
        return $result;
    }

    function post($query){
        $exec = $this -> conn ->query($query);
        return ["success" => $exec];
    }
}