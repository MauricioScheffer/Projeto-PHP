<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="areas.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Calculadora de Áreas</title>
    <script>
        function updateFields() {
            const forma = document.getElementById('forma').value;
            document.getElementById('largura').style.display = 'none';
            document.getElementById('altura').style.display = 'none';
            document.getElementById('base').style.display = 'none';
            document.getElementById('raio').style.display = 'none';
            document.getElementById('alturaTriangulo').style.display = 'none';
            
            if (forma === 'circulo') {
                document.getElementById('raio').style.display = 'block';
            } else if (forma === 'triangulo') {
                document.getElementById('base').style.display = 'block';
                document.getElementById('alturaTriangulo').style.display = 'block';
            } else if (forma === 'retangulo') {
                document.getElementById('largura').style.display = 'block';
                document.getElementById('altura').style.display = 'block';
            }
        }

        window.onload = function() {
            updateFields();
        };
    </script>
</head>
<body>
<div class="container">
    <header>Calculadora de Área</header>
    
    <form action="testeArea.php" method="POST">
        <div class="select-box">
            <select name="forma" id="forma" onchange="updateFields()">
                <option value="circulo">Círculo◯</option>
                <option value="triangulo">Triângulo△</option>
                <option value="retangulo">Retângulo▯</option>
            </select>
        </div>
        <div class="drop-list">
            <div class="form">
                <div class="amount">
                    <div id="largura">
                        <label for="largura">Largura:</label>
                        <input type="number" name="largura" />
                    </div>
                    <div id="altura">
                        <label for="altura">Altura:</label>
                        <input type="number" name="altura" />
                    </div>
                    <div id="base">
                        <label for="base">Base:</label>
                        <input type="number" name="base" />
                    </div>
                    <div id="alturaTriangulo">
                        <label for="alturaTriangulo">Altura do Triângulo:</label>
                        <input type="number" name="alturaTriangulo" />
                    </div>
                    <div id="raio">
                        <label for="raio">Raio:</label>
                        <input type="number" name="raio" />
                    </div>
                </div>
            </div>
        </div>
        <input class="button" type="submit" value="Calcular">
        <a href="principal.php"><input class="button" type="button" value="Voltar"></a>
    </form>

    <div class="resposta">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $forma = $_POST['forma'];
            $resultado = 0;
            
            switch($forma) {
                case 'circulo':
                    $raio = $_POST['raio'];
                    $resultado = pi() * pow($raio, 2);
                    echo "A área do círculo é: " . $resultado . " unidades quadradas.";
                    break;
                case 'triangulo':
                    $base = $_POST['base'];
                    $alturaTriangulo = $_POST['alturaTriangulo'];
                    $resultado = 0.5 * $base * $alturaTriangulo;
                    echo "A área do triângulo é: " . $resultado . " unidades quadradas.";
                    break;
                case 'retangulo':
                    $largura = $_POST['largura'];
                    $altura = $_POST['altura'];
                    $resultado = $largura * $altura;
                    echo "A área do retângulo é: " . $resultado . " unidades quadradas.";
                    break;
                default:
                    echo "Por favor, selecione uma forma válida.";
            }
        }
        ?>
    </div>
</div>
<footer>Copyright | Maurício Scheffer🖥️ | 2024</footer>
</body>
</html>
