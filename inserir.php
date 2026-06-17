<?php
    include 'conecta.php';
    function consulta($pdo) { 
    $sql = "SELECT * FROM tb_camiseta"; 
    $stmt = $pdo->query($sql);
    echo "<table border='1' style='border-collapse: collapse; width: 100%; margin-top: 20px;'>";
    echo "<thead>
            <tr>
                <th>ID</th>
                <th>Cor</th>
                <th>Tamanho</th>
                <th>Ações</th>
            </tr>
          </thead>";
    echo "<tbody>";
    
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['cor']) . "</td>";
        echo "<td>" . htmlspecialchars($row['tamanho']) . "</td>";
        echo "<td>";
    echo "<button class='btn-editar btn btn-warning btn-sm mr-1' data-id='" . htmlspecialchars($row['id']) . "' data-cor='" . htmlspecialchars($row['cor']) . "' data-tamanho='" . htmlspecialchars($row['tamanho']) . "'>Editar</button>";
    echo "<button class='btn-deletar btn btn-danger btn-sm' data-id='" . htmlspecialchars($row['id']) . "'>Excluir</button>";
    echo "</td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
}
?>