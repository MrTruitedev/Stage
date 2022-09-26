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
        public function showPropertyByItem(object $bdd):array{
            $id = $this->getIdItem();
            try{
                $req = $bdd -> prepare('SELECT item_property, property_value FROM item_properties
                WHERE id_property = ?');
                //Affectation du parametre
                $req -> bindPara(1, $id, PDO::PARAM_INT);
                $req -> execute();
                $data = $req -> fectchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Afficher toutes les proprietes
        public function showAllProperties(object $bdd):array{
            try{
                $req = $bdd -> prepare('SELECT id_property, item_property, property_value, 
                (SELECT name_item FROM item WHERE id_item = id_item) 
                AS id_item FROM item_properties');
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage);
            }
        }

        //Modifier property
        public function updateProperty(object $bdd):void{
            $idProperty = $this -> getIdProperty();
            $property = $this -> getItemProperty();
            $value = $this -> getPropertyValue();
            $idItem = $this -> getIdItem();
            try{
                $req = $bdd -> prepare('UPDATE item_properties SET item_property = ?, 
                property_value = ?, id_item = ? WHERE id_property = ?');
                //Affectation des parametres               
                $req -> bindParam(1, $property, PDO::PARAM_STR);
                $req -> bindParam(2, $value, PDO::PARAM_STR);
                $req -> bindParam(3, $idItem, PDO::PARAM_INT); 
                $req -> bindParam(4, $idProperty, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        // Supprimer property
        public function deleteProperty(object $bdd):void{
            $id = $this -> getIdProperty();
            try{
                $req = $bdd -> prepare('DELETE FROM item_properties WHERE id_property = ?');
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }
    }