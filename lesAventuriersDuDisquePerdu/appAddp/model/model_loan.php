<?php
    class Loan{
        //attributs
        private ?int $id_loan=null;
        private ?string $date_loan;
        private ?string $state;
        private ?string $date_return;
        private ?string $note;
        private ?int $id_client;
        private ?int $id_item;

        //constructeur
        public function __construct(?string $date, ?string $state, ?string $dateReturn, ?string $note, ?int $idClient, ?int $idItem){
            $this -> date_loan = $date;            
            $this -> state = $state;           
            $this -> date_return = $dateReturn;
            $this -> note = $note;
            $this -> id_client = $idClient;
            $this -> id_item = $idItem;
        }

        //GETTER
        public function getIdLoan():?int{
            return $this -> id_loan;
        }
        public function getDateLoan():?string{
            return $this -> date_loan;
        }      
        public function getStateLoan():?string{
            return $this -> state;
        }
        public function getDateReturn():?string{
            return $this -> date_return;
        }
        public function getNoteLoan():?string{
            return $this -> note;
        }
        public function getIdClient():?int{
            return $this -> id_client;
        }
        public function getIdItem():?int{
            return $this -> id_item;
        }
        
        //SETTER
        public function setIdLoan(?int $id):void{
            $this -> id_loan = $id;
        }
        public function setDateLoan(?string $date):void{
            $this -> date_loan = $date;
        }
        public function setStateLoan(?string $state):void{
            $this -> state = $state;
        }
        public function setDateReturn(?string $dateReturn):void{
            $this -> date_return = $dateReturn;
        }
        public function setNoteLoan(?string $note):void{
            $this -> note = $note;
        }
        public function setIdClient(?int $idClient):void{
            $this -> id_client = $idClient;
        }
        public function setIdItem(?int $idItem):void{
            $this -> id_item = $idItem;
        }
    }
?>