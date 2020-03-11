<?php

//function to connect to mysql with parameters
function OpenConnection()
{
    $server = "localhost";
    $username = "ervinpepic";
    $password = "hack7319soft";
    $db_name = "citrus_system";

    $new_db_connection  = new mysqli($server, $username, $password, $db_name)
                        or die("Connection Failed: %s\n" . $new_db_connection -> error);
    return $new_db_connection;
}

//close connection calling this function
function CloseConnection($close_connect_db)
{
    $close_connect_db -> close();
}

?> 