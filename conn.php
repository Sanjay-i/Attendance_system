<?php
class DB
{
    function connection()
    {
        $con = mysqli_connect('localhost', 'root', '', 'my_data');
        if (!$con) {
            die('connection error' . mysqli_connect_error());
        }
        return $con;
    }
}
$obj = new DB();
$data = $obj->connection();
