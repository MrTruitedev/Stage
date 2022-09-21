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
        //route /addp/allItems -> ./controler/ctrl_show_all_items.php
        case $path === '/addp/allItems':
            include './controler/ctrl_show_all_items.php';
            break;
        //route /addp/addItem -> ./controler/controler_add_item.php
        case $path === '/addp/addItem':
            include './controler/ctrl_add_item.php';
            break;
        //route /addp/modifyItem -> ./controler/controler_modify_item.php
        case $path === '/addp/modifyItem' :
            include './controler/ctrl_modify_item.php';
            break;
         //route /addp/deleteItem -> ./controler/controler_delete_item.php
         case $path === '/addp/deleteItem' :
            include './controler/ctrl_delete_item.php';   
            break;
    }