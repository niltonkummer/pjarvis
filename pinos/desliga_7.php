<html>
<head>
<title>desliga_7</title>
</head>

<body>

<?php
     system ( "gpio mode 7 out" );
     system ( "gpio write 7 0" );
	 // echo("ok");
	  header('Location: /pinos.html'); 
	  
?>

</body>
</html>