<?php
class DB
{
    // attributes (optional)
    public $host = 'devkinsta_db';
    public $dbname = 'Exercise_Todo_List_App';
    public $dbuser = 'root';
    public $dbpassword = 'GObT0SaYlthXkrat';
    public $db;
   
    // methods (functions / actions)
    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=$this->host;dbname=$this->dbname", 
            $this->dbuser, // username
            $this->dbpassword // password 
        );
    }
    public function fetch($sql, $data = [])
    {
        $query = $this->db->prepare( $sql );
        $query->execute($data);
        return $query->fetch();
    }
    public function fetchAll($sql, $data = [])
    {
        $query = $this->db->prepare( $sql );
        $query->execute($data);
        return $query->fetchAll();
    }
    public function insert( $sql, $data = [] )
     {
         $query = $this->db->prepare( $sql );
         $query->execute( $data );
     }
 
     public function update( $sql, $data = [] )
     {
         $query = $this->db->prepare( $sql );
         $query->execute( $data );
     }
 
     public function delete( $sql, $data = [] )
     {
         $query = $this->db->prepare( $sql );
         $query->execute( $data );
     }
}
