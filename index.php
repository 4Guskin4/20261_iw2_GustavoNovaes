<?php
    include 'inserir.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Camisetas</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        
$(document).on("click", ".btn-editar", function () {
    var id = $(this).data("id");
    var cor = $(this).data("cor");
    var tamanho = $(this).data("tamanho");

    $("#editar_id").val(id);
    $("#editar_cor").val(cor);
    $("#editar_tamanho").val(tamanho);
});


$('#formEditarCamiseta').on('submit', function(e) {
    e.preventDefault(); 
    
    var id = $("#editar_id").val();
    var cor = $("#editar_cor").val(); 
    var tamanho = $("#editar_tamanho").val(); 

    $.ajax({
        url: "atualiza.php", 
        type: "POST", 
        data: {
            "acao": "editar",
            "id": id,
            "cor": cor, 
            "tamanho": tamanho 
        },
        success: function(resposta) {
            if (resposta.trim() === "Sucesso") { 
                $('#EditarCamiseta').modal('hide'); 
                location.reload(); 
            } else {
                alert("Erro : " + resposta);
            }
        },
        error: function() {
            alert("Erro ao conectar com o servidor.");
        }
    });
});

        })
        $(document).on("click", ".btn-deletar", function (e) {
            e.preventDefault();
            
            var idCamisa = $(this).data("id"); 

            if(confirm("Apagar camisa " + idCamisa + "?")) { 
                $.ajax({
                    url: "apaga.php", 
                    type: "POST", 
                    data: { id: idCamisa }, 
                    success: function (resposta) {
                        location.reload(); 
                    },
                    error: function() {
                        alert("Erro ao enviar pedido de exclusão");
                    }
                });
            }
        }); 

        $('#formCamiseta').on('submit', function(e) {
            e.preventDefault(); 
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
                if (resposta.trim() === "Sucesso") { 
                    $('#formCamiseta')[0].reset(); 
                    $('#modalCamiseta').modal('hide'); 
                    location.reload(); 
                } else {
                    alert("Erro: " + resposta);
                }
            })
            .fail(function(jqXHR, textStatus) {
                alert("Erro ao conectar com o servidor.");
            });
        }); 
     
    </script>
</head>
<body >

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Lista de Camisetas</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCamiseta">
                Cadastrar Nova Camiseta
            </button>
        </div>
</div>
          <div class="modal fade" id="modalCamiseta" tabindex="-1" role="dialog" aria-labelledby="modalCamisetaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCamisetaLabel">Cadastrar Camiseta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formCamiseta">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="cor">Cor:</label>
                            <input type="text" class="form-control" id="cor" name="cor" placeholder="Ex: Azul, Amarelo, Verde" required> </div>
                        <div class="form-group mb-3">
                            <label for="tamanho">Tamanho:</label>
                            <input type="text" class="form-control" id="tamanho" name="tamanho" placeholder="Ex: G, M, P" required> </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <div class="modal fade" id="EditarCamiseta" tabindex="-1" role="dialog" aria-labelledby="EditarCamisetaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditarCamisetaLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditarCamiseta">
    <input type="hidden" id="editar_id" name="id">
    
    <div class="modal-body">
        <div class="form-group mb-3">
            <label for="editar_cor">Cor:</label>
            <input type="text" class="form-control" id="editar_cor" name="cor" required>
        </div>
        <div class="form-group mb-3">
            <label for="editar_tamanho">Tamanho:</label>
            <input type="text" class="form-control" id="editar_tamanho" name="tamanho" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>
            </div>
        </div>
    </div>

   


        <div>
            <?php   
                consulta($pdo);
            ?>
        </div>
    </div>

  

</body>
</html>