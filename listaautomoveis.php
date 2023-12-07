<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Automóveis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #000;">

    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-white">Listagem de Automóveis</h2>
        <a href='index.php' class='btn btn-primary w-20'>Página inicial</a>
        </div>
        <form method="GET" class="mb-3 mt-4">
            <label for="nome" class="form-label text-white">Buscar veículo:</label>
            <div class="input-group">
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do veículo">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <?php
            $conexao = new mysqli("localhost", "root", "teste", "estudo");

            if ($conexao->connect_error) {
                die("
                    <h1 class='text-white row justify-content-center mt-5'>Falha na conexão!</h1>
                ".$conexao->connect_error); 
            }

            $sql = "SELECT automoveis.nome AS nome_carro, automoveis.placa, automoveis.chassi, montadoras.nome AS nome_montadora 
                    FROM automoveis 
                    INNER JOIN montadoras ON automoveis.montadora = montadoras.codigo";

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nome'])) {
                $nome = $_GET['nome'];
                $sql .= " WHERE automoveis.nome LIKE '%$nome%'";
            }

            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {

                echo "<table class='table table-dark'>";
                echo "<thead><tr><th>Nome do Carro</th><th>Placa</th><th>Chassi</th><th>Montadora</th></tr></thead><tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['nome_carro']}</td>";
                    echo "<td>{$row['placa']}</td>";
                    echo "<td>{$row['chassi']}</td>";
                    echo "<td>{$row['nome_montadora']}</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            } else {
                echo
                 "<div class='d-flex flex-column align-items-center justify-content-center'>
                 <p class='text-white mt-5'>Nenhum automóvel encontrado :(</p>
                <a href='index.php' class='btn btn-primary w-20 mt-3'>Cadastrar veículo</a>
                </div>
                ";
            }

            // Fechar a conexão
            $conexao->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
