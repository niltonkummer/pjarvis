<html>
<head>
<title>desliga_0</title>
</head>

<body>

<?php
     system ( "gpio mode 0 out" );
     system ( "gpio write 0 0" );
	// echo("0");
	 header('Location: /pinos.html'); 
?>

</body>
</html>