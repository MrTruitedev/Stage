<?php
    include './model/model_product.php';

    Class ManagerProduct extends Product{
        //Ajout d'un product
        public function addProduct(object $bdd):void{
            $name = $this ->getNameProduct();            
            try{
                $req = $bdd -> prepare('INSERT INTO products(name_product) VALUES (?)');
                //Affectation des parametres
                $req -> bindParam(1, $name, PDO::PARAM_STR);
                $req -> execute();
            }
            catch(Exception $e){
                //Affichage d'une exception en cas d'erreur
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Afficher un product
        public function showItemById(object $bdd):?array{
            $id = $this -> getIdProduct();
            try{
                $req = $bdd -> prepare('SELECT name_product WHERE id_product = ?');
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

        //Afficher un item par son nom
        public function showProductByName($bdd):object{
            $name = $this->getNameProduct();
            try{
                $req = $bdd -> prepare('SELECT * FROM products WHERE name_product = ?');
                //Affectation des parametres
                $req -> bindParam(1, $name, PDO::PARAM_STR);
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_OBJ);
                return $data;    
            }
            catch(Exception $e){
                die('Erreur '.$e -> getMessage());
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

        //Modifier un product
        public function updateProduct(object $bdd):void{
            $idProduct = $this -> getIdProduct();
            $name = $this -> getNameProduct();
            try{
                $req = $bdd -> prepare('UPDATE products SET name_product = ?
                WHERE id_product = ?');
                //Affectation des parametres               
                $req -> bindParam(1, $name, PDO::PARAM_STR);
                $req -> bindParam(2, $idProduct, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Supprimer un product
        public function deleteProduct(object $bdd):void{                
            $id = $this -> getIdProduct();
            try{
                $req = $bdd -> prepare('DELETE FROM product WHERE id_product = ?');
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }
    }
?>