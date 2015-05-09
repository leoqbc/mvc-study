<?php

try {
    $con = new PDO('mysql:dbname=impacta', 'root', '');
} catch (PDOException $e) {
    echo $e->getMessage();
}
MVC\Core\Model::setDefaultMapper($con);