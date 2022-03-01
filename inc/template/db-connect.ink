<?php
$dsn='mysql://hostname=localhost;dbname=project_mangemment';
$user='root';
$pass='';
$option=array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try{
    $conn = new PDO($dsn, $user, $pass,$option);    
}catch(PDOException $e){
    echo 'connect failed ' . $e->getMessage();
}