<?php


    class Users{

        private $id;
        private $name;
        private $email;
        private $observation;


        public function getID(){
            return $this->id;
        }
        public function setID($i){
            $this->id = trim($i);
        }
        public function getName(){
            return $this->name;
        }
        public function setName($n){
            $this->name = ucwords(trim($n));
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($e){
            $this->email =strtolower(trim($e));
        }
        public function getObservation(){
            return $this->observation;
        }
        public function setObservation($o){
            $this->observation =strtolower(trim($o));
        }

    }

    Interface UsersDAO{
        public function add(Users $u);
        public function findAll();
        public function findbyId($id);
        public function findbyEmail($email);
        public function update(Users $u);
        public function delete($id);
    }
