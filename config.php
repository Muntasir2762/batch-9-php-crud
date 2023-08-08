<?php

$connect = new mysqli('localhost', 'root', '', 'batch-9-php');

if(!$connect){
    die(mysqli_error($connect));
}
else{
    echo "Connection Successfull";
}

?>