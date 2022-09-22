<?php
    include './model/model_item.php';

    class ManagerClient extends CLient{
        //METHODES
        //Ajouter un client
        public function addClient(object $bdd):void{
            $society = $this->getSocietyClient();
            $address = $this->getAddressClient();
            $mail = $this->getMailClient();
            $contact = $this->getContactClient();
            $tel = $this->getTelClient();
            try{
                $req = $bdd -> prepare('INSERT INTO clients(society, address, mail, 
                contact_name, tel_client VALUES (?,?,?,?,?)');
                //Affectation des parametres
                $req -> bindParam(1, $society, PDO::PARAM_STR);
                $req -> bindParam(2, $address, PDO::PARAM_STR);
                $req -> bindParam(3, $mail, PDO::PARAM_STR);
                $req -> bindParam(4, $contact, PDO::PARAM_STR);
                $req -> bindParam(5, $tel, PDO::PARAM_INT);
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












    }

?>