<?php  
include 'conecta.php';

$id = $_POST['id'];
$sql = "DELETE FROM tb_camiseta WHERE id = :id";
 $stmt = $pdo->prepare($sql);
 $stmt->execute(['id' => $id]);
?>