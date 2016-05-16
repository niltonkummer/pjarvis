<?php
/**
 * Created by IntelliJ IDEA.
 * User: niltonkummer
 * Date: 15/05/16
 * Time: 19:14
 */

header('Content-Type: application/json');

$pino = $_POST["pino"];
$action = $_POST["acao"];


// system ( "gpio mode 0 out" );
// system ( "gpio write $pino $action" );

echo json_encode(array("status"=>$action));