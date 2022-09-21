<?php
    include './model/model_item.php';

    class ManagerItem extends Item{
        //METHODES
        //Ajout d'un item en bdd
        public function addItem(object $bdd):void{
            $name = $this ->getNameitem();
            $date = $this -> getDateBought();
            $idProduct = $this -> getIdProduct();
            
            try{
                $req = $bdd -> prepare('INSERT INTO items(name_item, 
                date_bought, id_product) VALUES (?, ?, ?)');
                //Affectation des parametres
                $req -> bindParam(1, $name, PDO::PARAM_STR);
                $req -> bindParam(2,$date, PDO::PARAM_STR);
                $req -> bindParam(3,$idProduct, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                //Affichage d'une exception en cas d'erreur
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Afficher un item
        public function showItem(object $bdd):?array{
            try{
                $id = $this -> getIdItem();
                $req = $bdd -> prepare('SELECT * FROM items WHERE
                id_item = ?');
                //Affectation des parametres
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Afficher tous les items
        public function showAllItems(object $bdd):?array{
            try{
                $req = $bdd->prepare('SELECT id_item, name_item, date_bought, (SELECT name_product FROM products WHERE id_product= id_item) AS id_product FROM items');
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        
        //Modifier un item
        public function updateItem(object $bdd):void{
            $idItem = $this -> getIdItem();
            $name = $this -> getNameitem();
            $date = $this -> getDateBought();
            $idProduct = $this -> getIdProduct();
            try{
                $req = $bdd -> prepare('UPDATE items SET name_item = ?, date_bought = ?, id_product = ? WHERE id_item = ?');
                //Affectation des parametres               
                $req -> bindParam(1, $name, PDO::PARAM_STR);
                $req -> bindParam(2, $date, PDO::PARAM_STR);
                $req -> bindParam(3, $idProduct, PDO::PARAM_INT); 
                $req -> bindParam(4, $idItem, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }
        //Supprimer un item
        public function deleteItem(object $bdd):void{
            try{
                $id = $this -> getIditem();
                $req = $bdd -> prepare('DELETE FROM items WHERE id_item = ?');
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }
    }
?>