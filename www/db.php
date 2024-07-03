<?php

$servername = "localhost:3306";
$username = "host1872432";
$password = "1234";
$dbname = "host1872432_registeruser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}else{
    "Успешно!";
} ?>