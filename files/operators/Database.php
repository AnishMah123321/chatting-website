<?php
class Database{
	private $database;
	function __construct(){
		try{
            $this->database = new PDO("mysql:host=".SQL_HOST.";dbname=".SQL_DATABASE, SQL_USERNAME, SQL_PASSWORD);
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->database->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER);
            $this->database->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_TO_STRING);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function Database(){
    	return $this->database;
    }

    public function getDbase(){
        return $this->database;
    }
}
?>
