<?php



require_once('../app/application.php');

use Core\Connection;
$conn = Connection::getInstance();
$stm = $conn->prepare('SHOW TABLES');
$stm->execute();
pre($stm->fetchAll());
