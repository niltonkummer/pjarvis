<html>
<head>
<title>liga_7</title>
</head>

<body>

<?php
     system ( "gpio mode 7 out" );
     system ( "gpio write 7 1" );
	 // echo("ok");
	  header('Location: /pinos.html'); 
	  
?>

</body>
</html>