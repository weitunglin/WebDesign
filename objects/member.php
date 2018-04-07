<?php

	class member{

		private $con;
		private $table_name = 'member';

		public $id;
		public $acc;
		public $pwd;
		public $perm;
		public $name;
		public $orderby;
		public $dir;
		public $offset;
		public $limit;

		public function __construct($db){
			$this->con = $db;
		}

		function read_member(){
			
			$query = " SELECT LPAD(m.id-1,3,'0') as id ,m.acc,m.pwd,m.perm,m.name FROM $this->table_name m WHERE acc = ? ";

			$stam = $this->con->prepare($query);

			$stam->bind_param('s',$this->acc);

			$stam->execute();

			if($row = $stam->get_result()->fetch_assoc()){

				$this->id = $row['id'];
				$this->acc = $row['acc'];
				$this->pwd = $row['pwd'];
				$this->name = $row['name'];
				$this->perm = $row['perm'];

				return true;

			}else{

				return false;

			}
		}

		function read_paging(){

			$query = "SELECT LPAD(m.id-1,3,'0'),m.acc,m.pwd,m.perm,m.name FROM $this->table_name m
						ORDER BY $this->orderby $this->dir 
						LIMIT $this->offset , $this->limit";

			$stam = $this->con->prepare($query);

			if($stam->execute()){

				return $stam->get_result();

			}else{

				return false;

			}
		}

		function read_row(){

			$query = " SELECT COUNT(*) FROM $this->table_name ";

			if($total_rows = $this->con->query($query))
				return $total_rows;

		}

		function search_paging($key){

			$query = " SELECT LPAD(m.id-1,3,'0'),m.acc,m.pwd,m.perm,m.name FROM $this->table_name m
						WHERE `acc` LIKE ? OR `pwd` LIKE ? OR `name` LIKE ? OR `perm` LIKE ? 
						ORDER BY $this->orderby $this->dir
						LIMIT $this->offset , $this->limit ";

			$stam = $this->con->prepare($query);

			$key = "%{$key}%";

			$stam->bind_param('ssss', $key , $key , $key , $key );

			if($stam->execute()){

				return $stam->get_result();

			} else {

				return false;

			}
		}

		function search_id($id){

			$query = "SELECT LPAD(m.id-1,3,'0'),m.acc,m.pwd,m.perm,m.name FROM $this->table_name m WHERE id = ? ";

			$stam = $this->con->prepare($query);

			$stam->bind_param('i',$id);

			if($stam->execute())
				return $stam->get_result();
			else 
				return false;

		}

		function edit(){

			$query = "UPDATE $this->table_name 
						SET name = ? , acc = ? , pwd = ? , perm = ? 
						WHERE id = ? ";

			$stam = $this->con->prepare($query);

			$stam->bind_param('ssssi',$this->name,$this->acc,$this->pwd,$this->perm,$this->id);

			if($stam->execute())
				return true;
			else
				return false;

		}

		function delete(){

			$query = "DELETE FROM $this->table_name WHERE id = ? ";

			$stam = $this->con->prepare($query);

			$stam->bind_param('i',$this->id);

			if($stam->execute())
				return true;
			else
				return false;

		}
	}

?>