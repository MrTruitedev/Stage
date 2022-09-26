<?php
    Class Product{
        //Attribut
        private ?int $id_product;
        private ?string $name_product;

        //Constructeur
        public function __construct(?string $name){
            $this->name_product = $name;
        }

        //Getter
        public function getIdProduct():?int{
            return $this->id_product;
        }
        public function getNameProduct():?string{
            return $this->name_product;
        }
        
        //Setter
        public function setIdProduct(?int $id):void{
            $this->id_product = $id;
        }
        public function setNameProduct(?string $name):void{
            $this->name_product = $name;
        }
        
    }
?>