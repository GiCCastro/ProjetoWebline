<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Automóvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #000;">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form class="bg-white p-4 rounded"  action="insere_automovel.php" method="post" >
                    <h2>Automóveis</h2>
                
                    <div class="mb-1">
                        <input placeholder="Veículo"  class="form-control mt-4" type="text" id="nome" name="nome" required><br>
                    </div>
                
                    <div class="mb-1">
                        <input placeholder="Placa"  class="form-control" type="text" id="placa" name="placa" required><br>
                    </div>
                
                    <div class="mb-1">
                        <input placeholder="Chassi"  class="form-control" type="text" id="chassi" name="chassi" required><br>
                    </div>
                
                    <div class="mb-1">
                        <label for="montadora">Montadora:</label>
                        <select  class="rounded" id="montadora" name="montadora" required>
                        <?php
                        $conexao = new mysqli("localhost", "root", "teste", "estudo");

                        if ($conexao->connect_error) {
                            die("
                            <h1 class='text-white row justify-content-center mt-5'>Falha na conexão!</h1>".$conexao->connect_error);
                        }

                        $result = $conexao->query("SELECT * FROM montadoras");

                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['codigo']."'>".$row['nome']."</option>";
                        }
                        $conexao->close();
                        ?>
                        </select>
                    </div> <br>
                    <button type="submit"  class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
