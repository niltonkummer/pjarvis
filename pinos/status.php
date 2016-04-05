<?php

$status = array ( 0 );
//le e escreve os dados dos pinos

for($i = 0; $i <= 7; $i ++)
{
system ("gpio read ".$i, $status);
echo ($status[$i]);
}

?>