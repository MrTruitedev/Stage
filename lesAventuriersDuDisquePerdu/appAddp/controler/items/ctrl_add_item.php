<?php
    //import
    require('./utils/connect_db.php');
   
    require('./manager/manager_item.php');
    require('./view/items/view_add_item.php');
    //message
    $msg = "";
    // //!Affichage des types des produits présents en db A FINIR
    // echo "<script> let php = document.getElementById(#php);
    //     php.innerHTML = ".
    // $product = $bdd -> query('SELECT id_product, name_product FROM products');
    // while($affichage = $product->fetch()){
    //     $selected = (isset($_POST['products']) AND $_POST['products'] == $affichage['id_product']) ? 'selected="selected"' : '';
    //     echo '<option value="'.$affichage['id_product'].'"'.$selected.'>'.$affichage['name_product'].'</option></br>';
    // }"</script>";
    //Test click bouton submit
    if(isset($_POST['add'])){
        //Test remplissage des champs
        if($_POST['name_item'] !="" AND $_POST['date_bought'] != ""
        AND $_POST['products'] !=""){
            //Sécurisation des variables POST
            //Faire une boucle pour récuperer les valeurs de post 
            $name = cleanInput($_POST['name_item']);
            $date = cleanInput($_POST['date_bought']);
            $idProduct = $_POST['products'];
            //Instance de l'objet item
            $item = new ManagerItem($name, $date, $idProduct);
            $item -> addItem($bdd);
            $msg = mb_strtoupper($item -> getNameitem())." a été ajouté en BDD";
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
