<?php
    //session start
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    /*--------------------------ROUTER -----------------------------*/
    //test de la valeur $path dans l'URL et import de la ressource
    switch($path){
        //route /addp/test -> ./test.php
        case $path === "/addp/test" : 
            include 'test.php';
            break;
        //route /addp/allDisks -> ./controler/ctrl_show_all_disks.php
        case $path === '/addp/allDisks':
            include './controler/ctrl_show_all_disks.php';
            break;
        //route /addp/addDisk -> ./controler/controler_add_disk.php
        case $path === '/addp/addDisk':
            include './controler/ctrl_add_disk.php';
            break;
        //route /addp/modifyDisk -> ./controler/controler_modify_disk.php
        case $path === '/addp/modifyDisk' :
            include './controler/ctrl_modify_disk.php';
            break;

    }