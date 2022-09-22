<?php
    Class Client{
        //Attributs
        private ?int $id_client;
        private ?string $society;
        private ?string $address;
        private ?string $mail;
        private ?string $contact_name;
        private ?int $tel_client;

        //Contructeur
        public function __construct(?string $society, ?string $address, ?string $mail, ?string $contact, ?int $tel){
            $this->society = $society;
            $this->address = $address;
            $this->mail = $mail;
            $this->contact_name = $contact;
            $this->tel_client = $tel;
        }

        //GETTER
        public function getIdClient():?int{
            return $this->id_client;
        }
        public function getSocietyClient():?string{
            return $this->society;
        }
        public function getAddressClient():?string{
            return $this->address;
        }
        public function getMailClient():?string{
            return $this->mail;
        }
        public function getContactClient():?string{
            return $this->contact_name;
        }
        public function getTelClient():?int{
            return $this->tel_client;
        }
        
        //SETTER
        public function setIdClient(?int $id):void{
            $this->id_client = $id;
        }
        public function setSocietyClient(?string $society):void{
            $this->society = $society;
        }
        public function setAddressClient(?string $address):void{
            $this->address = $address;
        }
        public function setMailClient(?string $mail):void{
            $this->mail = $mail;
        }
        public function setContactClient(?string $contact):void{
            $this->contact_name = $contact;
        }
        public function setTelClient(?int $tel):void{
            $this->tel_client = $tel;
        }
    }
?>