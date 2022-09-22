<?php
    include './model/model_item.php';

    class ManagerItemProperties extends ItemProperties{
        //METHODES
        //Ajout des properties d'un item
        public function addItemProperties(object $bdd):void{
            $property = $this->getItemProperty();
            $value = $this->getPropertyValue();
            $idItem = $this->getIdItem();
            try{
                $req = $bdd -> prepare('INSERT INTO item_properties(item_property, property_value)
                VALUES (?,?,?');
                //Affectation des parametres
                $req -> bindParam(1, $property, PDO::PARAM_STR);
                $req -> bindParam(2, $value, PDO::PARAM_STR);
                $req -> bindParam(3, $idItem, PDO::PARAM_STR);
                $req -> execute();
            }
            catch(Exception $e){
                //Affichage d'une exception en cas d'erreur
                die('Erreur : '.$e -> getMessage());
            }
        }

        public function showPropertyById(object $bdd):object{
            $id = $this -> getIdProperty();
            try{
                $req = $bdd -> prepare('SELECT * FROM item_properties WHERE
                id_property = ?');
                //Affectation des parametres
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }
        //Afficher les proprietes d'un item
        public function showPropertyByItem(object $bdd){
            
        }
    }