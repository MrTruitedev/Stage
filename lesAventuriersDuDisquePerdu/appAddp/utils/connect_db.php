<?php
    //connexion à la BDD
    $bdd = new PDO('mysql:host=192.168.0.6;dbname=Addp', 'eddy','girafe70', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));