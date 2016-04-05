<html>
<head>
<title>liga_0</title>
</head>

<body>

<?php
     system ( "gpio mode 0 out" );
     system ( "gpio write 0 1" );
	 //echo("1");
	  header('Location: /pinos.html'); 

	  
?>

</body>
</html>