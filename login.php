<?php

if (!($_POST["username"] == "admin" && $_POST["password"] == "admin")) {
    header("location: index.php");

}else{
    header("location: plan.php");
}
die();

?>