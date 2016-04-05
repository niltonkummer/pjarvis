<html>
<head>
<title>liga_0</title>
</head>

<body>

<?php
     system ( "gpio mode 5 out" );
     system ( "gpio write 5 1" );
	  //echo("ok");
	  header('Location: /pinos.html'); 
	  
?>

</body>
</html>