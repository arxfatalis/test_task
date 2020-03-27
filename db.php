<?php

    session_start();

    require "libs/rb.php";
    require "config.php";
    $host = $config['db']['host'];
    $db_name = $config['db']['db_name'];
    R::setup( "mysql:host=$host;dbname=$db_name",
    $config['db']['username'],
    $config['db']['password'] );

    // R::freeze(true);

    if(!R::testConnection()){
        exit("Отсутствует подключение к базе данных.");
    }

    
