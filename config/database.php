<?php
	class database{

		private $host = 'localhost';
		private $user = 'root';
		private $pass = '1234';
		private $db = 'a1';

		public $con;

		public function connect(){

			$this->con = null;
			
			$this->con = new mysqli( $this->host , $this->user , $this->pass , $this->db );
			$this->con->query("set names utf8");

			if($this->con->connect_errno){
				echo "ERROR:".$this->con->connect_error;
			}

			return $this->con;
		}

	}
?>