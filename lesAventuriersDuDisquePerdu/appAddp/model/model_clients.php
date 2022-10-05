<?php
    Class Client{
        //Attributs
        private ?int $id_client;
        private ?string $society;
        private ?int $street_number;
        private ?string $street;
        private ?string $city;
        private ?int $zip;
        private ?string $country;
        private ?string $mail;
        private ?string $contact_name;
        private ?int $tel;

        //Contructeur
        public function __construct(?string $society, ?int $streetNumber, ?string $street, ?string $city, ?int $zip, ?string $country, ?string $mail, ?string $contact, ?int $tel){
            $this->society = $society;
            $this->street_number = $streetNumber;
            $this->street = $street;
            $this->city = $city;
            $this->zip = $zip;
            $this->country = $country;
            $this->mail = $mail;
            $this->contact_name = $contact;
            $this->tel = $tel;
        }

        //GETTER
        public function getIdClient():?int{
            return $this->id_client;
        }
        public function getSocietyClient():?string{
            return $this->society;
        }
        public function getStreetNumberClient():?int{
            return $this->street_number;
        }
        public function getStreetClient():?string{
            return $this->street;
        }
        public function getCityClient():?string{
            return $this->city;
        }
        public function getZipClient():?int{
            return $this->zip;
        }
        public function getCountryClient():?string{
            return $this->country;
        }
        public function getMailClient():?string{
            return $this->mail;
        }
        public function getContactClient():?string{
            return $this->contact_name;
        }
        public function getTelClient():?int{
            return $this->tel;
        }
        
        //SETTER
        public function setIdClient(?int $id):void{
            $this->id_client = $id;
        } 
        public function setSocietyClient(?string $society):void{
            $this->society = $society;
        }
        public function setStreetNumberClient(?int $streetNumber):void{
            $this->street_number = $streetNumber;
        }
        public function setStreetClient(?string $street):void{
            $this->street = $street;
        }
        public function setCityClient(?string $city):void{
            $this->city = $city;
        }
        public function setZipClient(?int $zip):void{
            $this->zip = $zip;
        }
        public function setCountryClient(?string $country):void{
            $this->country = $country;
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