<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao']) && $_POST['acao'] == 'editar') {
    
    include 'conecta.php';

    $id = $_POST['id'];

    try {
        $sql = "SELECT * FROM tb_camiseta WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        $edit = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($edit) {
            echo json_encode([
                'cor' => $edit['cor'],
                'tamanho' => $edit['tamanho'],
            ]);
            exit;
        };
    exit;
}
?>