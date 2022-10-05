<?php
    include './utils/connect_db.php';
    include './utils/function.php';
    include './manager/manager_loan.php';
    include './view/loans/view_add_loan.php';

    $msg = "";
    //Test click bouton submit
    if(isset($_POST['add'])){
        //Test remplissage des champs
        if(!empty($_POST['id_item']) AND !empty($_POST['id_client'])){
            //Sécurisation des variables POST
            $idItem = cleanInput($_POST['id_item']);
            $idClient = cleanInput($_POST['id_client']);
            $note = cleanInput($_POST['note']);
            //Instance de l'objet loan
            $loan = new ManagerLoan(null, null, null, $note, $idClient, $idItem);
            $loan -> addLoan($bdd);
            $msg = "Loan a été ajouté en BDD";
            var_dump($item);
        }
        else{
            $msg = "Données incorrectes";
        }
    }
    else{
        $msg = "Cliquez sur ajouter";
    }
    echo $msg;
?>
