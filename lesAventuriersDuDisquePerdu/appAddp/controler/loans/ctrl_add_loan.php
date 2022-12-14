<?php
    
    if ( isset($_GET["q"]) ){	
       $q= ltrim($_GET["q"]); 
    } else {
       $q="";
    }

    $dm=0;

    if ( isset($_GET["display"])){
	$dm=ltrim($_GET["display"]); 
    }

    if ( $q=="") { //include these file for the first load 
      include './utils/connect_db.php';
      include './manager/manager_client.php';
      include './manager/manager_loan.php';
      include './view/loans/view_add_loan.php';
    }

    $hint="";

    $db = mysqli_connect('192.168.0.6:3306', 'eddy', 'girafe70', 'Addp');
    if(mysqli_connect_errno()){
        printf("Connect failed : %s\n", mysqli_connect_error());
    }

    $mode=1;
    //dm is 0 -> search society
    if(strlen($q)>0 && $dm==0){
        $firstkey=$q;
        //$sql = 'SELECT count(clients.society) AS cpt, clients.society, max(clients.id_client) AS idc FROM clients LIKE "%'.$firstkey.'%" GROUP BY clients.society ORDER BY clients.society';
        $sql = 'SELECT c.society, c.id_client AS idc FROM clients AS c WHERE c.society LIKE "%'.$firstkey.'%" ORDER BY c.society';
        $res = $db->query($sql);
        while($data = mysqli_fetch_assoc($res)){
	//	$selected = (isset($_POST['idc']) AND $_POST['idc'] == $data['idc']) ? 'selected="selected"' : '';
            $hint.= "<option value=".$data["idc"].">".$data["society"]."</option>";
        }
    }

    $response = "";

    if($hint=="" && $q!=""){	
        $response.="<div id='notfound'>no suggestion</div>";
    }elseif (strlen($hint)>0) {
        $response="<select name='idc' id='client_list'>";
        $response.=$hint;
        $response.="</select>";

    }
    echo $response;
	

    if ( $q=="") {	
      $msg = "";
      //Test click bouton submit
      if(isset($_POST['add'])){
        //Test remplissage des champs
        if(!empty($_POST['idc'])){
            //Sécurisation des variables POST
            $idItem = $_GET['id'];
            $idClient = $_POST['idc'];
            $note = cleanInput($_POST['note']);
            //Instance de l'objet loan
            $loan = new ManagerLoan(null, null, null, $note, $idClient, $idItem);
            $loan -> addLoan($bdd);
            $msg = "Loan a été ajouté en BDD";
        }elseif (empty($_POST['idc'])) {
            $idItem = $_GET['id'];
            $society = cleanInput($_POST['search']);
            $note = cleanInput($_POST['note']);
            $societyQuery = $bdd -> prepare('INSERT INTO clients(society) VALUES ("'.$society.'")');
            $societyQuery -> execute();
            $idNewClient = $bdd -> lastInsertId();
            $loan = new ManagerLoan(null, null, null, $note, $idNewClient, $idItem);
            $loan -> addLoan($bdd);
            $msg = "Loan ajouté en BDD, pensez a ajouter les infos clients";
        }
        else{
            $msg = "Données incorrectes";
        }
      }
      else{
        $msg = "Cliquez sur ajouter";
      }
        echo $msg;
   }
?>
