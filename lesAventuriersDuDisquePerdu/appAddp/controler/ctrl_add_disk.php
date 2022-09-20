<?php
    //import
    include './utils/connect_db.php';
    include './utils/function.php';
    include './model/model_disk.php';
    include './manager/manager_disk.php';
    include './view/view_add_disk.php';
    //message
    $msg = "";
    //Test click bouton submit
    if(isset($_POST['add'])){
        //Test remplissage des champs
        if($_POST['name_disk'] !="" AND $_POST['size_disk'] != "" AND $_POST['date_bought'] != ""
        AND $_POST['price_bought'] !=""){
            //Sécurisation des variables POST
            $name = cleanInput($_POST['name_disk']);
            $size = cleanInput($_POST['size_disk']);
            $date = cleanInput($_POST['date_bought']);
            $price = cleanInput($_POST['price_bought']);
            //Instance de l'objet Disk
            $disk = new ManagerDisk($name, $size, $date, $price, 0);
            $disk -> addDisk($bdd);
            $msg = mb_strtoupper($disk -> getNameDisk())." a été ajouté en BDD";
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