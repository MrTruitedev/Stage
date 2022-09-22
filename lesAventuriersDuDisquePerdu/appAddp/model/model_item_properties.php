<?php
    Class ItemProperties{
        //Attributs
        private ?int $id_property;
        private ?string $item_property;
        private ?string $property_value;
        private ?int $id_item;

        //Constucteur
        public function __construct(?string $property, ?string $value, ?int $idItem){
            $this->item_property = $property;
            $this->property_value = $value;
            $this->id_item = $idItem;
        }

        //GETTER 
        public function getIdProperty():?int{
            return $this->id_property;
        }
        public function getItemProperty():?string{
            return $this->item_property;
        }
        public function getPropertyValue():?string{
            return $this->property_value;
        }
        public function getIdItem():?int{
            return $this->id_item;
        }

        //SETTER
        public function setIdProperty(?int $id):void{
            $this-> id_property = $id;
        }
        public function setItemProperty(?string $property):void{
            $this-> item_property = $property;
        }
        public function setPropertyValue(?string $value):void{
            $this-> property_value = $value;
        }
        public function setIdItem(?int $idItem):void{
            $this-> id_item = $idItem;
        }
    }
?>