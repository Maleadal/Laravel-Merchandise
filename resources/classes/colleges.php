<?php
    class College{
        private $id;
        private $name;
        function __construct($id, $name){
            $this->id = $id;
            $this->name = $name;
        }
        public static function fromJson($json){
            return new College($json['id'], $json['name']);
        }

        function getId(){
            return $this->id;
        }
        
        function getName(){
            return $this->name;
        }
    }

?>