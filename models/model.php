<?php

class model {
    
    function __construct(){
        $host = "localhost";
        $username = "root";
        $password = "";
        $db = "crudoop";
        $this->db = new mysqli($host, $username, $password, $db);
    }
    
    function get($table){
        $sql = "SELECT * FROM {$table}";
        $result = $this->db->query($sql);
        $data = array();
        while($row = $result->fetch_object()){
            $data[] = $row;
        }
        return $data;
    }
    function getSort($table, $sortby, $sorttype){
        $sql = "SELECT * FROM {$table} order by {$sortby} {$sorttype}";
        $result = $this->db->query($sql);
        $data = array();
        while($row = $result->fetch_object()){
            $data[] = $row;
        }
        return $data;
    }
    function getWhere($table, $where){
        $sql = "SELECT * FROM {$table} WHERE $where";
        $result = $this->db->query($sql);
        $data = array();
        while($row = $result->fetch_object()){
            $data[] = $row;
        }
        return $data;
    }
    function insert($table, $values){
        $sql = "INSERT INTO $table VALUES ($values)";
        return $this->db->query($sql);
    }
    function update($table, $set, $where){
        $sql = "UPDATE $table set $set WHERE $where";
        return $this->db->query($sql);
    }
    function delete($table, $where){
        $sql = "DELETE FROM $table WHERE $where";
        return $this->db->query($sql);
    }
    
}

?>