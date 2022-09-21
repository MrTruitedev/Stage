<?php
    include './utils/connect_db.php';

    include './manager/manager_item.php';

    //Test si l'item à supprimer existe
    if(isset($_GET['id']) AND $_GET['id'] !=""){
        $item = new ManagerItem(null,null,null);
        //*parsing en entier du param $_GET['id']
        $_GET['id'] = intval($_GET['id']);
        //*set id item
        $item -> setIditem($_GET['id']);
        //*Recuperation de l'article par son id
        $tab = $item ->showItem($bdd);
        //*Stockage du nom
        $name = $tab[0]['name_item'];
        //*Suppression de l'item par son id
        $item -> deleteItem($bdd);
        header("Location : /addp/AllItems?del=$name");
    }
    else{
        header("Location : /addp/allItems?noId");
    }
?>