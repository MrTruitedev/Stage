<?php
    class Disk{
        //attributs
        private ?int $id_disk;
        private ?string $name_disk;
        private ?int $size_disk;
        private ?string $date_bought;
        private ?float $price_bought;
        private ?int $times_rented;
        private ?int $id_loan;

        //constructeur
        public function __construct(?string $name, ?int $size, ?string $date, ?float $price, ?int $times){
            $this -> name_disk = $name;
            $this -> size_disk = $size;
            $this -> date_bought = $date;
            $this -> price_bought = $price;
            $this -> times_rented = $times;
        }

        //GETTER
        public function getIdDisk():?int{
            return $this -> id_disk;
        }
        public function getNameDisk():?string{
            return $this -> name_disk;
        }
        public function getSizeDisk():?int{
            return $this -> size_disk;
        }
        public function getDateBought():?string{
            return $this -> date_bought;
        }
        public function getPriceBought():?float{
            return $this -> price_bought;
        }
        public function getTimesRented():?int{
            return $this -> times_rented;
        }
        public function getIdLoan():?int{
            return $this -> id_loan;
        }
        
        //SETTER
        public function setIdDisk(?int $id):void{
            $this -> id_disk = $id;
        }
        public function setNameDisk(?int $name):void{
            $this -> name_disk = $name;
        }
        public function setSizeDisk(?int $size):void{
            $this -> size_disk = $size;
        }
        public function setDateBought(?string $date):void{
            $this -> date_bought = $date;
        }
        public function setpriceBought(?string $price):void{
            $this -> price_bought = $price;
        }
        public function setTimesRented(?int $times):void{
            $this -> times_rented = $times;
        }
        public function setIdLoan(?int $id):void{
            $this -> id_loan = $id;
        }
    }
?>