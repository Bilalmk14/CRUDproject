<?php

$servername ="localhost";
$username="root";
$password=""; 
$db = "hacker1";

$conn= mysqli_connect($servername, $username, $password,$db);


if(!$conn)
{
die("Sorry we are failed to connect:".mysqli_connect_error());
}
else
{
echo"Connection Successfully built <br>";
}

?>