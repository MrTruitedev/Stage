<?php
    include './utils/connect_db.php';

    include './manager/manager_client.php';

    //Test si l'item à supprimer existe
    if(isset($_GET['id']) AND $_GET['id'] !=""){
        $client = new ManagerClient(null,null,null,null,null,null,null,null,null);
        //*parsing en entier du param $_GET['id']
        $_GET['id'] = intval($_GET['id']);
        //*set id client
        $client -> setIdClient($_GET['id']);
        //*Recuperation de l'article par son id
        $tab = $client ->showClientByID($bdd);
        //*Stockage du nom
        $society = $tab[0]['society'];
        //*Suppression de l'item par son id
        $client -> deleteClient($bdd);
        header("Location: /addp/allClients?del=$society");
    }
    else{
        header("Location : /addp/allItems?noId");
    }
?>