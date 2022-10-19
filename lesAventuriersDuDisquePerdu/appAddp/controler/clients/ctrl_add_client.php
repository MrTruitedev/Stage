<?php
    include './utils/connect_db.php';

    include './manager/manager_client.php';
    include './view/clients/view_add_client.php';

    //message
    $msg = "";
    //Test click submit
    if(isset($_POST['add'])){
        //Test remplissage des champs
        if(!empty($_POST['society']) AND !empty($_POST['streetNumber']) AND !empty($_POST['street']) AND !empty($_POST['city']) AND !empty($_POST['zip'])
        AND !empty($_POST['country']) AND !empty($_POST['mail']) AND !empty($_POST['contactName']) AND !empty($_POST['tel'])){
            //Sécurisation des variables POST
            $society = cleanInput($_POST['society']);
            $streetNumber = cleanInput($_POST['streetNumber']);
            $street = cleanInput($_POST['street']);
            $city = cleanInput($_POST['city']);
            $zip = cleanInput($_POST['zip']);
            $country = cleanInput($_POST['country']);
            $mail = cleanInput($_POST['mail']);
            $contact = cleanInput($_POST['contactName']);
            $tel = cleanInput($_POST['tel']);
            //Instance de l'objet item
            $item = new ManagerClient($society, $streetNumber, $street, $city, $zip, $country, $mail, $contact, $tel);
            $item -> addClient($bdd);
            $msg = mb_strtoupper($item -> getSocietyClient())." a été ajouté en BDD";
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
