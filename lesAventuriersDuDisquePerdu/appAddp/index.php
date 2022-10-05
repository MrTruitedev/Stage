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
        //route /appAddp/test -> ./test.php
        case $path === "/addp/test" : 
            include 'test.php';
            break;
        //route /addp/allItems -> ./controler/items/ctrl_show_all_items.php
        case $path === '/addp/allItems':
            include './controler//items/ctrl_show_all_items.php';
            break;
        //route /addp/addItem -> ./controler/items/controler_add_item.php
        case $path === '/addp/addItem':
            include './controler/items/ctrl_add_item.php';
            break;
        //route /addp/modifyItem -> ./controler/items/controler_modify_item.php
        case $path === '/addp/modifyItem' :
            include './controler/items/ctrl_modify_item.php';
            break;
         //route /addp/deleteItem -> ./controler/items/controler_delete_item.php
        case $path === '/addp/deleteItem' :
            include './controler/items/ctrl_delete_item.php';   
            break;
        //route /addp/addClient -> ./controler/clients/controler_add_client.php
        case $path === '/addp/addClient' :
            include './controler/clients/ctrl_add_client.php';   
            break;
        //route /addp/AllClients -> ./controler/clients/controler_show_all_clients.php
        case $path === '/addp/allClients':
            include './controler/clients/ctrl_show_all_clients.php';
            break;
        //route /addp/modifyClient -> ./controler/clients/controler_modify_client.php
        case $path === '/addp/modifyClient':
            include './controler/clients/ctrl_modify_client.php';
            break;
        //route /addp/deleteClient -> ./controler/clients/controler_delete_client.php
        case $path === '/addp/deleteClient':
            include './controler/clients/ctrl_delete_client.php';
            break;
        //route /addp/addLoan -> ./controler/loans/controler_add_loan.php
        case $path === '/addp/addLoan' :
            include './controler/loans/ctrl_add_loan.php';   
            break;
        //route /scan -> ./controler/scan/ctrl_scan.php
        case $path === '/addp/scan' :
            include './controler/scan/ctrl_scan.php';
            break;
            
    }