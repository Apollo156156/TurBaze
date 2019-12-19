<?php
$login=trim($_REQUEST['login']); 
$pass=trim($_REQUEST['pass']); 
echo ($login); 
echo ($pass); 

$sql = new Conn('localhost', 'id9072057_admin', 'qwerty12345',"id9072057_turbaza"); 
$sql->adm($login, $pass);
class Conn{ 
private $connection; 
public function __construct($host, $user, $password,$db_name) { 
$this->connection = new mysqli($host, $user, $password); 
mysqli_select_db($this->connection, $db_name); 

} 
public function adm($login, $pass)
{
    $where = "login = '$login' and pass = ('$pass')";
function recordExists($table, $where, $mysqli) {
        $query = "SELECT * FROM `$table` WHERE $where";
        $result = $mysqli->query($query);

        if($result->num_rows > 0) {
                return true; 
        }
        return false;
}
if(!recordExists("admin", $where, $this->connection)){
echo "Вход не выполнен<br>"; 
}
else 
echo '<script>location.replace("https://turbaza.000webhostapp.com/adminbd.html");</script>'; exit;


}
}
?>