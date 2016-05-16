<?php
/**
 * Created by IntelliJ IDEA.
 * User: niltonkummer
 * Date: 15/05/16
 * Time: 19:18
 */
header('Content-Type: application/json');
$pino = $_POST["pino"];
$acao = $_POST["acao"];
//system ("gpio read ".$pino, $status);

echo json_encode(array("status"=>$acao));