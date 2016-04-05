<html>
<head>
<title>liga_0</title>
</head>

<body>

<?php
     system ( "gpio mode 4 out" );
     system ( "gpio write 4 1" );
	 // echo("ok");
	  header('Location: /pinos.html'); 
	  
?>

</body>
</html>