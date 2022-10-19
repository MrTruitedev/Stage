<?php
    include './model/model_loan.php';

    class ManagerLoan extends Loan{
        //METHODES
        //Ajout LOAN
        public function addLoan($bdd){
            $date = date("Y-m-d H:i:s");
            $state = 'out';
            $note = $this->getNoteLoan();
            $idClient = $this->getIdClient();
            $idItem = $this->getIdItem();

            try{
                $req = $bdd -> prepare('INSERT INTO loan(date_loan, state, note, id_client,
                id_item) VALUES (?,?,?,?,?)');
                //Affectation des parametres
                $req -> bindParam(1,$date,PDO::PARAM_STR);
                $req -> bindParam(2, $state, PDO::PARAM_STR);
                $req -> bindParam(3, $note, PDO::PARAM_STR);
                $req -> bindParam(4, $idClient, PDO::PARAM_INT);
                $req -> bindParam(5, $idItem, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Afficher loan par son id
        public function showLoanById($bdd):array{
            $id = $this->getIdLoan();
            try{
                
                $req = $bdd ->prepare('SELECT * FROM loan WHERE id_loan = ?');
                //Affectattion du parametre
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }

        //Afficher loan par son client
        public function showLoanByClient($bdd):object{
            $idClient = $this->getIdClient();
            try{
                
                $req = $bdd -> prepare('SELECT * FROM loan WHERE id_client = ?');
                //Affectation du parametre
                $req -> bindParam(1, $idClient, PDO::PARAM_INT);
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e ->getMessage());
            }
        }

        //Afficher loan par son item
        public function getLoanByItem($bdd):array{
            $idItem = $this->getIdItem();
            try{
                $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $bdd->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
                $req = $bdd -> prepare('SELECT id_loan FROM loan WHERE id_item = ?');
                //Affectation du parametre
                $req -> bindParam(1, $idItem, PDO::PARAM_INT);
                $req -> execute();
                $data = $req -> fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e ->getMessage());
            }
        }

        //Afficher tous les loan
        public function showAllLoan($bdd):array{
            $state = 'out';
            try{
                $req = $bdd->prepare('SELECT id_loan, id_item AS idi, id_client AS idc, date_loan, state, date_return, note, (SELECT society FROM clients WHERE id_client= idc) AS id_client, (SELECT name_item FROM items WHERE id_item = idi) AS id_item FROM loan');
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

        public function getLoanInfo($bdd):array{
            $idLoan = $this->getIdLoan();
            try{
                $req = $bdd->prepare('SELECT id_loan, id_item AS idi, id_client AS idc, DATE_FORMAT(date_loan, "%Y-%m-%d") AS fdateloan, state, date_return, note, (SELECT society FROM clients WHERE id_client= idc) AS id_client, (SELECT name_item FROM items WHERE id_item = idi) AS id_item FROM loan WHERE id_loan = ?');
                $req -> bindParam(1, $idLoan, PDO::PARAM_INT);
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
        
        //Retour de loan
        public function loanReturned($bdd):void{
            $date = date("Y-m-d H:i:s");
            $idLoan = $this->getIdLoan();
            $state = 'in';
            $dateReturn = $date;
            $note = $this->getNoteLoan();
            try{
                $req = $bdd -> prepare('UPDATE loan SET date_return = ?, state = ?,
                note = ? WHERE id_loan = ?');
                //Affectation des parametres
                $req -> bindParam(1, $dateReturn, PDO::PARAM_STR);
                $req -> bindParam(2, $state, PDO::PARAM_STR);
                $req -> bindParam(3, $note, PDO::PARAM_STR);
                $req -> bindParam(4, $idLoan, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e ->getMessage());
            }
        }
        
        //Modifier un loan
        public function updateLoan($bdd):void{
            $idLoan = $this->getIdLoan();
            $state = $this->getStateLoan();
            $dateReturn = $this->getDateLoan();;
            $note = $this->getNoteLoan();
            $idClient = $this->getIdClient();
            $idItem = $this->getIdItem();
            try{
                $req = $bdd -> prepare('UPDATE loan SET state = ?, date_return = ?,
                note = ?, id_client = ?, id_item = ? WHERE id_loan = ?');
                //Affectation des parametres
                $req -> bindParam(1, $state, PDO::PARAM_STR);
                $req -> bindParam(2, $dateReturn, PDO::PARAM_STR);
                $req -> bindParam(3, $note, PDO::PARAM_STR);
                $req -> bindParam(4, $idClient, PDO::PARAM_INT);
                $req -> bindParam(5, $idItem, PDO::PARAM_INT);
                $req -> bindParam(6, $idLoan, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e ->getMessage());
            }
        }

        //Supprimer loan
        public function deleteLoan(object $bdd):void{
            $id = $this -> getIdLoan();
            try{
                $req = $bdd -> prepare('DELETE FROM loan WHERE id_loan = ?');
                $req -> bindParam(1, $id, PDO::PARAM_INT);
                $req -> execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e -> getMessage());
            }
        }
        // //Récuperer la note
        // public function getNote
    }

?>
