<?php
    Class Failure{
        //Attributs
        private ?int $id_fail;
        private ?string $date_fail;
        private ?string $description_fail;
        private ?int $id_item;

        //Constructeur
        public function __construct(?string $date, ?string $description, ?int $idItem){
            $this->date_fail = $date;
            $this->description_fail = $description;
            $this->id_item = $idItem;
        }

        //GETTER
        public function getIdFail():int{
            return $this->id_fail;
        }
        public function getDateFail():string{
            return $this->date_fail;
        }
        public function getDescriptionFail():string{
            return $this->description_fail;
        }
        public function getIdItem():int{
            return $this->id_item;
        }

        //SETTER
        public function setIdFail(?int $id):void{
            $this->id_fail = $id;
        }
        public function setDateFail(?string $date):void{
            $this->date_fail = $date;
        }
        public function setDescriptionFail(?string $description):void{
            $this->description_fail = $description;
        }
        public function setIdItem(?int $id):void{
            $this->id_item = $id;
        }
    }
?>