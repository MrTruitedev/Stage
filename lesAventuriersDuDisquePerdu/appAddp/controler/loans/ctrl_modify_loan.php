<?php
	include './utils/connect_db.php';
    include './manager/manager_loan.php';
    include './view/loans/view_modify_loan.php';

    //message
    $msg = "Prêt en attente de modification";
    //Test si l'id existe
    if(isset($_GET['id']) AND $_GET['id'] != ""){
        //Instance nouvel objet loan
        $loan = new ManagerLoan(null, null, null, null, null, null);
        //injection de l'id (obj)->setIdLoan
        $loan -> setIdLoan($_GET['id']);
        //Récuperation des valeurs (array)
        $tab = $loan -> getLoanInfo($bdd);
        //var_dump($tab);
        $society = $tab[0]['id_client'];
        $date = $tab[0]['fdateloan'];
        var_dump($tab[0]['fdateloan']);
        $idItem = $tab[0]['id_item'];
        //Script JS (injection des valeurs existante en bdd)
        echo "<script>
            let society = '$society';
            let date = '$date';
            let item = '$idItem'
            let society2 = document.getElementById('society');
            let date2 = document.getElementById('date');
            let select = document.getElementById('select')
            society2.value = society;
            date2.value = date;
            select.value = item;
        </script>";
        //test click sur modifier
        if(isset($_POST['modify'])){
             //test si les champs sont remplies
             if(isset($_POST['society'])  AND isset($_POST['date_loan']) AND isset($_POST['id_item']) 
             AND $_POST['society'] !="" AND $_POST['date_loan'] !="" AND $_POST['id_item'] !=""){
                 //Instance d'un nouvel objet item
                 $item2 = new ManagerLoan(cleanInput($_POST['society']), cleanInput($_POST['date_loan']),
                 $_POST['id_item']);
                 //affectation de l'id du disque
                
                 $item2 -> setIdItem($_GET['id']);
                 $item2 -> updateitem($bdd);
                 //récupération des nouvelles valeurs    
                 ;
                 $newName = cleanInput($_POST['name_item']);
                 $newDate = cleanInput($_POST['date_bought']);
                 $newIdProduct = cleanInput($_POST['id_product']);
                 //msg de modification
                 $msg = "L'item a été modifié";
                 echo "<script>
                 nom.value = '$newName';
                 date2.value = '$newDate';
                 setTimeout(()=>{
                     document.location.href='?allItems'; 
                     }, 1500);
                 </script>";
            }
            else{
                 $msg = 'Champs invalides';
            }
        }
    }
    else{
        header('Location:');
    }

    echo $msg;

?>