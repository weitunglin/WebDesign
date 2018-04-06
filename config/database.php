<?php
	class database{

		private static $instance = null;
		private $host = 'localhost';
		private $user = 'root';
		private $pass = '1234';
		private $db = 'a1';

		public $con;

		public function connect(){

			if(self::$instance == null){

				$this->con = new mysqli( $this->host , $this->user , $this->pass , $this->db );
				$this->con->query("set names utf8");

				if($this->con->connect_errno){
					echo "ERROR:".$this->con->connect_error;
				}

				self::$instance = $this->con;
				
			}

			return self::$instance;	

		}

	}
?>