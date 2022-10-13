<?php
    include './utils/connect_db.php';
    include './utils/function.php';
    include './manager/manager_loan.php';
    include './view/loans/view_add_loan.php';
    if(isset($_GET['q'])){
        $q = $_GET["q"];
    }
    $dm=0;
    if(isset($_GET['display'])){
        $dm=ltrim($_GET['display']);
    }
    $hint="";
    $db = mysqli_connect('192.168.0.6:3306', 'eddy', 'girafe70', 'Addp');
    if(mysqli_connect_errno()){
        printf("Connect failed : %s\n", mysqli_connect_error());
    }

    $mode=1;
        //dm is 0 -> search society
    if(strlen($q)>0 && $dm=0){
        $firstkey=$q;
        $sql = 'SELECT count(clients.society) AS cpt, clients.society, max(clients.id_client) AS idc FROM clients LIKE "%'.$firstkey.'%" GROUP BY clients.society ORDER BY clients.society';
        $res = $db->query($sql);
        while($data = mysqli_fetch_assoc($res)){
            $hint = "<div id='r_row'><div id='keyfound'><a href='#' onClick=\"fillSearch('".$data["idc"]."');\">".$data["society"]."</a></div><div id='key_occurence'>".$data['cpt']."</div></div>";
        }
    }
    //$dm = 1 -> show result for society
    elseif(strlen($q)>0 && $dm ==1){
        $sql = "SELECT count(*) AS counter, clients.society FROM clients WHERE clients.society LIKE '%".$q."%' GROUP BY clients.society ORDER BY clients.society";
        $res = $db -> query($sql);
        $society_v="";
        $rupture=false;
        $countGrpName = 1;
        $countNameId = 1;
        while($data = mysqli_fetch_assoc($res)){
            if($society_v!=$data['society']){
                $hint.="</div>";
                $society_v = $data['society'];
                $hint.=createHearderGroup($society_v, 0);
                $rupture = true;
            }
        }
        $hint.="</div>";
    }
    $response = "";
    if($hint=""){
        $response="no suggestion";
    }else {
        $response .= $hint;
    }
    echo $response;

    //* FUNCTIONS

    function createHearderGroup($text, $level){
        $hg = "";
        $id_row="";
        switch($level){
            case 0 :
                $id_row = "society_row";
        }
        $hg.="<div id='hlevel".$level."'>";
        $hg.="<div id='".$id_row."'>";
        $hg.="<div id='cell0'>".$text;
        $hg.="</div></div></div>";
        return $hg;
    }



    $msg = "";
    //Test click bouton submit
    if(isset($_POST['add'])){
        //Test remplissage des champs
        if(!empty($_POST['id_item']) AND !empty($_POST['id_client'])){
            //Sécurisation des variables POST
            $idItem = cleanInput($_POST['id_item']);
            $idClient = cleanInput($_POST['id_client']);
            $note = cleanInput($_POST['note']);
            //Instance de l'objet loan
            $loan = new ManagerLoan(null, null, null, $note, $idClient, $idItem);
            $loan -> addLoan($bdd);
            $msg = "Loan a été ajouté en BDD";
            var_dump($item);
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
