<?php

class Database 
{
	
	private $hostname="localhost";
	private $username= "root";
	private $password ="";
	private $databasename;
	private $databaselink;
	private $result;
	
	function __construct ($dbname){
		$this->databasename=$dbname;
		$this->connect();
	}
	
	function connect(){
		$this->databaselink = new mysqli($this->hostname, $this->username, $this->password, $this->databasename);
	}
	
	function izvrsiUpit($upit){
		$this->result=$this->databaselink->query($upit);
	}

	
	function getResult(){
		return $this->result;
	}
	
	
	
	
}
?>