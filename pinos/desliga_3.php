<html>
<head>
<title>liga_0</title>
</head>

<body>

<?php
     system ( "gpio mode 3 out" );
     system ( "gpio write 3 0" );
	//  echo("ok");
	  header('Location: /pinos.html'); 
	  
?>

</body>
</html>