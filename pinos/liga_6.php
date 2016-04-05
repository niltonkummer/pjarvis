<html>
<head>
<title>liga_0</title>
</head>

<body>

<?php
     system ( "gpio mode 6 out" );
     system ( "gpio write 6 1" );
	 // echo("ok");
	  header('Location: /pinos.html'); 
	  
?>

</body>
</html>