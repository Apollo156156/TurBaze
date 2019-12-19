<?php 
$LastName =trim($_REQUEST['LastName']);
$sql = new Bronir('localhost', 'id9072057_admin', 'qwerty12345',"id9072057_turbaza"); 

$sql->updatebron($LastName); 
class Bronir{ 
private $connection; 
public function __construct($host, $user, $password,$db_name) { 
$this->connection = new mysqli($host, $user, $password); 
mysqli_select_db($this->connection, $db_name); 

} 

public function updatebron($LastName) 
{ 
$sqlcom = "UPDATE Client SET accepted = '1' WHERE Client.LastName='$LastName'"; 
if (mysqli_query($this->connection, $sqlcom)) 
echo '<script>location.replace("https://turbaza.000webhostapp.com/php/adminconnection.php");</script>'; exit; 

} 
} 
?>