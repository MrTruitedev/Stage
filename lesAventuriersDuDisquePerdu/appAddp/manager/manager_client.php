<?php
    include './model/model_clients.php';

    class ManagerClient extends Client{
        //METHODES
        //Ajouter un client
        public function addClient(object $bdd):void{
            $society = $this->getSocietyClient();
            $streetNumber = $this->getStreetNumberClient();
            $street = $this->getStreetClient();
            $city = $this->getCityClient();
            $zip = $this->getZipClient();
            $country = $this->getCountryClient();
            $mail = $this->getMailClient();
            $contact = $this->getContactClient();
            $tel = $this->getTelClient();
            try{
                $req = $bdd -> prepare('INSERT INTO clients(society, street_number, street, city, zip, 
                country, mail, contact_name, tel) VALUES (?,?,?,?,?,?,?,?,?)');
                //Affectation des parametres
                $req -> bindParam(1, $society, PDO::PARAM_STR);
                $req -> bindParam(2, $streetNumber, PDO::PARAM_INT);
                $req -> bindParam(3, $street, PDO::PARAM_STR);
                $req -> bindParam(4, $city, PDO::PARAM_STR);
                $req -> bindParam(5, $zip, PDO::PARAM_INT);
                $req -> bindParam(6, $country, PDO::PARAM_STR);
                $req -> bindParam(7, $mail, PDO::PARAM_STR);
                $req -> bindParam(8, $contact, PDO::PARAM_STR);
                $req -> bindParam(9, $tel, PDO::PARAM_INT);
                $req ->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Afficher un client par son id
        public function showClientById(object $bdd):object{
            $id = $this->getIdClient();
            try{
                $req = $bdd -> prepare('SELECT * FROM clients WHERE id_client = ?');
                //Affectation des parametres
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_OBJ);
                return $data;    
            }
            catch(Exception $e){
                die('Erreur '.$e -> getMessage());
            }
        }

        //Afficher un client par sa societe
        public function showClientBySociety(object $bdd):object{
            $society = $this->getSocietyClient();
            try{
                $req = $bdd -> prepare('SELECT * FROM clients WHERE society = ?');
                //Affectation des parametres
                $req -> bindParam(1, $society, PDO::PARAM_STR);
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_OBJ);
                return $data;    
            }
            catch(Exception $e){
                die('Erreur '.$e -> getMessage());
            }
        }

        //Afficher tous les clients
        public function showAllClients(object $bdd):array{
            try{
                $req = $bdd -> prepare('SELECT * FROM clients');
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Modifier un client
        public function updateClient(object $bdd):void{
            $idClient = $this -> getIdClient();
            $society = $this -> getSocietyClient();
            $streetNumber = $this -> getStreetNumberClient();
            $street = $this -> getStreetClient();
            $city = $this -> getCityClient();
            $zip = $this -> getZipClient();
            $country = $this -> getCountryClient();
            $mail = $this->getMailClient();
            $contact = $this -> getContactClient();
            $tel = $this -> getTelClient();
            try{
                $req = $bdd -> prepare('UPDATE clients SET society = ?, 
                street_number = ?, street = ?, city = ?, zip = ?, country = ?, 
                mail = ?, contact_name = ?, tel = ? 
                WHERE id_client = ?');
                //Affectation des parametres               
                $req -> bindParam(1, $society, PDO::PARAM_STR);
                $req -> bindParam(2, $streetNumber, PDO::PARAM_STR);
                $req -> bindParam(3, $street, PDO::PARAM_STR); 
                $req -> bindParam(4, $city, PDO::PARAM_STR);
                $req -> bindParam(5, $zip, PDO::PARAM_INT);
                $req -> bindParam(6, $country, PDO::PARAM_STR);
                $req -> bindParam(7, $mail, PDO::PARAM_STR);
                $req -> bindParam(8, $contact, PDO::PARAM_STR);
                $req -> bindParam(9, $tel, PDO::PARAM_INT);
                $req -> bindParam(10, $idClient, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        //supprimer un client
        public function deleteClient(object $bdd):void{
            $id = $this -> getIdClient();
            try{
                $req = $bdd -> prepare('DELETE FROM clients WHERE id_client = ?');
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }












    }

?>