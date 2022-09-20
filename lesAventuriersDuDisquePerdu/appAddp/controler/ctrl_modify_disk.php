<?php
    //import
    include './utils/connect_db.php';
    include './utils/function.php';
    include './manager/manager_disk.php';
    include './model/model_disk.php';
    include './view/view_modify_article.php';

    //message
    $msg = "Disque en attente de modification";
    //Test si l'id existe
    if(isset($_GET['id']) AND $_GET['id'] != ""){
        //Instance nouvel objet Disk
        $disk = new ManagerDisk(null, null, null, null, null);
        //injection de l'id (obj)->setIdDisk
        $disk -> setIdDisk($_GET['id']);
        //Récuperation des valeurs (array)
        $tab = $disk -> showDisk($bdd);
        $name_disk = $tab[0]['name_disk'];
        $size_disk = $tab[0]['size_disk'];
        $date_bought = $tab[0]['date_bought'];
        $price_bought = $tab[0]['price_bought'];
        //Script JS (injection des valeurs existante en bdd)
        echo "<script>
            let name = '$name_disk';
            let size = '$size_disk';
            let date = '$date_bought';
            let price = '$price_bought';
            let nom = document.querySelector('#nom');
            let taille = document.querySelector('#size');
            let date2 = document.querySelector('#date');
            let prix = document.querySelector('#price');
            nom.value = name;
            taille.value = size;
            date2.value = date;
            prix.value = price;
        </script>";
        //test click sur modifier
        if(isset($_POST['modify'])){
            //test si les champs sont remplies
            if(isset($_POST['name_disk']) AND isset($_POST['size_disk']) AND isset($_POST['date_bought']) AND isset($_POST['price_bought']) 
            AND $_POST['name_disk'] !="" AND $_POST['size_disk'] !="" AND $_POST['date_bought'] !="" AND $_POST['price_bought'] !=""){
                //Instance d'un nouvel objet Disk
                $disque = new ManagerDisk($_POST['name_disk'], $_POST['size_disk'], $_POST['date_bought'], $_POST['price_bought'], null);
                //affectation de l'id du disque
                $disque -> setIdDisk($_GET['id']);
                $disque -> updateDisk($bdd);
                //récupération des nouvelles valeurs
                $newName = $_POST['name_disk'];
                $newSize = $_POST['size_disk'];
                $newDate = $_POST['date_bought'];
                $newPrice = $_POST['price_bought'];
                //msg de modification
                $msg = "Le disque a été modifié";
                echo "<script>
                    nom.value = '$newName';
                    taille.value = '$newSize';
                    date2.value = '$newDate';
                    prix.value = '$newPrice';
                    setTimeOut(()=>{
                        document.location.href='/addp/allDisks;
                    },1500);
                </script>";
            } 
        }
    }
    else{
        header('Location: /addp/test.php');
    }
    echo $msg;

?>