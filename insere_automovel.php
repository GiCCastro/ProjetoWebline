<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #000;">

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
             $placa = $_POST["placa"];
            $chassi = $_POST["chassi"];
            $montadora = $_POST["montadora"];
        }

        $conexao = new mysqli("localhost", "root", "teste", "estudo");

        if($conexao->connect_error){
            die("
            <div class='d-flex flex-column align-items-center justify-content-center mt-5'>
            <h1 class='text-white mt-5'>Falha na conexão!</h1>
            <a href='index.php' class='btn btn-primary w-20 mt-4'>Tentar novamente</a>
            </div>
            ".$conexao->connect_error);        }

        $sql = "INSERT INTO automoveis (nome, placa, chassi, montadora) VALUES ('$nome', '$placa', '$chassi', '$montadora')";

        if($conexao->query($sql) == TRUE){

            echo "
            <div class='d-flex flex-column align-items-center justify-content-center mt-4'>
                <h1 class='text-white row justify-content-center mb-4'>O seu veículo foi cadastrado com sucesso!</h1>
                <a href='listaautomoveis.php' class='btn btn-primary w-25'>Ver listagem dos veículos</a><br>
                <a href='index.php' class='btn btn-primary w-25'>Cadastrar veículo</a>
            </div>
       "
            ;
        }else{
            echo"
            <div class='d-flex flex-column align-items-center justify-content-center mt-5'>
            <h1 class='text-white'>Erro!</h1>
            <a href='index.php' class='btn btn-primary w-20 mt-4'>Cadastrar veículo</a>
            </div>";
        }

        $conexao->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>