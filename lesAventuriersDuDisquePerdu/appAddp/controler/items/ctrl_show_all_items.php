<?php
    //import
    include $_SERVER['DOCUMENT_ROOT'].'/utils/connect_db.php';
    include $_SERVER['DOCUMENT_ROOT'].'/manager/manager_item.php';
    include $_SERVER['DOCUMENT_ROOT'].'/view/items/view_show_all_items.php';
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
                document.location.href='?allItems';
            }, 1500);
            </script>";
    }
    //instance de l'objet ManagerItem
    $item = new ManagerItem(null, null, null);
    //stocker le résultat de la méthode showAllItem
    $liste = $item->showAllItems($bdd);
    //test si l'item est disponible 
    foreach($liste as $key => $value){
        $item -> setIdItem($value['id_item']);
        $state = $item -> getStateItem($bdd);
        $urlGen = 'urlGen';
        $urlGenCount = $urlGen.$key;
        if(empty($state)){
                echo '<li class="text-center">
                '.$value['name_item'].', '.$value['date_bought'].', '.$value['name_product']. '
                <a href="?modifyItem&id='.$value['id_item'].'"><img src="./asset/img/edit.png" style="height: 12px" class="img-fluid" alt="Responsive image"></a>
                <a href="?deleteItem&id='.$value['id_item'].'"><img src="./asset/img/delete.png" style="height: 12px" class="img-fluid" alt="Responsive image"></a>
                <form method="post">
                <button name="generateUrl" class="btn btn-outline-danger" value="'.$value['id_item'].'">Générer URL</button>
                </form>
                </li>';
            }
        }
    echo $message;

    if (isset($_POST['generateUrl'])) {

        $idItem = $_POST['generateUrl'];
        $url = 'laddp.frogs.local/?scan&id='.$idItem;
        echo '<script>
            var showUrl = document.getElementById("urlGen");
            var tag = document.createElement("h5");
            tag.className = "mx-auto my-auto";
            var text = document.createTextNode("'.$url.'");
            tag.appendChild(text);
            showUrl.appendChild(tag);
                </script>';
    }

    echo '</body>
        </html>';



























?>

