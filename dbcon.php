<?php
$dbServername="remotemysql.com";
$dbUsername="FFW73w9rDk";
$dbPassword="7g5uBO7IOG";
$dbname="U8pGLYjPGX";
 

$dbh=mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbname);

if(!$dbh)
{
	die(mysqli_errno($dbh)."did not connect");
}
?>
