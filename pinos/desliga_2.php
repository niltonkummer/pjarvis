<html>
<head>
<title>liga_0</title>
</head>

<body>

<?php
     system ( "gpio mode 2 out" );
     system ( "gpio write 2 0" );
	 // echo("ok");
	  header('Location: /pinos.html'); 
	  
?>

</body>
</html>