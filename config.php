<?php
$server_name = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'freelancer';

$connection = mysqli_connect($server_name,$db_user,$db_pass,$db_name);
if(!$connection){
   die('Connection Failed');
}
