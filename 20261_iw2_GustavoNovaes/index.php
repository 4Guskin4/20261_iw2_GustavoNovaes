<?php
    include 'inserir.php';
    ?>
<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Cadastro de Camisetas</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>

        body { font-family: Arial; margin: 50px; }

        .form-group { margin-bottom: 15px; }

        label { display: block; }

    </style>

   <script>
    $(document).ready(function() {
        
        $("#apag").on("click", function (e) {
            e.preventDefault();
            var idDaCamisa = $("#qapagar").val(); 

            if(idDaCamisa == "") {
                $('#mensagem').text("Por favor, insira um ID.").css("color", "red");
                return;
            }

            $.ajax({
                url: "apaga.php",
                type: "POST",
                data: { id: idDaCamisa },
                success: function (resposta) {
                    location.reload(); 
                },
                error: function() {
                    $('#mensagem').text("Erro ao enviar pedido de exclusão").css("color", "red");
                }
            });
        }); 

        $('#formCamiseta').on('submit', function(e) {
        
            var cor = $("#cor").val();
            var tamanho = $("#tamanho").val();

            $.ajax({
                url: "script.php",
                type: "POST",
                data: {
                    "acao": "inserir",
                    "cor": cor,
                    "tamanho": tamanho
                },
                dataType: "html"
            })
            .done(function(resposta) {
                console.log(resposta);
                if (resposta.trim() === "Sucesso") {
                    $('#mensagem').text("Camiseta cadastrada").css("color", "green");
                    $('#formCamiseta')[0].reset();
             
                } else {
                    $('#mensagem').text("Erro: " + resposta).css("color", "red");
                }
            })
            .fail(function(jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
                $('#mensagem').text("Erro.").css("color", "red");
            })
            .always(function() {
                console.log("Processo finalizado.");
            });
        }); 

    }); 
</script>

</head>

<body>



    <h2>Cadastrar Camiseta</h2>

    <form id="formCamiseta">

        <div class="form-group">

            <label>Cor:</label>

            <input type="text" id="cor" name="cor" placeholder="Ex: Azul, Amarelo, Verde" required>

        </div>

        <div class="form-group">

            <label>Tamanho:</label>

            <input type="text" id="tamanho" name="tamanho" placeholder="Ex: G, M, P" required>

        </div>

        <button type="submit">Salvar</button>

    </form>

    <form id="FormApagar">
    <div class="form-group">
        <label>Id:</label>
        <input type="text" id="qapagar" name="apagar" placeholder="Use o ID para apagar" required>
    </div>
    <button type="button" id="apag"> Apagar id </button>
</form>


    <div id="mensagem" style="margin-top: 20px; font-weight: bold;"></div>
    
    
    <?php   
        consulta($pdo); 
        ?>


</body>

</html>
