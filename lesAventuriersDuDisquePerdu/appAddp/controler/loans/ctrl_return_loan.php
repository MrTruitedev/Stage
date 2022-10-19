<?php
	include './view/loans/view_return_loan.php';
	include './manager/manager_loan.php';
	include_once './manager/manager_item.php';

	$msg = "";
	if (isset($_GET['id'])) {
		$idItem = $_GET['id'];	
		$itemMan = new ManagerItem(null, null, null);
		$itemMan -> setIdItem($idItem);
		$nameItem = $itemMan ->showItemById($bdd);
		$loanRet = new ManagerLoan(null, null,null, null, null, $idItem);
		$idLoan = $loanRet -> getLoanByItem($bdd);
		echo '<script>
					var scanItem = document.getElementById("scanItem");
					scanItem.innerHTML = "'.$nameItem[0]["name_item"].'";
					</script>';
		$loanRet -> setIdLoan(end($idLoan)['id_loan']);
		$noteLoan = $loanRet -> showLoanById($bdd);
		echo '<script>
				var note = document.getElementById("note");
				note.innerHTML = "'.$noteLoan[0]["note"].'";
				</script>';
	}
	if (isset($_POST['return'])) {
		$loanNote = $_POST['note'];
		$loanRet -> setNoteLoan($loanNote);
		$loanRet -> loanReturned($bdd);
		$msg = 'Item '.$nameItem[0]["name_item"].' retourné avec succès';
	}else{
		$msg = 'Ajoutez une note ou cliquez sur Retourner';
	}
	echo $msg;

?>