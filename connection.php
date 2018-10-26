<?php
try {
    $db = new PDO('mysql:hostname=localhost; dbname=TimeTracker; charset=utf8', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e){
    echo 'Error: '.$e->getMessage();
}


?>
