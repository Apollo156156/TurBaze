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
$sql = new DB('localhost', 'id9072057_admin', 'qwerty12345',"id9072057_turbaza");
$sql->addClient($LastName, $FirstName, $SecondName, $email, $tel);
$sql->addBooking($ididid, $room, $nutrition, $services, $people, $checkin, $departure);
class DB{ 
    
    public $connection; 
    
    public function __construct($host, $user, $password,$db_name) { 
        $this->connection = new mysqli($host, $user, $password);
        mysqli_select_db($this->connection, $db_name);
        //if( !$this->$connection ) { 
          //  throw new Exception('Could not connect to DB '); 
        //} 
       // else 
           // echo "vse ok"; 
    } 
 public function addBooking( $ididid, $room, $nutrition, $services, $people, $checkin, $departure)
    {
        $GLOBALS['ididid'];
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
            if(!recordExists("booking", $where, $this->connection)){
                $sqlcom2 = "INSERT INTO booking (id_client, room, nutrition, services, people, checkin, departure) VALUES ('$ididid','$room','$nutrition', '$services','$people', '$checkin', '$departure')";
            if (mysqli_query($this->connection, $sqlcom2)) {
                echo "<br>New record created successfully12455"; 
                 global $go;
                 $go=0;
        }
            }
            else 
            { 
               
                echo('Дата занята!');
            }
            
            
    }
    
    public function addClient($LastNameIn, $FirstNameIn, $SecondNameIn, $emailIn, $telIn)
    { 
        global $go;
         //if  ($go=0){
        $sqlcom = "INSERT INTO Client (LastName, FirstName, SecondName, email, tel) VALUES ('$LastNameIn', '$FirstNameIn', '$SecondNameIn', '$emailIn', '$telIn')";
        if (mysqli_query($this->connection, $sqlcom)) {
            echo "New record created successfully";
        $sql="SELECT `id` FROM `Client` WHERE ((`LastName` LIKE '$LastNameIn') AND (`FirstName` LIKE '$FirstNameIn') AND (`SecondName` LIKE '$SecondNameIn') AND (`email` LIKE '$emailIn') AND (`tel` LIKE '$telIn')) ORDER BY `id` DESC";    
            $result = $this->connection->query($sql);
        if($row = $result->fetch_assoc())
         global $ididid;
         $ididid = $row["id"];
            }       
                else {
             echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                    }
   // }
     // else{
          
     //          mysqli_close($this->connection);
      //         header ('Error.html');  // перенаправление на нужную страницу
     // }
      }
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*class Check{
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
        
}*/
?>