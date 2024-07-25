<?php

include_once('includes/classe_db.php');

try {
    $PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao conectar com o MySQL: ' . $e->getMessage()]);
    exit;
}

$raca = $_GET['raca'];
$tipo = $_GET['tipo'];
$consulta_id_raca = "SELECT id_cor FROM racas_gato WHERE id = '".$raca."'";

$id_cor = null;
foreach ($PDO->query($consulta_id_raca) as $row) {
    $id_cor = $row['id_cor'];    
}

if ($id_cor !== null) {
    $consulta_cor = "SELECT * FROM cor WHERE raca = '".$id_cor."' ORDER BY descricao ASC";
    $cores = [];
    foreach ($PDO->query($consulta_cor) as $row) {
        $cores[] = ['id' => $row['id'], 'descricao' => ucfirst($row['descricao'])];
    }
    echo json_encode($cores);
} else {
    echo json_encode([]);
}

?>