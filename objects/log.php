<?php

	class log{

		private $con;
		private $table_name = 'log';

		public $id;
		public $userid;
		public $username;
		public $time;
		public $status;
		public $orderby;
		public $dir;
		public $offset;
		public $limit;

		public function __construct($db){
			$this->con = $db;
		}


		function create(){

			$query = "INSERT INTO $this->table_name (userid,status) VALUES( ? , ? )";

			$stam = $this->con->prepare($query);

			$stam->bind_param('is',$this->userid,$this->status);

			if($stam->execute())
				return true;
			else
				return false;

		}

		function read_row(){

			$query = " SELECT COUNT(*) FROM $this->table_name ";

			if($total_rows = $this->con->query($query))
				return $total_rows;

		}

		function read_paging(){

			$query = "SELECT l.id,l.userid,m.acc,l.time,l.status 
						FROM $this->table_name l JOIN member m ON l.userid = m.id
						ORDER BY $this->orderby $this->dir
						LIMIT $this->offset , $this->limit";

			$stam = $this->con->prepare($query);

			if($stam->execute())
				return $stam->get_result();
			else 
				return false;
		}

		function logout(){

			$query = "INSERT INTO $this->table_name (userid,status) VALUES ($this->userid ,$this->status) ";

			if($this->con->query($query))
				return true;
			else 
				return false;

		}
	}
?>