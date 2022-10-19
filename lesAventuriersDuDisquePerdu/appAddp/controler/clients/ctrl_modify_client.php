<?php
    //import
    include './utils/connect_db.php';
    include './manager/manager_client.php';
    include './view/clients/view_modify_client.php';

    //message
    $msg = "Client en attente de modification";
    //Test si l'id existe
    if(isset($_GET['id']) AND $_GET['id'] != ""){
        //Instance nouvel objet item
        $client = new ManagerClient(null, null, null, null, null, null, null, null, null);
        //injection de l'id (obj)->setIdClient
        $client -> setIdClient($_GET['id']);
        //Récuperation des valeurs (array)
        $tab = $client -> showClientById($bdd);
        $society = $tab[0]['society'];
        $streetNumber = $tab[0]['street_number'];
        $street = $tab[0]['street'];
        $city = $tab[0]['city'];
        $zip = $tab[0]['zip'];
        $country = $tab[0]['country'];
        $mail = $tab[0]['mail'];
        $contactName = $tab[0]['contact_name'];
        $tel = $tab[0]['tel'];
        //Script JS (injection des valeurs existante en bdd)
        echo "<script>
            let society = '$society';
            let streetNumber = '$streetNumber';
            let street = '$street';
            let city = '$city';
            let zip = '$zip';
            let country = '$country';
            let mail = '$mail';
            let contactName = '$contactName';
            let tel = '$tel';
            let scy = document.querySelector('#scy');
            let sn = document.querySelector('#sn');
            let st = document.querySelector('#st');
            let cy = document.querySelector('#cy');
            let zp = document.querySelector('#zp');
            let cty = document.querySelector('#cty');
            let ml = document.querySelector('#ml');
            let cn = document.querySelector('#cn');
            let tl = document.querySelector('#tl');
            scy.value = society;
            sn.value = streetNumber;
            st.value = street;
            cy.value = city;
            zp.value = zip;
            cty.value = country;
            ml.value = mail;
            cn.value = contactName;
            tl.value = tel;
        </script>";
        //test click sur modifier
        if(isset($_POST['modify'])){
            //test si les champs sont remplies
            if(isset($_POST['society'])  AND isset($_POST['streetNumber']) AND isset($_POST['street']) 
            AND isset($_POST['city']) AND isset($_POST['zip']) AND isset($_POST['country']) AND isset($_POST['mail'])
            AND isset($_POST['contactName']) AND isset($_POST['tel'])
            AND !empty($_POST['society']) AND !empty($_POST['streetNumber']) AND !empty($_POST['street']) AND !empty($_POST['city'])
            AND !empty($_POST['zip']) AND !empty($_POST['country']) AND !empty($_POST['mail']) AND !empty($_POST['contactName']) AND !empty($_POST['mail'])
            AND !empty($_POST['tel'])){
                //Instance d'un nouvel objet item
                $client2 = new ManagerClient(cleanInput($_POST['society']), cleanInput($_POST['streetNumber']), cleanInput($_POST['street']), cleanInput($_POST['city']),
                cleanInput($_POST['zip']), cleanInput($_POST['country']), cleanInput($_POST['mail']), cleanInput($_POST['contactName']), cleanInput($_POST['tel']));
                //affectation de l'id du client
                
                $client2 -> setIdClient($_GET['id']);
                $client2 -> updateClient($bdd);
                //récupération des nouvelles valeurs    
                $newSociety = cleanInput($_POST['society']);
                $newStreetNumber = cleanInput($_POST['streetNumber']);
                $newStreet = cleanInput($_POST['street']);
                $newCity = cleanInput($_POST['city']);
                $newZip = cleanInput($_POST['zip']);
                $newCountry = cleanInput($_POST['country']);
                $newMail = cleanInput($_POST['mail']);
                $newContactName = cleanInput($_POST['contactName']);
                $newTel = cleanInput($_POST['tel']);
                //msg de modification
                $msg = "Le client a été modifié";
                echo "<script>
                scy.value = '$newSociety';
                sn.value = '$newStreetNumber';
                st.value = '$newStreet';
                cy.value = '$newCity';
                zp.value = '$newZip';
                cty.value = '$newCountry';
                ml.value = '$newMail';
                cn.value = '$newContactName';
                tl.value = '$newTel';
                setTimeout(()=>{
                    document.location.href='?allClients'; 
                    }, 2500);
                </script>";
            }
            else{
                $msg = 'Champs invalides';
            }
        }
    }
    else{
        header('Location: ?test.php');
    }
    echo $msg;
?>
