<?php
    //import
    include './utils/connect_db.php';
    include './model/model_disk.php';
    include './manager/manager_disk.php';
    include './view/view_show_all_disks.php';
    //message 
    $message = ""; 
    //instance de l'objet ManagerArticle
    $disk = new ManagerDisk(null, null, null, null, null);
    //stocker le résultat de la méthode showAllArticle
    $liste = $disk->showAllDisks($bdd);
    //test si le tableau d'article est vide
    if(empty($liste)){
        $message = '<a href="/addp/addDisk">Veuillez ajouter un disk</a>';
    }
    //test sinon (tableau est rempli)
    else{
        //parcourir le tableau (version tableau associatif)
        foreach($liste as $value){
            echo '<li>
            '.$value->id_disk.', '.$value->name_disk.', '.$value->size_disk.' ko, '.$value->date_bought.', '.$value->price_bought.' €, '.$value->times_rented. '
            <a href="/addp/modifyDisk?id='.$value->id_disk.'"><img src="./asset/img/edit.png"class="logo"></a>
            <a href="/addp/deleteDisk?id='.$value->id_disk.'"><img src="./asset/img/delete.png"class="logo"></a>
            </li>';
        }
    }
    echo $message;


?>