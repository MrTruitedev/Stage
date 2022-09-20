<?php
    class ManagerDisk extends Disk{
        //METHODES
        //Ajout d'un disk en bdd
        public function addDisk(object $bdd):void{
            $name = $this ->getNameDisk();
            $size = $this -> getSizeDisk();
            $date = $this -> getDateBought();
            $price = $this -> getPriceBought();
            $times = 0;
            
            try{
                $req = $bdd -> prepare('INSERT INTO disks(name_disk, size_disk, 
                date_bought, price_bought, times_rented) VALUES (?, ?, ?, ?, ?)');
                //Affectation des parametres
                $req -> bindParam(1, $name, PDO::PARAM_STR);
                $req -> bindParam(2, $size, PDO::PARAM_STR);
                $req -> bindParam(3,$date, PDO::PARAM_STR);
                $req -> bindParam(4, $price, PDO::PARAM_STR);
                $req -> bindParam(5, $times, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                //Affichage d'une exception en cas d'erreur
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Afficher un disk
        public function showDisk(object $bdd):?array{
            try{
                $id = $this -> getIdDisk();
                $req = $bdd -> prepare('SELECT * FROM disks WHERE
                id_disk = ?');
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

        //Afficher tous les disks
        public function showAllDisks(object $bdd):?array{
            try{
                $req = $bdd->prepare('SELECT id_disk, name_disk, size_disk, date_bought,
                price_bought, times_rented FROM disks');
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
        
        //Modifier un disk
        public function updateDisk(object $bdd):void{
            $name = $this -> getNameDisk();
            $size = $this -> getSizeDisk();
            $date = $this -> getDateBought();
            $price = $this -> getPriceBought();
            $times = $this -> getTimesRented();
            try{
                $req = $bdd -> prepare('UPDATE disks SET name_disk = ?,
                size_disk = ?, date_bought = ?, price_bought = ?, times_rented = ?');
                //Affectation des parametres
                $req -> bindParam(1, $name, PDO::PARAM_STR);
                $req -> bindParam(2, $size, PDO::PARAM_INT);
                $req -> bindParam(3, $date, PDO::PARAM_STR);
                $req -> bindParam(4, $price, PDO::PARAM_STR);
                $req -> bindParam(5, $times, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }
        //Supprimer un disk
        public function deleteDisk(object $bdd):void{
            try{
                $id = $this -> getIdDisk();
                $req = $bdd -> prepare('DELETE FROM disks WHERE id_disk = ?');
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }
    }
?>