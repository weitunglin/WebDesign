<?php

    class letter{

        private $con;
        private $table_name = "letter";

        public $id;
        public $filename;
        public $title;
        public $content;
        public $file;	  
        public $link;   
        public $userid;  
        public $time;
        public $orderby;
        public $dir;
        public $limit;
        public $offset;
        
        public function __construct($con){

            $this->con = $con;

        }

        function read_all(){

            $query = "select * from $this->table_name ";

            $stam = $this->con->prepare($query);

            if($stam->execute())
                return $stam->get_result();
            else
                return false;

        }


        function read_row(){

            $query = "select count(*) from $this->table_name ";

            if($total_rows = $this->con->query($query))
                return $total_rows;

        }
    }
?>