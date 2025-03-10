<?php 
require("dbvezerlopdo.php");

class Oscar {
    private $db;
    public function __construct(){
        $this->db = new DBController();
    }
    public function getAllOscars(){
        $query = "SELECT m_ID, title, m_desc, pic FROM movie";
        return $this->db->executeSelectQuery($query);
    }
    public function getOscarsById($OscarId){
        $query = "SELECT m_ID, title, m_desc, pic 
        FROM movie WHERE m_ID = ?";
        return $this->db->executeSelectQuery($query, [$OscarId]);
    }
    public function getOscarsByType($Mt_name){
        $query = "SELECT m_ID, title, m_desc, pic, movie_type.Mt_description
        FROM movie
        inner join movie_type on movie_type.mt_ID=movie.m_type
        where movie_type.Mt_name= ?";
        return $this->db->executeSelectQuery($query,[$Mt_name]);
    }
}

?>