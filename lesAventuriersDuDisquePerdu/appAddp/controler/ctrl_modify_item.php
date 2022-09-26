<?php
    //import
    include './utils/connect_db.php';
    include './utils/function.php';
    include './manager/manager_item.php';

    include './view/view_modify_item.php';

    //message
    $msg = "Item en attente de modification";
    //Test si l'id existe
    if(isset($_GET['id']) AND $_GET['id'] != ""){
        //Instance nouvel objet item
        $item = new ManagerItem(null, null, null);
        //injection de l'id (obj)->setIditem
        $item -> setIdItem($_GET['id']);
        //Récuperation des valeurs (array)
        $tab = $item -> showItemById($bdd);
        $name_item = $tab[0]['name_item'];
        $date_bought = $tab[0]['date_bought'];
        $id_product = $tab[0]['id_product'];
        //Script JS (injection des valeurs existante en bdd)
        echo "<script>
            let name = '$name_item';
            let date = '$date_bought';
            let idProduct = '$id_product';
            let nom = document.querySelector('#nom');
            let date2 = document.querySelector('#date');
            let idProduct2 = document.querySelector('#idProduct');
            nom.value = name;
            date2.value = date;
            idProduct2.value = idProduct;
        </script>";
        //test click sur modifier
        if(isset($_POST['modify'])){
            //test si les champs sont remplies
            if(isset($_POST['name_item'])  AND isset($_POST['date_bought']) AND isset($_POST['id_product']) 
            AND $_POST['name_item'] !="" AND $_POST['date_bought'] !="" AND $_POST['id_product'] !=""){
                //Instance d'un nouvel objet item
                $item2 = new ManagerItem($_POST['name_item'], $_POST['date_bought'], $_POST['id_product']);
                //affectation de l'id du disque
                $item2 -> setIdItem($_GET['id']);
                $item2 -> updateitem($bdd);
                //récupération des nouvelles valeurs
                $newName = cleanInput($_POST['name_item']);
                $newDate = cleanInput($_POST['date_bought']);
                $newIdProduct = cleanInput($_POST['id_product']);
                //msg de modification
                $msg = "L\'item a été modifié";
                echo "<script>
                    nom.value = '$newName';
                    date2.value = '$newDate';
                    idProduct2.value = '$newIdProduct';
                    setTimeOut(()=>{
                        document.location.href='/addp/allItems;
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