<?php

$host = 'localhost';
$user = 'id9072057_admin';
$password= 'qwerty12345';
$database = "id9072057_turbaza";

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
$query ="SELECT * FROM Client";

 
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table><tr><th>Id</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Почта</th><th>Телефон</th><th>Бронь</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 7 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
    
     
    mysqli_free_result($result);
  echo ' 
<form action="adminbron.php"> 
<div> 
<div>Введите Фамилию клиента для подтверждения<input type="text" name="LastName" placeholder="Иванов" required minlength="3 size="42"></div> 
<input onclick="adminbron.php" type="submit" value="Подтвердить"> 
</div> 
';
}

mysqli_close($link);
?>