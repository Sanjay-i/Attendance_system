<?php
class DB
{

    function connection()
    {
        $con = mysqli_connect('localhost', 'root', '', 'a_system');
        if (!$con) {
            die('connection error' . mysqli_connect_error());
        }
        return $con;
    }
}
$obj = new DB();
$obj->connection();
