<?php
    // $_SERVER SUPERGLOBALS

    // These are some properties / variables that are available in any scope of PHP code.

    // Creating server Array (associated)
    // there are many other info about server 
    //but here we are just using some for demo
    $server = [
        'Host Server Name' => $_SERVER['SERVER_NAME'],
        'Host Header' => $_SERVER['HTTP_HOST'],
        'Server Software' => $_SERVER['SERVER_SOFTWARE'],
        'Document Root' => $_SERVER['DOCUMENT_ROOT'],
        'Current Page' => $_SERVER['PHP_SELF']
    ];
    // echo $server['Current Page'];

    // Creating client Array
    $client = [
        'Client System info' => $_SERVER['HTTP_USER_AGENT'],
        'Client IP' => $_SERVER['REMOTE_ADDR']
        //similarly we can access other properties
    ];
    // print_r($client);
?>