<html>
<head>
<title>liga_0</title>
</head>

<body>

<?php
     system ( "gpio mode 1 out" );
     system ( "gpio write 1 1" );
	  //echo("ok");
	  header('Location: /pinos.html'); 
	  
?>

</body>
</html>