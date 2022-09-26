<?php
    include './model/model_failure.php';
    Class ManagerFailure extends Failure{
        //METHODES
        //Ajout d'un fail
        public function addFail($bdd){
            $date = $this -> getDateFail();
            $description = $this ->getDescriptionFail();
            $idItem = $this->getIdItem();

            try{
                $req = $bdd -> prepare('INSERT INTO failure(date_fail, description_fail,
                id_item) VALUES (?, ?, ?)');
                //Affectation des parametres
                $req -> bindParam(1, $date, PDO::PARAM_STR);
                $req -> bindParam(2, $description, PDO::PARAM_STR);
                $req -> bindParam(3,$idItem, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                //Affichage d'une exception en cas d'erreur
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Afficher un fail par son id
        public function showFailById(object $bdd):?array{
            $id = $this -> getIdFail();
            try{
                $req = $bdd -> prepare('SELECT date_fail, description_fail, 
                (SELECT name_item FROM items WHERE id_item = id_item) AS id_item
                FROM failure WHERE id_fail = ?');
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

        //Afficher tous les fails
        public function showAllFails(object $bdd):?array{
            try{
                $req = $bdd->prepare('SELECT id_fail, date_fail, description_fail, 
                (SELECT name_item FROM items WHERE id_item = id_item) AS id_item FROM failure');
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        //Modifier un fail
        public function updateFail(object $bdd):void{
            $idFail = $this -> getIdFail();
            $date = $this -> getDateFail();
            $description = $this -> getDescriptionFail();
            $idItem = $this -> getIdItem();
            try{
                $req = $bdd -> prepare('UPDATE failure SET date_fail = ?, description_fail = ?, id_item = ? 
                WHERE id_fail = ?');
                //Affectation des parametres               
                $req -> bindParam(1, $date, PDO::PARAM_STR);
                $req -> bindParam(2, $description, PDO::PARAM_STR);
                $req -> bindParam(3, $idItem, PDO::PARAM_INT); 
                $req -> bindParam(4, $idFail, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Supprimer un fail
        public function deleteFail(object $bdd):void{                
            $id = $this -> getIdFail();
            try{
                $req = $bdd -> prepare('DELETE FROM failure WHERE id_item = ?');
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }
    }
?>