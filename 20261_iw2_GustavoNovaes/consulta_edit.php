<?php
header('Content-Type: application/json; charset=utf-8');
include 'conecta.php';

$id = $_POST['id'];

$stmt = $pdo->prepare("SELECT * FROM tb_camiseta WHERE id = :id");
$stmt->execute([':id' => $id]);

$camiseta = $stmt->fetch(PDO::FETCH_ASSOC);

if ($camiseta) {
    echo json_encode([
        'cor' => $camiseta['cor'],
        'tamanho' => $camiseta['tamanho']
    ]);
    exit;
} else {
    echo json_encode([
        'cor' => '',
        'tamanho' => ''
    ]);
}
?>