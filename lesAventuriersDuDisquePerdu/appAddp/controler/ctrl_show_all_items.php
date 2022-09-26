<?php
    //import
    include './utils/connect_db.php';
    include './manager/manager_item.php';
    include './view/view_show_all_items.php';
    //message 
    $message = ""; 
    //test si aucun objet existe (modification ou suppression)
    if(isset($_GET['noId'])){
        //message d'erreur
        $message = "Veuillez sélectionner un item";
    }
    // test si un objet a été supprimé
    if(isset($_GET['del']) AND $_GET['del'] !=""){
        //message de suppression
        $message = 'Item '.$_GET['del'].' a été supprimé';
        //refresh de la page
        echo "<script>
            setTimeout(()=>{
                document.location.href='/addp/allItems';
            }, 1500);
            </script>";
    }
    //instance de l'objet ManagerItem
    $item = new ManagerItem(null, null, null);
    //stocker le résultat de la méthode showAllItem
    $liste = $item->showAllItems($bdd);
    //var_dump($item);
    //test si le tableau d'article est vide
    if(empty($liste)){
        $message = '</ul><br/>
        <p><a href="/addp/addItem">Veuillez ajouter un item</a></p>
        ';
    }
    //test sinon (tableau est rempli)
    else{
        //parcourir le tableau (version tableau associatif)
        foreach($liste as $value){
            //var_dump($value);
            echo '<li>
            '.$value['name_item'].', '.$value['date_bought'].', '.$value['name_product']. '
            <a href="/addp/modifyItem?id='.$value['id_item'].'"><img src="./asset/img/edit.png"class="logo"></a>
            <a href="/addp/deleteItem?id='.$value['id_item'].'"><img src="./asset/img/delete.png"class="logo"></a>
            </li>';
        }
        //var_dump($item);
        //var_dump($value);
    }
    echo $message;


?>