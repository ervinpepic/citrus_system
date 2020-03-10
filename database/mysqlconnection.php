<?php 

function OpenConnection() 
{
    $server = "localhost";
    $username = "ervinpepic"; 
    $password = "hack7319soft";
    $db_name = "citrus_system";

    $new_connection  = new mysqli($server, $username, $password, $db_name) or 
        die("Connection Failed: %s\n" . $new_connection -> error);
    return $new_connection;
}

function CloseConnection($connect_db) 
{
    $connect_db -> close();
}
?> 