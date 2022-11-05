<?php 
$dbh =null;

try {
    $dsn = "mysql:host=mariadb;dbname=ejemplo";
    $dbh = new PDO($dsn, 'usuario', 'usuario');
} catch (PDOException $e){
    echo $e->getMessage();
}
/*
//INSERT
$stmt = $dbh->prepare("INSERT INTO clientes (nombre, apellido, direccion, localidad, movil) VALUES (?, ?, ?, ?, ?)");
// Bind
$stmt->bindValue(1, 'Javi');
$stmt->bindValue(2, 'Guillen');
$stmt->bindValue(3, 'Mi casas');
$stmt->bindValue(4, 'Mojacar');
$stmt->bindValue(5, '695195695');
// Excecute
$stmt->execute();
*/


//SELECT
// metodo prepare sobre la conexion
$stmt = $dbh->prepare("SELECT * FROM clientes");
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($clientes as $cliente){
    echo $cliente->nombre ." ".$cliente->localidad. "<br>";
}
?>