<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moeda</title>
    <link rel="stylesheet" href="moeda.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <header>Conversor de Moedas</header>
        
        <form action="moedas.php" method="POST">
            <div class="amount">
                <p>Valor:</p>
                <input type="number" name="amount" value="" required/>
            </div>
            <div class="drop-list">
                <div class="form">
                    <p>De</p>
                    <div class="select-box">
                        <img id="from-img" src="https://flagcdn.com/48x36/us.png" alt="" />
                        <select name="from_currency" id="from-currency" onchange="updateImage('from')">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="BRL">BRL</option>
                        </select>
                    </div>
                </div>
                <div class="icon"><i class="fas fa-exchange-alt"></i></div>
                <div class="to">
                    <p>Para</p>
                    <div class="select-box">
                        <img id="to-img" src="https://flagcdn.com/48x36/us.png" alt="" />
                        <select name="to_currency" id="to-currency" onchange="updateImage('to')">
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="BRL">BRL</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- <div class="exchange_rate"></div> -->
             <br>
            <button class="button" type="submit">Converter</button>
            <a href="principal.php"><button class="btn-voltar">Voltar</button></a>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $amount = $_POST['amount'];
            $from_currency = $_POST['from_currency'];
            $to_currency = $_POST['to_currency'];
            
            // Exemplo de taxas de câmbio estáticas para demonstração
            $exchange_rates = [
                'USD' => ['EUR' => 0.85, 'BRL' => 5.0],
                'EUR' => ['USD' => 1.18, 'BRL' => 5.88],
                'BRL' => ['USD' => 0.20, 'EUR' => 0.17]
            ];

            if (isset($exchange_rates[$from_currency][$to_currency])) {
                $rate = $exchange_rates[$from_currency][$to_currency];
                $converted_amount = $amount * $rate;
                echo "<div class='result'>Valor convertido: $converted_amount $to_currency</div>";
            } else {
                echo "<div class='result'>Conversão não disponível</div>";
            }
        }
        ?>

    </div>

    <script>
        function updateImage(type) {
            var currencySelect = document.getElementById(type + '-currency');
            var currency = currencySelect.value;
            var imgElement = document.getElementById(type + '-img');
            
            if (currency === 'USD') {
                imgElement.src = 'https://flagcdn.com/48x36/us.png';
            } else if (currency === 'EUR') {
                imgElement.src = 'https://flagcdn.com/48x36/eu.png';
            } else if (currency === 'BRL') {
                imgElement.src = 'https://flagcdn.com/48x36/br.png';
            }
        }
    </script>
    <footer>Copyright | Maurício Scheffer🖥️ | 2024</footer>
</body>
</html>
