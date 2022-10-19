<?php
    //import
    include $_SERVER['DOCUMENT_ROOT'].'/utils/connect_db.php';
    include $_SERVER['DOCUMENT_ROOT'].'/manager/manager_loan.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/manager/manager_client.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/manager/manager_item.php';
    include $_SERVER['DOCUMENT_ROOT'].'/view/loans/view_show_all_loans.php';
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
    //instance de l'objet ManagerLoan
    $loan = new ManagerLoan(null, null, null, null, null, null);
    //stocker le résultat de la méthode showAllLoans
    $liste = $loan->showAllLoan($bdd); 
    // var_dump($liste);
    foreach($liste as $value){
        
            echo '<li class="text-center">Date de prêt :
            '.$value['date_loan'].', Société : '.$value['id_client'].', Item : '.$value['id_item']. '
            <a href="?modifyLoan&id='.$value['id_loan'].'"><img src="./asset/img/edit.png" style="height: 12px" class="img-fluid" alt="Responsive image"></a>
            <a href="?deleteLoan&id='.$value['id_loan'].'"><img src="./asset/img/delete.png" style="height: 12px" class="img-fluid" alt="Responsive image"></a>
            </li>';
            
        }
    echo $message;

    echo '</body>
        </html>';



























?>


?>