<?php
	include './utils/connect_db.php';
	include './manager/manager_item.php';
	
	if (isset($_GET['id'])) {
		$idItem = $_GET['id'];
		$itemTest = new ManagerItem(null, null, null,);
		$itemTest -> setIdItem($idItem);
		$stateItem = $itemTest -> getStateItem($bdd);
		//var_dump($stateItem);
		if(empty($stateItem)){
			include './controler/loans/ctrl_add_loan.php';
			$itemShow = new ManagerItem(null, null, null);
			$itemShow -> setIdItem($idItem);
			$nameItem = $itemShow -> showItemById($bdd);
			echo '<script>
					var scanItem = document.getElementById("scanItem");
					scanItem.innerHTML = "'.$nameItem[0]["name_item"].'";
					</script>';
		}else{
			include './controler/loans/ctrl_return_loan.php';
	}
}
?>