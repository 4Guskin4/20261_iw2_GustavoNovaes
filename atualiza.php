<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao']) && $_POST['acao'] == 'editar') {
    include 'conecta.php';

    $id = $_POST['id'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];

    $sql = "UPDATE tb_camiseta SET cor = :cor, tamanho = :tamanho WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([':cor' => $cor, ':tamanho' => $tamanho, ':id' => $id])) {
        echo "Sucesso";
    } else {
        echo "Erro";
    }
    exit;
}
?>