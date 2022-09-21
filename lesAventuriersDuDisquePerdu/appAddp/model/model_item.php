<?php
    class Item{
        //attributs
        private ?int $id_item;
        private ?string $name_item;
        private ?string $date_bought;
        private ?int $id_product;

        //constructeur
        public function __construct(?string $name, ?string $date, ?int $idProduct){
            $this -> name_item = $name;            
            $this -> date_bought = $date;           
            $this -> id_product = $idProduct;
        }

        //GETTER
        public function getIdItem():?int{
            return $this -> id_item;
        }
        public function getNameItem():?string{
            return $this -> name_item;
        }      
        public function getDateBought():?string{
            return $this -> date_bought;
        }
        public function getIdProduct():?int{
            return $this -> id_product;
        }
        
        //SETTER
        public function setIditem(?int $id):void{
            $this -> id_item = $id;
        }
        public function setNameitem(?int $name):void{
            $this -> name_item = $name;
        }
        public function setDateBought(?string $date):void{
            $this -> date_bought = $date;
        }
        public function setIdProductRented(?int $idProduct):void{
            $this -> id_product = $idProduct;
        }
    }
?>