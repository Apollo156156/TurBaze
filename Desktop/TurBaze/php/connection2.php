<?php

$LastName= trim($_REQUEST['LastName']);
$FirstName =trim( $_REQUEST['FirstName']);
$SecondName = trim($_REQUEST['SecondName']);
$email = trim($_REQUEST['email']);
$tel = trim($_REQUEST['tel']);
$room = trim($_REQUEST['room']); 
$nutrition= trim($_REQUEST['nutrition']);
$services =trim( $_REQUEST['services']);
$checkin = trim($_REQUEST['checkin']); 
$people = trim($_REQUEST['people']); 
$departure = trim($_REQUEST['departure']); 
$ididid=1;
/*echo ($LastName);
echo ($FirstName);
echo ($SecondName);
echo ($email);
echo ($tel);
echo ($room); 
echo ($nutrition);
echo ($services);
echo ($checkin); 
echo ($people);
echo ($departure);
*/
global $mysql_connect;
$sql = new add('localhost', 'id9072057_admin', 'qwerty12345',"id9072057_turbaza");
$sql->add($LastName, $FirstName, $SecondName, $email, $tel, $ididid, $room, $nutrition, $services, $people, $checkin, $departure);
class DataBase{
    public $connection; 
    
    public function __construct($host, $user, $password,$db_name) { 
        $this->connection = new mysqli($host, $user, $password);
        mysqli_select_db($this->connection, $db_name);
        if( !$this->connection ) { 
            throw new Exception('Could not connect to DB '); 
        } 
        else 
            
            echo "vse ok";
     
    }
}
class Add{ 
     
 public function add($LastName, $FirstName, $SecondName, $email, $tel, $ididid, $room, $nutrition, $services, $people, $checkin, $departure)
    {
        global $connection;
        
        $sql = "INSERT INTO Client (LastName, FirstName, SecondName, email, tel) VALUES ('$LastName','$FirstName','$SecondName', '$email', '$tel')";

        if (mysqli_query($this->connection, $sql)) {
        echo "New record created successfully";
            $sql="SELECT `id` FROM `Client` WHERE ((`LastName` LIKE '$LastName') AND (`FirstName` LIKE '$FirstName') AND (`SecondName` LIKE '$SecondName') AND (`email` LIKE '$email') AND (`tel` LIKE '$tel')) ORDER BY `id` DESC";    
            $result = $this->connection->query($sql);
        if($row = $result->fetch_assoc())
         $ididid = $row["id"];
            }
        else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
            $where = "(( 
            '$checkin' BETWEEN booking.checkin and booking.departure-1 
            or 
            '$departure' BETWEEN booking.checkin-1 and booking.departure-1
            ) AND (booking.room = '$room'))"; 
            function recordExists($table, $where, $mysqli) { 
            $query = "SELECT * FROM `$table` WHERE $where"; 
            $result = $mysqli->query($query); 

            if($result->num_rows > 0) { 
            return true; // The record(s) do exist 
            }    
            return false; // No record found 
            }
            global $connection;
            if(!recordExists("booking", $where, $this->connection)){ 
                $sql = "INSERT INTO booking (id_client,room, nutrition, services, people, checkin, departure) VALUES ('$ididid','$room','$nutrition', '$services','$people', '$checkin', '$departure')"; 

            if (mysqli_query($this->connection, $sql)) { 
                echo "<br>59New record created successfully"; 
            } else { 
            echo "<br>61Error: " . $sql . "<br>" . mysqli_error($this->connection); 
            } }
            
             else {echo "Дата занята";
             $sql="DELETE FROM  `Client` WHERE id = (SELECT id FROM  `Client` ORDER BY id DESC LIMIT 1)";
             if (mysqli_query($this->connection, $sql)) { 
                echo "Я удалю твою жизнь";
             }
             }
            mysqli_close($this->connection);
            die();
        
    }
    public $connection; 
    
    public function __construct($host, $user, $password,$db_name) { 
        $this->connection = new mysqli($host, $user, $password);
        mysqli_select_db($this->connection, $db_name);
        if( !$this->connection ) { 
            throw new Exception('Could not connect to DB '); 
        } 
        else 
            
            echo "vse ok";
     
    }
}
    
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
class Check{
    public function Checking($checkin, $departure, $room)
    {
     $where = "(( 
        '$checkin' BETWEEN booking.checkin and booking.departure-1 
        or 
        '$departure' BETWEEN booking.checkin-1 and booking.departure-1
        ) AND (booking.room = '$room'))"; 
    }
    public function recordExists($table, $where, $mysqli) 
    { 
        $query = "SELECT * FROM `$table` WHERE $where"; 
        $result = $mysqli->query($query); 

            if($result->num_rows > 0) 
            { 
                return true; // The record(s) do exist 
            } 
                return false; // No record found 
    }
        
}
?>