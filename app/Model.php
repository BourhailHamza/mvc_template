<?php

abstract class Model
{
    private string $host = "localhost";
    private string $db_name = "film";
    private string $username = "root";
    private string $password = "";

    protected PDO $_connection;

     public string $table;
     public int $id;

     /**
      * Database init
      * @return void
      */
    public function getConnection(){
        try{
            $this->_connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->_connection->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error : " . $exception->getMessage();
        }
    }

    /**
     * Get element by id
     * @return mixed
     */
    public function getOne(){
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    /**
     *Get all elements on table
     *@return array|false
     */
    public function getAll(){
        $sql = "SELECT * FROM ".$this->table;
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}