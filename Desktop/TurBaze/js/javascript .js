function raschitat() { 
home = document.getElementById('home').value; 
switch (home) { 
case "1": 
cena1 = 5000; 
break ;
case "2": 
cena1 = 7000; 
break ;
case "3": 
cena1 = 12000; 
break ;
case "4": 
cena1 = 20000; 
break ;
}
food = document.getElementById('food').value; 
switch (food) { 
case "1": 
cena2 = 500; 
break ;
case "2": 
cena2 = 500; 
break ;
case "3": 
cena2 = 500; 
break ;
case "4": 
cena2 = 1000; 
break ;
case "5": 
cena2 = 1000; 
break ;
case "6": 
cena2 = 1000; 
break ;
case "7": 
cena2 = 1500; 
break ;
} 
dop = document.getElementById('dop').value; 
switch(dop){ 
case "1": 
cena3 = 600; 
break ;
case "2": 
cena3 = 1000; 
break ;
case "3": 
cena3 = 1600; 
break ;
case "4": 
cena3 = 0; 
break ;
} 

stoimost = cena1+cena2+cena3; 
document.getElementById('stoimost').innerHTML = "Стоимость равна: "+ stoimost +" р.."; 
}