<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=tpajax', 'root', '');

    $val = $_POST['data'];

    $requetelistepays = "UPDATE accounts SET data = '". $val ."' ";

    echo $requetelistepays;
    $rs = $connection->query($requetelistepays);

} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit();
    die();
}
