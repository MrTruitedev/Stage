<?php
	include $_SERVER['DOCUMENT_ROOT']."/utils/function.php";
	include $_SERVER['DOCUMENT_ROOT']."/view/view_menu.php";
	$path = getPath();
	switch($path){
		case 'allItems':
			include $_SERVER['DOCUMENT_ROOT']."/controler/items/ctrl_show_all_items.php";
			break;
		case 'addItem':
			require $_SERVER['DOCUMENT_ROOT']."/controler/items/ctrl_add_item.php";
			break;
		case 'modifyItem':
			include $_SERVER['DOCUMENT_ROOT']."/controler/items/ctrl_modify_item.php";
			break;
		case 'deleteItem':
			include $_SERVER['DOCUMENT_ROOT']."/controler/items/ctrl_delete_item.php";
			break;
		case 'addClient':
			include $_SERVER['DOCUMENT_ROOT']."/controler/clients/ctrl_add_client.php";
			break;
		case 'modifyClient':
			include $_SERVER['DOCUMENT_ROOT']."/controler/clients/ctrl_modify_client.php";
			break;
		case 'deleteClient':
			include $_SERVER['DOCUMENT_ROOT']."/controler/clients/ctrl_delete_client.php";
			break;
		case 'allClients':
			include $_SERVER['DOCUMENT_ROOT']."/controler/clients/ctrl_show_all_clients.php";
			break;
		case 'addLoan':
			include $_SERVER['DOCUMENT_ROOT']."/controler/loans/ctrl_add_loan.php";
			break;
		case 'scan':
			include $_SERVER['DOCUMENT_ROOT']."/controler/scan/ctrl_scan.php";
			break;
		case 'allLoans':
			include $_SERVER['DOCUMENT_ROOT']."/controler/loans/ctrl_show_all_loans.php";
			break;
		case 'modifyLoan':
			include $_SERVER['DOCUMENT_ROOT']."/controler/loans/ctrl_modify_loan.php";
			break;
		case 'deleteLoan':
			include $_SERVER['DOCUMENT_ROOT']."/controler/loans/ctrl_delete_loan.php";
			break;
	}
?>
