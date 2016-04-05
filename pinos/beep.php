<html>
<head>
<title>liga_7</title>
</head>

<body>

<?php

     system ( "gpio mode 10 out" );
     system ( "gpio write 10 1" );
     sleep (0.5);
     system ( "gpio write 10 0" );
    
	
	  header('Location: /pinos.html'); 
	  
?>

</body>
</html>