<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="temperatura.css">
    <title>Conversor de Temperatura</title>
</head>
<body>
<div class="wrapper">
        <header>Conversor de Temperatura</header>
        
        <form action="temperatura.php" method="POST">
            <div class="amount">
                <p>Temperatura:</p>
                <input type="number" name="temp" value="" required/>
            </div>
            <div class="drop-list">
                <div class="form">
                    <p>De</p>
                    <div class="select-box">
                        <select name="from_currency" id="from-currency">
                            <option value="f">Fahreinheit</option>
                            <option value="c">Celsius</option>
                        </select>
                    </div>
                </div>
                <div class="icon"><i class="fas fa-exchange-alt"></i></div>
                <div class="to">
                    <p>Para</p>
                    <div class="select-box">
                        <select name="to_currency" id="to-currency">
                            <option value="Fahreinheit">Fahreinheit</option>
                            <option value="Celsius">Celsius</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit">Converter</button>
        <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $temp = $_POST['temp'];
        $from_currency = $_POST['from_currency'];
        $to_currency = $_POST['to_currency'];
        
        // Função para converter temperaturas
        function convertTemperature($temp, $from, $to) {
            if ($from == 'c' && $to == 'f') {
                return ($temp * 9.0 / 5.0) + 32;
            } elseif ($from == 'f' && $to == 'c') {
                return ($temp - 32) * 5.0 / 9.0;
            } else {
                return $temp; // Mesma unidade, sem conversão
            }
        }

        if ($from_currency != $to_currency) {
            $converted_temp = convertTemperature($temp, $from_currency, $to_currency);
            echo "<div class='result'>Valor convertido: $converted_temp $to_currency</div>";
        } else {
            echo "<div class='result'>Conversão não disponível</div>";
        }
    }
    ?>
        </form>
    <a href="principal.php"><button class="btn-voltar" type="submit" name="back">Voltar</button></a>
        </div>
    <footer>Copyright - Maurício Scheffer🖥️ - 2024</footer>
</body>
</html>