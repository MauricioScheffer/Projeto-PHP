<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gorjetas.css">
    <title>Conversor de Gorjetas</title>
</head>
<body>
    <div class="container">
        <header>Calculadora de Gorjetas</header>

        <form action="gorjetas.php" method="POST">
            <div class="amount">
                <p>Valor da Conta:</p>
                <input type="number" name="conta" required />
                <p>Porcentagem da Gorjeta</p>
                <input type="number" name="porcentagem" required />
            </div>

            <div class="buttons">
                <button type="submit" name="calcular">Calcular</button>
                <button type="submit" name="clear">Limpar</button>
            </div>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['calcular'])){
            $conta = $_POST['conta'];
            $porcentagem = $_POST['porcentagem'];

            if(is_numeric($conta)&& is_numeric($porcentagem)){
                $amount = ($conta * $porcentagem) /100;
                echo "<div class='resultado'>Gorjeta: R$ " . number_format($amount, 2, ',', '.') . "</div>";
            } else {
                echo "<div class='resultado'>Por favor insira valores válidos.</div>";
            }
        } else if(isset($_POST['clear'])){
            $_POST['conta'] = '';
            $_POST['porcentagem'] ='';
        }
    }?>
        </form>
            <a href="principal.php"><button class="btn-voltar" type="submit" name="back">Voltar</button></a>
    </div>
    <footer>Copyright | Maurício Scheffer🖥️ | 2024</footer>
</body>
</html>