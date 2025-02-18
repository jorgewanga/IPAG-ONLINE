<?php

$host = 'localhost'; 
$dbname = 'ipagonline'; 
$username = 'root'; 
$password = ''; 

try {
    
    $dsn = "mysql:localhost=$host;ipagonline=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);

    // Defina o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Caso ocorra algum erro
    echo "Erro na conexão: " . $e->getMessage();
    die();
}
?>
